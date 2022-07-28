<?php

namespace LMS\Result;

use LMS\Request\RequestInterface;

class Authenticate implements AuthenticationResultInterface, ResultInterface
{
    protected $request;

    protected $name;

    protected $address;

    protected $birthDate;

    protected $defaultInterestPeriod;

    protected $email;

    protected $onHold;

    protected $phone;

    protected $preferredBranch;

    protected $emailNotification;

    protected $smsNotification;

  /**
   * @param mixed $name
   *
   * @return Authenticate
   */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

  /**
   * @param mixed $address
   *
   * @return Authenticate
   */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

  /**
   * @param mixed $birthDate
   *
   * @return Authenticate
   */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

  /**
   * @param mixed $defaultInterestPeriod
   *
   * @return Authenticate
   */
    public function setDefaultInterestPeriod($defaultInterestPeriod)
    {
        $this->defaultInterestPeriod = $defaultInterestPeriod;
        return $this;
    }

  /**
   * @param mixed $email
   *
   * @return Authenticate
   */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

  /**
   * @param mixed $onHold
   *
   * @return Authenticate
   */
    public function setOnHold($onHold)
    {
        $this->onHold = $onHold;
        return $this;
    }

  /**
   * @param mixed $phone
   *
   * @return Authenticate
   */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

  /**
   * @param mixed $preferredBranch
   *
   * @return Authenticate
   */
    public function setPreferredBranch($preferredBranch)
    {
        $this->preferredBranch = $preferredBranch;
        return $this;
    }

  /**
   * @param mixed $emailNotification
   *
   * @return Authenticate
   */
    public function setEmailNotification($emailNotification)
    {
        $this->emailNotification = $emailNotification;
        return $this;
    }

  /**
   * @param mixed $smsNotification
   *
   * @return Authenticate
   */
    public function setSmsNotification($smsNotification)
    {
        $this->smsNotification = $smsNotification;
        return $this;
    }

  /**
   * @param \LMS\Request\RequestInterface $request
   */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
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
    public function getAddress(): array
    {
        return $this->address;
    }

  /**
   * {@inheritDoc}
   */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

  /**
   * {@inheritDoc}
   */
    public function getDefaultInterestPeriod(): int
    {
        return $this->defaultInterestPeriod;
    }

  /**
   * {@inheritDoc}
   */
    public function getEmail(): string
    {
        return $this->email;
    }

  /**
   * {@inheritDoc}
   */
    public function getOnHold(): array
    {
        return $this->onHold;
    }

  /**
   * {@inheritDoc}
   */
    public function getPhone(): string
    {
        return $this->phone;
    }

  /**
   * {@inheritDoc}
   */
    public function getPreferredBranch(): string
    {
        return $this->preferredBranch;
    }

  /**
   * {@inheritDoc}
   */
    public function isEmailNotification(): bool
    {
        return $this->emailNotification;
    }

  /**
   * {@inheritDoc}
   */
    public function isSmsNotification(): bool
    {
        return $this->smsNotification;
    }

  /**
   * {@inheritDoc}
   */
    public function getRequest()
    {
        return $this->request;
    }
}
