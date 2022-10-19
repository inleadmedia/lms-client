<?php

namespace LMS\Request;

use LMS\Result\ResultInterface;
use LMS\Traits\WriteCredsToSession;

class ReservationUpdate implements ReservationsRequestInterface
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
    private $reservationOptions = [];

    /**
     * ReservationsUpdate constructor.
     *
     * @param $reservationOptions
     */
    public function __construct($reservationOptions)
    {
        [$user, $pin] = $this->getSessionItem();
        $this->setUser($user);
        $this->setPin($pin);
        $this->reservationOptions = $reservationOptions;
    }

    /**
     * Gets uri path component for current action.
     *
     * @return string
     *   Uri path component where actual action can be accessed.
     */
    public function getUri(): string
    {
        return 'patron/reservations';
    }

    /**
     * Gets the request parameters for current action.
     *
     * @return array
     *   A set of parameters to be sent with the request.
     */
    public function getParameters(): array
    {
        return [
            'user' => $this->getUser(),
            'pin' => $this->getPin(),
            'reservationId' => $this->reservationOptions['reservationId'],
            'branchId' => $this->reservationOptions['branchId'],
            'to' => $this->reservationOptions['to'],
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
     * Parses the raw result into an usable object.
     *
     * @param array $rawData
     *   Raw result from service.
     *
     * @return \LMS\Result\ResultInterface
     *   Raw result.
     */
    public function parseResult(array $rawData): ResultInterface
    {
        // TODO: Implement parseResult() method.
    }
}
