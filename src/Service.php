<?php

namespace LMS\Client;

/**
 * Implementation of the http request client. Basicaly the Guzzle will be used.
 */
abstract class Service
{

    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }
}
