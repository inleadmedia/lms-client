<?php

namespace LMS\Client;

use LMS\Exception\LmsException;
use LMS\Request\RequestInterface;

/**
 * Class Client.
 */
class Client implements ClientInterface
{
    private $transport;

    /**
     * Client constructor.
     *
     * @param \LMS\Client\HttpTransportInterface $transport
     *   HTTP transport instance.
     *
     * TODO: Logger.
     */
    public function __construct(HttpTransportInterface $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Base url for LMS service.
     *
     * @var string
     */
    private $serviceUrl;

    /**
     * {@inheritdoc}
     */
    public function setUrl(string $serviceUrl): ClientInterface
    {
        $this->serviceUrl = $serviceUrl;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl(): string
    {
        return $this->getUrl();
    }

    /**
     * {@inheritdoc}
     */
    public function execute(RequestInterface $request): array
    {
        if (empty($this->serviceUrl)) {
            throw new LmsException('Set the service URL using "ClientInterface::setUrl()" method.');
        }

        $url = $this->serviceUrl . '/' . $request->getUri();

        $transportResult = $this->transport->request('GET', $url, $request->getParameters(), []);
        $this->validateTransportResult($transportResult);

        // TODO: Rely on object of some sort.
        $rawData = json_decode($transportResult['data'], true);

        if (null === $rawData || $transportResult['code'] != 200) {
            $message = !empty($rawData['message']) ? $rawData['message'] : ($transportResult['data'] ?? '');

            throw new LmsException("Failed to request data from url '{$url}'. Response code '{$transportResult['code']}'. Response message '{$message}'.");
        }

        return $rawData;
    }

    /**
     * Validates http transport raw response structure.
     *
     * @param array $result
     *   Raw http response.
     * @throws \LMS\Exception\LmsException
     */
    private function validateTransportResult(array $result): void
    {
        foreach (['data', 'code'] as $key) {
            if (!array_key_exists($key, $result)) {
                throw new LmsException('Transport response array should include a "' . $key . '" key.');
            }
        }
    }
}
