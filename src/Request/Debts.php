<?php

namespace LMS\Request;

use LMS\Result\ResultInterface;
use LMS\Traits\WriteCredsToSession;

/**
 * Class Debts
 *
 * @package LMS\Request
 */
class Debts implements DebtsRequestInterface
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
     * Debts constructor.
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
        return 'patron/fees';
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
        // TODO: Implement parseResult() method.
    }
}
