<?php

namespace LMS\Request;

use LMS\Object\LoanObject;
use LMS\Result\Loans as LoansResult;
use LMS\Result\ResultInterface;
use LMS\Traits\WriteCredsToSession;

/**
 * Class Loans
 *
 * @package LMS\Request
 */
class Loans implements LoansRequestInterface
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
     * Loans constructor.
     */
    public function __construct()
    {
        [$user, $pin] = $this->getSessionItem();
        $this->setUser($user);
        $this->setPin($pin);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return 'patron/loans';
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return [
            'user' => $this->getUser(),
            'pin' => $this->getPin(),
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
    public function getData()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function parseResult(array $rawData): ResultInterface
    {
        $objects = [];

        foreach ($rawData as $rawObject) {
            $objects[] = new LoanObject($rawObject);
        }

        return new LoansResult($this, $objects);
    }
}
