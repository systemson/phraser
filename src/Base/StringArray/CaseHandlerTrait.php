<?php

namespace Amber\Phraser\Base\StringArray;

trait CaseHandlerTrait
{
    public function toCamelCase($lower = false)
    {
        $this->array = $this->array->map('ucfirst');

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
        return $this->newStr(' ')->toUpperCase();
    }

    public function toLowerCase()
    {
        return $this->newStr(' ')->toLowerCase();
    }
}
