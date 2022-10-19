<?php

namespace LMS\Object\FBS;

use LMS\Object\Common\Material;
use LMS\Object\Common\PickupBranch;
use LMS\Object\Common\ProviderSpecificFields;
use LMS\Object\ReservationObjectInterface;

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
     * @return mixed
     */
    public function getMaterial()
    {
        return new Material($this->material);
    }

    /**
     * @param mixed $material
     */
    public function setMaterial($material)
    {
        $this->material = new Material($material);
    }

    /**
     * @return mixed
     */
    public function getRecordId()
    {
        if (empty($this->recordId)) {
            $this->setRecordId($this->providerSpecificFields->recordId);
        }
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
    public function getPickupBranch()
    {
        return new PickupBranch($this->pickupBranch);
    }

    /**
     * @param mixed $pickupBranch
     */
    public function setPickupBranch($pickupBranch)
    {
        $this->pickupBranch = new PickupBranch($pickupBranch);
    }

    /**
     * @return mixed
     */
    public function getExpiryDate()
    {
        return $this->getProviderSpecificFields('expiryDate');
    }

    /**
     * @param mixed $expiryDate
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * @param string $field
     *
     * @return mixed
     */
    public function getProviderSpecificFields($field = '')
    {
        return new ProviderSpecificFields((array) $this->providerSpecificFields, $field = '');
    }

    /**
     * @param mixed $providerSpecificFields
     */
    public function setProviderSpecificFields($providerSpecificFields)
    {
        $this->providerSpecificFields = new ProviderSpecificFields($providerSpecificFields);
    }

    /**
     * @return mixed
     */
    public function getReservationId()
    {
        return $this->reservationId;
    }

    /**
     * @param mixed $reservationId
     */
    public function setReservationId($reservationId)
    {
        $this->reservationId = $reservationId;
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
    public function getDateOfReservation()
    {
        return $this->dateOfReservation;
    }

    /**
     * @param mixed $dateOfReservation
     */
    public function setDateOfReservation($dateOfReservation)
    {
        $this->dateOfReservation = $dateOfReservation;
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
    public function getNumberInQueue()
    {
        return $this->numberInQueue;
    }

    /**
     * @param mixed $numberInQueue
     */
    public function setNumberInQueue($numberInQueue)
    {
        $this->numberInQueue = $this->providerSpecificFields['numberInQueue'];
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
}
