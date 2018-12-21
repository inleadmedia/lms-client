<?php

namespace LMS\Client;

use LMS\Client\ResponseInterface;

/**
 * Implement http client response.
 *
 * @package LMS\Client
 */
class Response implements ResponseInterface
{

    private $properties;

    public function get($property)
    {
        return $this->properties[$property] ?? NULL;
    }

    public function set($property, $value)
    {
        $this->properties[$property] = $value;
    }
}
