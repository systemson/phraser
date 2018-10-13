<?php

namespace Amber\StringObject\Base;

use Amber\Collection\Collection;
use Amber\StringObject\Str;

class StringArray implements \ArrayAccess
{
    protected $array;

    protected $delimiter;

    public function __construct(array $array, $delimiter = ' ')
    {
        $this->array = new Collection($array);

        $this->delimiter = $delimiter;
    }

    protected function implode()
    {
        return implode($this->delimiter, $this->array->all());
    }

    public function __toString()
    {
        return $this->implode();
    }

    public function toArray()
    {
        return $this->array->all();
    }

    public function toString()
    {
        return new Str($this->implode());
    }

    public function trim()
    {
        $this->array = $this->array->filter('strlen');
        return $this;
    }

    public function offsetExists($offset)
    {
        return $this->array->has($offset);
    }

    public function offsetGet($offset)
    {
        return new Str($this->array->get($offset));
    }

    public function offsetSet($offset, $value)
    {
        if (is_int($offset)) {
            $this->array->put($offset, $value);
        } else {
            $this->array->push($value);
        }
    }

    public function offsetUnset($offset)
    {
        $this->array->remove($offset);
    }
}
