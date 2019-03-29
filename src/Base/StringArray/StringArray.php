<?php

namespace Amber\Phraser\Base\StringArray;

use Amber\Collection\Collection;
use Amber\Phraser\Str;

class StringArray implements \ArrayAccess
{
    use ArrayAccessTrait, CaseHandlerTrait;

    protected $array;

    protected $delimiter;

    public function __construct(array $array, $delimiter = null)
    {
        $this->array = new Collection($array);

        $this->delimiter = $delimiter;
    }

    protected function newStr($delimiter = null)
    {
        return new Str($this->implode($delimiter ?? $this->delimiter));
    }

    public function implode($delimiter = null)
    {
        return implode($delimiter ?? $this->delimiter, $this->array->all());
    }

    public function __toString()
    {
        return $this->implode($this->delimiter);
    }

    public function toArray()
    {
        return $this->array->all();
    }

    public function toString()
    {
        return $this->newStr();
    }

    public function trim()
    {
    	$array = $this->array
        ->filter(function ($value) {
        	return strlen($value);
        })
        ->map(function ($value) {
        	return trim($value);
        })
        ->values();

        $this->array->exchangeArray($array);
        return $this;
    }

    public function last()
    {
        return $this->newStr($this->array->last());
    }
}
