<?php

namespace LMS\Client;

use LMS\Exception\LmsException;
use LMS\Request\RequestInterface;

/**
 * Class Client.
 */
class Client implements ClientInterface
{

    /**
     * @var \LMS\Client\HttpTransportInterface
     */
    private $transport;

    /**
     * @var string
     */
    private $method = 'GET';

    /**
     * Base url for LMS service.
     *
     * @var string
     */
    private $serviceUrl;

    /**
     * Client constructor.
     *
     * @param \LMS\Client\HttpTransportInterface $transport
     *   HTTP transport instance.
     * @param $method
     *
     * TODO: Logger.
     */
    public function __construct(HttpTransportInterface $transport, $method)
    {
        $this->transport = $transport;
        $this->method = $method;
    }

    /**
     * {@inheritdoc}
     */
    public function setUrl($serviceUrl)
    {
        $this->serviceUrl = $serviceUrl;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        return $this->getUrl();
    }

  /**
   * {@inheritdoc}
   * @throws \LMS\Exception\LmsException
   */
    public function execute(RequestInterface $request)
    {
        if (empty($this->serviceUrl)) {
            throw new LmsException('Set the service URL using "ClientInterface::setUrl()" method.');
        }

        $url = $this->serviceUrl . '/' . $request->getUri();

        $transportResult = $this->transport->request(
            $this->method,
            $url,
            $request->getParameters(),
            $request->getData(),
            []
        );
        $this->validateTransportResult($transportResult);

        // TODO: Rely on object of some sort.
        $rawData = json_decode($transportResult['data'], true);

        if (null === $rawData || $transportResult['code'] != 200) {
            $message = !empty($rawData['message']) ? $rawData['message'] : ($transportResult['data'] ?? '');

            throw new LmsException("Failed to request data from url '{$url}'.
             Response code '{$transportResult['code']}'. 
             Response message '{$message}'.");
        }

        return $rawData;
    }

    /**
     * Validates http transport raw response structure.
     *
     * @param array $result
     *   Raw http response.
     *
     * @throws \LMS\Exception\LmsException
     */
    private function validateTransportResult(array $result)
    {
        foreach (['data', 'code'] as $key) {
            if (!array_key_exists($key, $result)) {
                throw new LmsException('Transport response array should include a "' . $key . '" key.');
            }
        }
    }
}
