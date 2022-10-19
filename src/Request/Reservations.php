<?php

namespace LMS\Request;

use LMS\Result\Reservations as ReservationsResult;
use LMS\Result\ResultInterface;
use LMS\Traits\WriteCredsToSession;

class Reservations implements ReservationsRequestInterface
{
    use WriteCredsToSession;

    private $user;

    private $pin;

    private $provider;

    /**
     * Reservations constructor.
     */
    public function __construct($provider)
    {
        [$user, $pin] = $this->getSessionItem();
        $this->setUser($user);
        $this->setPin($pin);
        $this->provider = $provider;
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return 'patron/reservations';
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
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
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
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

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

        switch ($this->getProvider()) {
            case 'bibliofil':
                $provider = '\LMS\Object\Bibliofil\ReservationObject';
                break;

            default:
                $provider = '\LMS\Object\FBS\ReservationObject';
                break;
        }

        foreach ($rawData as $rawObject) {
            $objects[] = new $provider($rawObject);
        }

        return new ReservationsResult($this, $objects);
    }

    public function getProvider()
    {
        return $this->provider;
    }
}
