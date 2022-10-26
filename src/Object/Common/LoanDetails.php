<?php

namespace LMS\Object\Common;

/**
 * Class LoanDetails
 *
 * @package LMS\Object
 */
class LoanDetails
{

    /**
     * @var
     */
    public $recordId;

    /**
     * @var
     */
    public $loanId;

    /**
     * @var
     */
    public $materialItemNumber;

    /**
     * @var
     */
    public $periodical;

    /**
     * @var
     */
    public $loanDate;

    /**
     * @var
     */
    public $dueDate;

    /**
     * @var
     */
    public $loanType;

    /**
     * @var
     */
    public $ilBibliographicRecord;

    /**
     * @var \LMS\Object\Common\Material $material
     */
    public $material;

    /**
     * LoanDetails constructor.
     *
     * @param $data
     */
    public function __construct($data)
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
    public function getLoanId()
    {
        return $this->loanId;
    }

    /**
     * @param mixed $loanId
     */
    public function setLoanId($loanId)
    {
        $this->loanId = $loanId;
    }

    /**
     * @return mixed
     */
    public function getMaterialItemNumber()
    {
        return $this->materialItemNumber;
    }

    /**
     * @param mixed $materialItemNumber
     */
    public function setMaterialItemNumber($materialItemNumber)
    {
        $this->materialItemNumber = $materialItemNumber;
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
    public function getLoanDate()
    {
        return $this->loanDate;
    }

    /**
     * @param mixed $loanDate
     */
    public function setLoanDate($loanDate)
    {
        $this->loanDate = $loanDate;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;
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
}
