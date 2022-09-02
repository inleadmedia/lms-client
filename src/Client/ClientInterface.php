<?php

namespace LMS\Client;

use LMS\Request\RequestInterface;

/**
 * Interface Client.
 */
interface ClientInterface
{
    /**
     * Gets service base URL.
     *
     * @return string
     *   Service URL.
     */
    public function getUrl(): string;

    /**
     * Sets service base URL.
     *
     * @param string $serviceUrl
     *   Service URL.
     *
     * @return \LMS\Client\ClientInterface
     *   This instance.
     */
    public function setUrl(string $serviceUrl): ClientInterface;

    /**
     * Executes a request towards service.
     *
     * @param \LMS\Request\RequestInterface $request
     *   Request object.
     *
     * @return array
     *   Raw result array.
     */
    public function execute(RequestInterface $request): array;
}
