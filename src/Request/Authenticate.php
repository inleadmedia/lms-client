<?php

namespace LMS\Request;

use LMS\Result\Authenticate as AuthenticateResult;

class Authenticate implements AuthenticateRequestInterface, RequestInterface
{
    protected $name;

    protected $pin;

  /**
   * @param $name
   * @param $pin
   */
    public function __construct($name, $pin)
    {
        $this->name = $name;
        $this->pin = $pin;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getParameters()
    {
        return [
        'user' => $this->getName(),
        'pin' => $this->getPin(),
        ];
    }

    public function getPin()
    {
        return $this->pin;
    }

  /**
   * {@inheritDoc}
   */
    public function getUri()
    {
        return 'patron/info';
    }

  /**
   * {@inheritDoc}
   */
    public function parseResult(array $rawData)
    {
        return (new AuthenticateResult($this))
        ->setName($rawData['name'] ?? '')
        ->setAddress($rawData['address'] ?? [])
        ->setBirthDate($rawData['birthdate'] ?? '')
        ->setDefaultInterestPeriod($rawData['defaultInterestPeriod'])
        ->setEmail($rawData['email'] ?? '')
        ->setEmailNotification($rawData['receiveEmail'] ?? false)
        ->setOnHold($rawData['onHOld'] ?? [])
        ->setPhone($rawData['phone'] ?? '')
        ->setPreferredBranch($rawData['preferredBranch'] ?? '')
        ->setSmsNotification($rawData['receiveSms'] ?? false);
    }
}
