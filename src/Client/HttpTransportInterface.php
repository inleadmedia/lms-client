<?php

namespace LMS\Client;

/**
 * Interface TransportInterface.
 */
interface HttpTransportInterface
{
    /**
     * Executes a request.
     *
     * @param string $method
     *   HTTP method.
     * @param string $url
     *   Target url.
     * @param array $payload
     *   Request payload.
     * @param array $headers
     *   Additional headers.
     *
     * @return array
     *   Request result.
     */
    public function request(string $method, string $url, array $payload = [], array $headers = []): array;
}
