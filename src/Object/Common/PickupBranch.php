<?php

namespace LMS\Object\Common;

/**
 * Class PickupBranch
 *
 * @package LMS\Object\Common
 */
class PickupBranch
{

    /**
     * @var
     */
    public $id;

    /**
     * @var
     */
    public $name;

    /**
     * PickupBranch constructor.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $k => $v) {
            $this->{$k} = $v;
        }
    }
}
