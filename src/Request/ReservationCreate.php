<?php

namespace LMS\Request;

use LMS\Result\ResultInterface;
use LMS\Traits\WriteCredsToSession;

class ReservationCreate implements ReservationsRequestInterface
{
    use WriteCredsToSession;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pin;

    /**
     * ReservationCreate constructor.
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
        return 'patron/reserve';
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return [
            'user' => $this->getUser(),
            'pin' => $this->getPin(),
            'reservableId' => $this->getData(),
        ];
    }

    /**
     * @return mixed|string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed|string $user
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return mixed|string
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * @param mixed|string $pin
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $reservations = [];
        foreach ($data as $item) {
            $reservations[]['reservableId'] = $item['reservableId'];
        }

        $this->data = $reservations;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function parseResult(array $rawData): ResultInterface
    {
        // TODO: Implement parseResult() method.
    }
}
