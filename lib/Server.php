<?php

namespace Sabre\WebFinger;

use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\Response;
use Sabre\HTTP\Sapi;
use Exception;

/**
 * Super simple WebFinger server.
 *
 * All the lookup is done in the callback in the constructor argument.
 * 
 * @copyright Copyright (C) 2015 fruux GmbH. (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/) 
 * @license http://sabre.io/license/ Modified BSD License
 */
class Server {

    /**
     * Lookup function
     *
     * @var callable
     */
    protected $lookUp;

    /**
     * Constructor
     *
     * The $lookUp callback is responsible for mapping resource URIs to
     * ResourceInterface objects.
     *
     * The callback will receive a resource as its only argument, and MUST
     * return an instance of ResourceInterface or null.
     *
     * @param callable $lookUp
     * @return void
     */
    function __construct(callable $lookUp) {

        $this->lookUp = $lookUp;

    }

    function start() {

        $request = Sapi::getRequest();
        try {
            $response = $this->handleRequest($request);
        } catch (Exception $e) {
            if (!$e instanceof ServerException) {
                $e = new ServerException(500, 'Internal Server Error', null, $e);
            }
            $response = new Response($e->getHttpStatus(), ['Content-Type' => 'application/json'], json_encode($e));
        }
        Sapi::sendResponse($response);

    }

    function handleRequest(RequestInterface $request) {

        $queryParams = $request->getQueryParameters();
        if (!isset($queryParams['resource'])) {
            throw new ServerException(400, 'The "resource" query parameter is required');
        }
        $result = call_user_func($this->lookUp, $queryParams['resource']);
        if (is_null($result)) {
            throw new ServerException(404, 'Resource not found');
        }

        // Debug
        $response = new Response(200,['Content-Type' => 'application/json'], json_encode($result));
        //$response = new Response(200,['Content-Type' => 'application/jrd+json'], json_encode($result));
        return $response;

    }

}
