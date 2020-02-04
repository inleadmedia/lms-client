<?php

namespace LMS\Request;

/**
 * Interface Request.
 */
interface RequestInterface
{
    /**
     * Gets uri path component for current action.
     *
     * @return string
     *   Uri path component where actual action can be accessed.
     */
    public function getUri();

    /**
     * Gets the request parameters for current action.
     *
     * @return array
     *   A set of parameters to be sent with the request.
     */
    public function getParameters();

    /**
     * Parses the raw result into an usable object.
     *
     * @param array $rawData
     *   Raw result from service.
     *
     * @return \LMS\Result\ResultInterface
     *   Raw result.
     */
    public function parseResult(array $rawData);
}
