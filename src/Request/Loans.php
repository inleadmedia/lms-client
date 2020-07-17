<?php

namespace LMS\Request;

use LMS\Object\LoanObject;
use LMS\Result\Loans as LoansResult;

/**
 * Class Loans
 *
 * @package LMS\Request
 */
class Loans implements LoansRequestInterface
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
     * Loans constructor.
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
        return 'patron/loans';
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
        return [];
    }

    /**
     * @inheritDoc
     */
    public function parseResult(array $rawData)
    {
        $objects = [];

        foreach ($rawData as $rawObject) {
            $objects[] = new LoanObject($rawObject);
        }

        return new LoansResult($this, $objects);
    }
}
