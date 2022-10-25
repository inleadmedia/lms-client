<?php

namespace LMS\Request;

use LMS\Result\Authenticate as AuthenticateResult;
use LMS\Result\ResultInterface;
use LMS\Traits\WriteCredsToSession;

class Authenticate implements AuthenticateRequestInterface, RequestInterface
{
    use WriteCredsToSession;

    protected $name;

    protected $pin;

    /**
     * @param string $name
     * @param string $pin
     */
    public function __construct(string $name, string $pin)
    {
        $this->name = $name;
        $this->pin = $pin;
    }

    /**
     * {@inheritDoc}
     */
    public function getParameters(): array
    {
        return [
            'user' => $this->getName(),
            'pin' => $this->getPin(),
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function getPin(): string
    {
        return $this->pin;
    }

    /**
     * {@inheritDoc}
     */
    public function getUri(): string
    {
        return 'patron/info';
    }

    public function getData()
    {
        return [];
    }

    /**
     * @param array $rawData
     *
     * @return \LMS\Result\ResultInterface
     */
    public function parseResult(array $rawData): ResultInterface
    {
        $this->setSessionItem($this->name, $this->pin);

        return (new AuthenticateResult($this))
            ->setName($rawData['name'] ?? '')
            ->setAddress($rawData['address'] ?? [])
            ->setBirthDate($rawData['birthdate'] ?? '')
            ->setDefaultInterestPeriod($rawData['defaultInterestPeriod'] ?? 0)
            ->setEmail($rawData['email'] ?? '')
            ->setEmailNotification($rawData['receiveEmail'] ?? false)
            ->setOnHold($rawData['onHold'] ?? [])
            ->setPhone($rawData['phone'] ?? '')
            ->setPreferredBranch($rawData['preferredBranch'] ?? '')
            ->setSmsNotification($rawData['receiveSms'] ?? false);
    }
}
