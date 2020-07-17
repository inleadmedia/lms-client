<?php

namespace LMS\Object;

/**
 * Interface ReservationObjectInterface
 *
 * @package LMS\Object
 */
interface ReservationObjectInterface
{

    /**
     * @return mixed
     */
    public function getRecordId();

    /**
     * @param $recordId
     *
     * @return mixed
     */
    public function setRecordId($recordId);

    /**
     * @return mixed
     */
    public function getPickupBranch();

    /**
     * @param $pickupBranch
     *
     * @return mixed
     */
    public function setPickupBranch($pickupBranch);

    /**
     * @return mixed
     */
    public function getExpiryDate();

    /**
     * @param $expiryDate
     *
     * @return mixed
     */
    public function setExpiryDate($expiryDate);

    /**
     * @return mixed
     */
    public function getReservationId();

    /**
     * @param $reservationId
     *
     * @return mixed
     */
    public function setReservationId($reservationId);

    /**
     * @return mixed
     */
    public function getPickupDeadline();

    /**
     * @param $pickupDeadline
     *
     * @return mixed
     */
    public function setPickupDeadline($pickupDeadline);

    /**
     * @return mixed
     */
    public function getLoanType();

    /**
     * @param $loanType
     *
     * @return mixed
     */
    public function setLoanType($loanType);

    /**
     * @return mixed
     */
    public function getDateOfReservation();

    /**
     * @param $dateOfReservation
     *
     * @return mixed
     */
    public function setDateOfReservation($dateOfReservation);

    /**
     * @return mixed
     */
    public function getPeriodical();

    /**
     * @param $periodical
     *
     * @return mixed
     */
    public function setPeriodical($periodical);

    /**
     * @return mixed
     */
    public function getIlBibliographicRecord();

    /**
     * @param $ilBibliographicRecord
     *
     * @return mixed
     */
    public function setIlBibliographicRecord($ilBibliographicRecord);

    /**
     * @return mixed
     */
    public function getState();

    /**
     * @param $state
     *
     * @return mixed
     */
    public function setState($state);

    /**
     * @return mixed
     */
    public function getMaterial();

    /**
     * @param $material
     *
     * @return mixed
     */
    public function setMaterial($material);

    /**
     * @param $field
     *
     * @return mixed
     */
    public function getProviderSpecificFields($field);

    /**
     * @param $providerSpecificFields
     *
     * @return mixed
     */
    public function setProviderSpecificFields($providerSpecificFields);

    /**
     * @return mixed
     */
    public function getNumberInQueue();

    /**
     * @param $numberInQueue
     *
     * @return mixed
     */
    public function setNumberInQueue($numberInQueue);

    /**
     * @return mixed
     */
    public function getPickupNumber();

    /**
     * @param $pickupNumber
     *
     * @return mixed
     */
    public function setPickupNumber($pickupNumber);
}
