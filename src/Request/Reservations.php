<?php

namespace LMS\Request;

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
     * Reservations constructor.
     *
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
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
        // TODO: Implement parseResult() method.
    }
}
