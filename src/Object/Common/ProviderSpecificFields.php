<?php

namespace LMS\Object\Common;

/**
 * Class ProviderSpecificFields
 *
 * @package LMS\Object\Common
 */
class ProviderSpecificFields
{

    /**
     * @var
     */
    public $recordId;

    /**
     * @var
     */
    public $state;

    /**
     * @var
     */
    public $pickupDeadline;

    /**
     * @var
     */
    public $expiryDate;

    /**
     * @var
     */
    public $numberInQueue;

    /**
     * @var
     */
    public $periodical;

    /**
     * @var
     */
    public $pickupNumber;

    /**
     * @var
     */
    public $ilBibliographicRecord;

    /**
     * @var
     */
    public $loanType;

    /**
     * @var
     */
    public $ordord;

    /**
     * ProviderSpecificFields constructor.
     *
     * @param array $data
     * @param string $filter
     */
    public function __construct(array $data, $filter = '')
    {
        foreach ($data as $k => $v) {
            $this->{$k} = $v;
        }
    }

    /**
     * @return mixed
     */
    public function getRecordId()
    {
        return $this->recordId;
    }

    /**
     * @param mixed $recordId
     */
    public function setRecordId($recordId)
    {
        $this->recordId = $recordId;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getPickupDeadline()
    {
        return $this->pickupDeadline;
    }

    /**
     * @param mixed $pickupDeadline
     */
    public function setPickupDeadline($pickupDeadline)
    {
        $this->pickupDeadline = $pickupDeadline;
    }

    /**
     * @return mixed
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * @param mixed $expiryDate
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * @return mixed
     */
    public function getNumberInQueue()
    {
        return $this->numberInQueue;
    }

    /**
     * @param mixed $numberInQueue
     */
    public function setNumberInQueue($numberInQueue)
    {
        $this->numberInQueue = $numberInQueue;
    }

    /**
     * @return mixed
     */
    public function getPeriodical()
    {
        return $this->periodical;
    }

    /**
     * @param mixed $periodical
     */
    public function setPeriodical($periodical)
    {
        $this->periodical = $periodical;
    }

    /**
     * @return mixed
     */
    public function getPickupNumber()
    {
        return $this->pickupNumber;
    }

    /**
     * @param mixed $pickupNumber
     */
    public function setPickupNumber($pickupNumber)
    {
        $this->pickupNumber = $pickupNumber;
    }

    /**
     * @return mixed
     */
    public function getIlBibliographicRecord()
    {
        return $this->ilBibliographicRecord;
    }

    /**
     * @param mixed $ilBibliographicRecord
     */
    public function setIlBibliographicRecord($ilBibliographicRecord)
    {
        $this->ilBibliographicRecord = $ilBibliographicRecord;
    }

    /**
     * @return mixed
     */
    public function getLoanType()
    {
        return $this->loanType;
    }

    /**
     * @param mixed $loanType
     */
    public function setLoanType($loanType)
    {
        $this->loanType = $loanType;
    }

    /**
     * @return mixed
     */
    public function getOrdord()
    {
        return $this->ordord;
    }

    /**
     * @param mixed $ordord
     */
    public function setOrdord($ordord)
    {
        $this->ordord = $ordord;
    }
}
