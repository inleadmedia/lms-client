<?php

namespace LMS\Client;

use LMS\Client\Service;
use LMS\Client\Response;
use LMS\Client\RequestInterface;
use LMS\Client\ResponseInterface;

/**
 * Implement communication with the LMS service.
 *
 * @package LMS\Client
 */
class OpenSearch extends Service implements RequestInterface
{

    public function request($uri) : ResponseInterface
    {
        return;
    }
}
