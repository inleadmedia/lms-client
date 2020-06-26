<?php

namespace LMS\Request;

/**
 * Class PatronsUpdate
 *
 * @package LMS\Request
 */
class PatronsUpdate implements PatronsUpdateRequestInterface
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
    protected $data;

    /**
     * PatronsUpdate constructor.
     *
     * @param $username
     * @param $password
     * @param $data
     */
    public function __construct($username, $password, $data)
    {
        $this->username = $username;
        $this->password = $password;
        $this->data = $data;
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
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @inheritDoc
     */
    public function parseResult(array $rawData)
    {
        // TODO: Implement parseResult() method.
    }
}
