<?php

namespace LMS\Request;

use LMS\Result\ResultInterface;

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
    public function getUri(): string;

    /**
     * Gets the request parameters for current action.
     *
     * @return array
     *   A set of parameters to be sent with the request.
     */
    public function getParameters(): array;

    /**
     * Parses the raw result into an usable object.
     *
     * @param array $rawData
     *   Raw result from service.
     *
     * @return \LMS\Result\ResultInterface
     *   Raw result object.
     */
    public function parseResult(array $rawData): ResultInterface;
}
