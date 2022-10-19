<?php

namespace LMS\Request;

use LMS\Result\ResultInterface;
use LMS\Traits\WriteCredsToSession;

class ReservationDelete implements ReservationsRequestInterface
{
    use WriteCredsToSession;

    /**
     * @var int
     */
    protected $reservationId;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pin;

    /**
     * ReservationsDelete constructor.
     *
     * @param string $reservationId
     */
    public function __construct(string $reservationId)
    {
        [$user, $pin] = $this->getSessionItem();
        $this->setUser($user);
        $this->setPin($pin);
        $this->reservationId = $reservationId;
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
            'reservationId' => $this->reservationId,
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
    public function setUser($user): void
    {
        $this->user = $user;
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
    public function setPin($pin): void
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
     * Parses the raw result into a usable object.
     *
     * @param array $rawData
     *   Raw result from service.
     *
     * @return void Raw result.
     *   Raw result.
     */
    public function parseResult(array $rawData): ResultInterface
    {
        // TODO: Implement parseResult() method.
    }
}
