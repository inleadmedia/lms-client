<?php

namespace LMS\Object;

use LMS\Object\Common\LoanDetails;

/**
 * Class LoanObject
 *
 * @package LMS\Object
 */
class LoanObject implements LoanObjectInterface
{

    /**
     * @var
     */
    public $isRenewable;

    /**
     * @var
     */
    public $renewalStatusList;

    /**
     * @var
     */
    public $isLongtermLoan;

    /** @var \LMS\Object\Common\LoanDetails $loanDetails */
    public $loanDetails;

    /**
     * LoanObject constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $k => $v) {
            $func = 'set' . ucwords($k);
            if (method_exists(self::class, $func)) {
                $this->{$func}($v);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIsRenewable()
    {
        return $this->isRenewable;
    }

    /**
     * @param mixed $isRenewable
     */
    public function setIsRenewable($isRenewable)
    {
        $this->isRenewable = $isRenewable;
    }

    /**
     * @return mixed
     */
    public function getRenewalStatusList()
    {
        return $this->renewalStatusList;
    }

    /**
     * @param mixed $renewalStatusList
     */
    public function setRenewalStatusList($renewalStatusList)
    {
        $this->renewalStatusList = $renewalStatusList;
    }

    /**
     * @return mixed
     */
    public function getIsLongtermLoan()
    {
        return $this->isLongtermLoan;
    }

    /**
     * @param mixed $isLongtermLoan
     */
    public function setIsLongtermLoan($isLongtermLoan)
    {
        $this->isLongtermLoan = $isLongtermLoan;
    }

    /**
     * @return mixed
     */
    public function getLoanDetails()
    {
        return new LoanDetails($this->loanDetails);
    }

    /**
     * @param mixed $loanDetails
     */
    public function setLoanDetails($loanDetails)
    {
        $this->loanDetails = new LoanDetails($loanDetails);
    }
}
