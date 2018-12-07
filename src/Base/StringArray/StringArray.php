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

    protected function implode($delimiter = null)
    {
        return implode($delimiter ?? $this->delimiter, $this->array->all());
    }

    protected function newStr($delimiter = null)
    {
        return new Str($this->implode($delimiter));
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
        return $this->newStr();
    }

    public function trim()
    {
        $array = $this->array
        ->filter('strlen')
        ->map('trim')
        ->values();

        $this->array->exchangeArray($array);
        return $this;
    }
}
