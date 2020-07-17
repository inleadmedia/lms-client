<?php

namespace LMS\Request;

use LMS\Result\Reservations as ReservationsResult;

/**
 * Class Reservations
 *
 * @package LMS\Request
 */
class Reservations implements ReservationsRequestInterface
{

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var string
     */
    private $provider;

    /**
     * Reservations constructor.
     *
     * @param $username
     * @param $password
     * @param $provider
     */
    public function __construct($username, $password, $provider)
    {
        $this->username = $username;
        $this->password = $password;
        $this->provider = $provider;
    }

    /**
     * @inheritDoc
     */
    public function getUri()
    {
        return 'patron/reservations';
    }

    /**
     * @inheritDoc
     */
    public function getParameters()
    {
        return [
            'user' => $this->username,
            'pin' => $this->password,
        ];
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @inheritDoc
     */
    public function parseResult(array $rawData)
    {
        $objects = [];

        // @TODO: Find more adequate way to handle this.
        switch ($this->provider) {
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
}
