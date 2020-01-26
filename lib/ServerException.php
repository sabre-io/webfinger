<?php

namespace Sabre\WebFinger;

use Exception;
use JsonSerializable;
use Sabre\HTTP\HttpException;

/**
 * The WebFinger server uses this as a base exception to communicate problems
 * to the client.
 *
 * @copyright Copyright (C) 2007-2015 fruux GmbH. (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class ServerException extends Exception implements HttpException, JsonSerializable
{
    /**
     * httpCode.
     *
     * @var int
     */
    protected $httpCode;

    /**
     * __construct.
     *
     * @param int       $httpCode
     * @param string    $message
     * @param int       $code
     * @param Exception $previousException
     */
    public function __construct($httpCode, $message, $code = null, $previousException = null)
    {
        $this->httpCode = $httpCode;
        parent::__construct($message, $code, $previousException);
    }

    /**
     * Returns the HTTP status code for the exception.
     *
     * @return int
     */
    public function getHttpStatus()
    {
        return $this->httpCode;
    }

    /**
     * Returns a json representation of this exception.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'error', [
                'code' => $this->getHttpStatus(),
                'message' => $this->getMessage(),
            ],
        ];
    }
}
