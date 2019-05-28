<?php

namespace Amber\Phraser\Base\StringArray;

trait CaseHandlerTrait
{
    public function toCamelCase($lower = false)
    {
        $array = $this->map(function ($value) {
            return ucfirst($value);
        });

        $this->exchangeArray($array->toArray());

        if ($lower) {
            return $this->newStr('')->lowerCaseFirst();
        }

        return $this->newStr('');
    }

    public function toSnakeCase()
    {
        return $this->newStr('_')->toLowerCase();
    }

    public function toKebabCase()
    {
        return $this->newStr('-')->toLowerCase();
    }

    public function toUpperCase()
    {
        return $this->newStr()->toUpperCase();
    }

    public function toLowerCase()
    {
        return $this->newStr()->toLowerCase();
    }
}
