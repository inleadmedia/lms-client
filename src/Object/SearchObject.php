<?php

namespace LMS\Object;

/**
 * Class SearchObject.
 *
 * TODO: Rely on interface of some sort.
 */
class SearchObject
{

    public $id;

    public $faustNumber;

    public $bibliofilid;

    public $title;

    public $author;

    public $type;

    public $subject;

    public $year;

    public $description;

    public $meta;

    public $cover;

    /**
     * SearchObject constructor.
     *
     * @param array $data
     *   Data array to populate the object with.
     */
    public function __construct(array $data)
    {
        foreach ($data as $k => $v) {
            $this->{$k} = $v;
        }
    }

    /**
     * Magic getter.
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
