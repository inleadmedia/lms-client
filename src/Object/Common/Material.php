<?php

namespace LMS\Object\Common;

/**
 * Class Material
 *
 * @package LMS\Object\Common
 */
class Material
{

    /**
     * @var
     */
    public $title;

    /**
     * @var
     */
    public $author;

    /**
     * @var
     */
    public $type;

    /**
     * Material constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        foreach ($data as $k => $v) {
            $this->{$k} = $v;
        }
    }

    /**
     * Magic getter.
     *
     * @param $name
     *
     * @return |null
     */
    public function __get($name)
    {
        if (!property_exists(self::class, $name)) {
            return null;
        }

        return $this->{$name};
    }

    /**
     * Magic setter.
     *
     * @param $name
     * @param $value
     *
     * @return \LMS\Object\Common\Material
     */
    public function __set($name, $value)
    {
        if (!property_exists(self::class, $name)) {
            return $this;
        }

        $this->{$name} = $value;

        return $this;
    }
}
