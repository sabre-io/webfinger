<?php

namespace Sabre\WebFinger;

include 'vendor/autoload.php';

$server = new Server(function ($resource) {
    if ('mailto:me@evertpot.com' === $resource) {
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
