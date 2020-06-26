<?php

namespace LMS\Request;

/**
 * Class Patrons
 *
 * @package LMS\Request
 */
class Patrons implements PatronsRequestInterface
{

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * Patrons constructor.
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
        return 'patron/info';
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
