<?php

namespace LMS\Result;

use LMS\Request\RequestInterface;

/**
 * Interface Result.
 */
interface ResultInterface
{

    /**
     * Gets the request object.
     *
     * @return \LMS\Request\RequestInterface
     *   Request object.
     */
    public function getRequest(): RequestInterface;
}
