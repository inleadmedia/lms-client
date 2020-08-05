<?php

namespace LMS\Result;

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
    public function getRequest();
}
