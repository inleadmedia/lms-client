<?php

namespace LMS\Request;

use LMS\Result\ResultInterface;
use LMS\Traits\WriteCredsToSession;

class PatronUpdate implements RequestInterface
{
    use WriteCredsToSession;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pin;

    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {
        [$user, $pin] = $this->getSessionItem();
        $this->setUser($user);
        $this->setPin($pin);
        $this->data = $data;
    }

    public function getUri(): string
    {
        return 'patron/info';
    }

    public function getParameters(): array
    {
        return [
            'user' => $this->getUser(),
            'pin' => $this->getPin(),
            'data' => $this->getData(),
        ];
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getPin(): string
    {
        return $this->pin;
    }

    /**
     * @param string $pin
     */
    public function setPin(string $pin): void
    {
        $this->pin = $pin;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function parseResult(array $rawData): ResultInterface
    {
        // TODO: Implement parseResult() method.
    }
}
