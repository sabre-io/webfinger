<?php

namespace Sabre\WebFinger;

include 'vendor/autoload.php';

$server = new Server(function($resource) {

    if ($resource==='mailto:me@evertpot.com') {

        return new Resource($resource, [], [], [
            new Link(
                'homepage',
                'http://evertpot.com/',
                ['en' => 'Evert\'s blog'],
                []
            ),
        ]);

    }

});

$server->start();
