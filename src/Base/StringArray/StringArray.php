<?php

namespace Amber\Phraser\Base\StringArray;

use Amber\Collection\TypedCollection as Collection;
use Amber\Phraser\Phraser;

class StringArray extends Collection
{
    use CaseHandlerTrait;

    protected $delimiter = '';

    public function __construct(array $array, string $delimiter = '')
    {
        parent::__construct([], 'string');

        $this->delimiter = $delimiter;

        $this->setMultiple(array_values($array));
    }

    protected function newStr(string $delimiter = null)
    {
        return new Phraser($this->implode($delimiter ?? $this->delimiter));
    }

    public function __toString(): string
    {
        return $this->implode($this->delimiter);
    }

    public function toString(): string
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
        return new Phraser(parent::first());
    }

    public function withoutFirst()
    {
        $first = parent::first();

        return $this->newStr()
            ->replace($first)
            ->trim()
        ;
    }

    public function last()
    {
        return new Phraser(parent::last());
    }

    public function withoutLast()
    {
        $last = parent::last();

        return $this->newStr()
            ->replace($last)
            ->trim()
        ;
    }
}
