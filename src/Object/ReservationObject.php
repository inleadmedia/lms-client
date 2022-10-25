<?php

namespace LMS\Object;

use LMS\Object\Material;
use LMS\Object\PickupBranch;
use LMS\Object\ProviderSpecificFields;

/**
 * Class ReservationObject
 *
 * @package LMS\Object
 */
class ReservationObject implements ReservationObjectInterface
{

    /**
     * @var
     */
    public $recordId;

    /**
     * @var
     */
    public $pickupBranch;

    /**
     * @var
     */
    public $expiryDate;

    /**
     * @var
     */
    public $reservationId;

    /**
     * @var
     */
    public $pickupDeadline;

    /**
     * @var
     */
    public $loanType;

    /**
     * @var
     */
    public $dateOfReservation;

    /**
     * @var
     */
    public $periodical;

    /**
     * @var
     */
    public $ilBibliographicRecord;

    /**
     * @var
     */
    public $state;

    /**
     * @var
     */
    public $material;

    /**
     * @var
     */
    public $providerSpecificFields;

    /**
     * @var
     */
    public $numberInQueue;

    /**
     * @var
     */
    public $pickupNumber;

    /**
     * ReservationObject constructor.
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
     * @inheritDoc
     */
    public function getRecordId()
    {
        $matches = preg_match('/(?<=:)(.*?)(?=,)/', $this->reservationId, $match);
        $a = 1;
        $this->setRecordId(reset($match));
        return $this->recordId;
    }

    /**
     * @inheritDoc
     */
    public function setRecordId($recordId)
    {
        $this->recordId = $recordId;
    }

    /**
     * @inheritDoc
     */
    public function getPickupBranch()
    {
        return new PickupBranch($this->pickupBranch);
    }

    /**
     * @inheritDoc
     */
    public function setPickupBranch($pickupBranch)
    {
        $this->pickupBranch = new PickupBranch($pickupBranch);
    }

    /**
     * @inheritDoc
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * @inheritDoc
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * @inheritDoc
     */
    public function getReservationId()
    {
        return $this->reservationId;
    }

    /**
     * @inheritDoc
     */
    public function setReservationId($reservationId)
    {
        $this->reservationId = $reservationId;
    }

    /**
     * @inheritDoc
     */
    public function getPickupDeadline()
    {
        return $this->pickupDeadline;
    }

    /**
     * @inheritDoc
     */
    public function setPickupDeadline($pickupDeadline)
    {
        $this->pickupDeadline = $pickupDeadline;
    }

    /**
     * @inheritDoc
     */
    public function getLoanType()
    {
        return $this->loanType;
    }

    /**
     * @inheritDoc
     */
    public function setLoanType($loanType)
    {
        $this->loanType = $loanType;
    }

    /**
     * @inheritDoc
     */
    public function getDateOfReservation()
    {
        return $this->dateOfReservation;
    }

    /**
     * @inheritDoc
     */
    public function setDateOfReservation($dateOfReservation)
    {
        $this->dateOfReservation = $dateOfReservation;
    }

    /**
     * @inheritDoc
     */
    public function getPeriodical()
    {
        return $this->periodical;
    }

    /**
     * @inheritDoc
     */
    public function setPeriodical($periodical)
    {
        $this->periodical = $periodical;
    }

    /**
     * @inheritDoc
     */
    public function getIlBibliographicRecord()
    {
        return $this->ilBibliographicRecord;
    }

    /**
     * @inheritDoc
     */
    public function setIlBibliographicRecord($ilBibliographicRecord)
    {
        $this->ilBibliographicRecord = $ilBibliographicRecord;
    }

    /**
     * @inheritDoc
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @inheritDoc
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @inheritDoc
     */
    public function getMaterial()
    {
        return new Material($this->material);
    }

    /**
     * @inheritDoc
     */
    public function setMaterial($material)
    {
        $this->material = $material;
    }

    /**
     * @inheritDoc
     */
    public function getProviderSpecificFields($field = '')
    {
        return new ProviderSpecificFields((array) $this->providerSpecificFields, $field = '');
    }

    /**
     * @inheritDoc
     */
    public function setProviderSpecificFields($providerSpecificFields)
    {
        $this->providerSpecificFields = new ProviderSpecificFields($providerSpecificFields);
    }

    /**
     * @inheritDoc
     */
    public function getNumberInQueue()
    {
        return $this->numberInQueue = 1;
    }

    /**
     * @inheritDoc
     */
    public function setNumberInQueue($numberInQueue)
    {
        $this->numberInQueue = $numberInQueue;
    }

    /**
     * @inheritDoc
     */
    public function getPickupNumber()
    {
        return $this->pickupNumber;
    }

    /**
     * @inheritDoc
     */
    public function setPickupNumber($pickupNumber)
    {
        $this->pickupNumber = $pickupNumber;
    }
}
