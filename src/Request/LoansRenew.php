<?php

namespace LMS\Request;

use LMS\Result\LoansRenew as LoansRenewResult;
use LMS\Result\ResultInterface;
use LMS\Traits\WriteCredsToSession;

/**
 * LoansRenew class.
 */
class LoansRenew implements LoansRenewRequestInterface
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
    private $loans;

    public function __construct($loans)
    {
        [$user, $pin] = $this->getSessionItem();

        $this->setUser($user);
        $this->setPin($pin);
        $this->setLoans($loans);
    }

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return 'patron/loan/renew';
    }

    public function getData()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters(): array
    {
        return [
            'user' => $this->getUser(),
            'pin' => $this->getPin(),
            'loanId' => $this->getLoans(),
        ];
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * @param mixed $pin
     */
    public function setPin($pin): void
    {
        $this->pin = $pin;
    }

    /**
     * @return string
     */
    public function getLoans(): string
    {
        return implode(',', $this->loans);
    }

    /**
     * @param array $loans
     */
    public function setLoans(array $loans): void
    {
        $this->loans = $loans;
    }

    /**
     * {@inheritdoc}
     */
    public function parseResult(array $rawData): ResultInterface
    {
        $loans = [];
        foreach ($rawData as $item) {
            foreach ($item as $loanId => $body) {
                $loans[$loanId] = $body;
            }
        }
        return new LoansRenewResult($this, $loans);
    }
}
