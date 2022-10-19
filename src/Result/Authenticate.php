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
     * @param \LMS\Request\RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * @param bool $emailNotification
     *
     * @return $this
     */
    public function setEmailNotification(bool $emailNotification): self
    {
        $this->emailNotification = $emailNotification;

        return $this;
    }

    /**
     * @param bool $smsNotification
     *
     * @return $this
     */
    public function setSmsNotification(bool $smsNotification): self
    {
        $this->smsNotification = $smsNotification;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress(): array
    {
        return $this->address;
    }

    /**
     * @param array $address
     *
     * @return $this
     */
    public function setAddress(array $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    /**
     * @param string $birthDate
     *
     * @return $this
     */
    public function setBirthDate(string $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultInterestPeriod(): int
    {
        return $this->defaultInterestPeriod;
    }

    /**
     * @param int $defaultInterestPeriod
     *
     * @return $this
     */
    public function setDefaultInterestPeriod(int $defaultInterestPeriod): self
    {
        $this->defaultInterestPeriod = $defaultInterestPeriod;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getOnHold(): array
    {
        return $this->onHold;
    }

    /**
     * @param array $onHold
     *
     * @return $this
     */
    public function setOnHold(array $onHold): self
    {
        $this->onHold = $onHold;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return $this
     */
    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPreferredBranch(): string
    {
        return $this->preferredBranch;
    }

    /**
     * @param string $preferredBranch
     *
     * @return $this
     */
    public function setPreferredBranch(string $preferredBranch): self
    {
        $this->preferredBranch = $preferredBranch;

        return $this;
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
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }
}
