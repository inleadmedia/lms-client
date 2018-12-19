<?php

namespace LMS;

interface RequestInterface
{

  /**
   * Perform a GET request to the http transport.
   *
   * @param string $uri
   *   Full path to the endpoint.
   *
   * @return \LMS\ResponseInterface
   *   Client response object.
   */
    public function request($uri);
}
