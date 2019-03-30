<?php

namespace Amber\Phraser\Base\StringArray;

use Amber\Collection\Collection;
use Amber\Phraser\Str;

class StringArray extends Collection
{
    use CaseHandlerTrait, ArrayAccessTrait;

    protected $delimiter = '';

    public function __construct(array $array, $delimiter = '')
    {
        $this->delimiter = $delimiter;

        parent::__construct($array);
    }

    protected function newStr($delimiter = null)
    {
        return new Str($this->implode($delimiter ?? $this->delimiter));
    }

    public function __toString()
    {
        return $this->implode($this->delimiter);
    }

    public function toString()
    {
        return $this->newStr();
    }

    public function trim()
    {
        $array = $this->filter(function ($value) {
            return strlen($value);
        })
        ->map(function ($value) {
            return trim($value);
        })
        ->values();

        $this->exchangeArray($array);
        return $this;
    }

    public function first()
    {
        return $this->newStr(parent::first());
    }

    public function last()
    {
        return $this->newStr(parent::last());
    }
}
