<?php

namespace Amber\Phraser;

use Amber\Phraser\Base\String\StringObject;
use Amber\Phraser\Base\StringArray\StringArray;

class Str extends StringObject
{
    /**
     * @var string The content of the class.
     */
    protected $string = '';

    public function __construct(string $string = null)
    {
        $this->string = $string ?? '';
    }

    public function fromCamelCase()
    {
        $array = preg_split('/(?=[A-Z])/', $this->string);

        return (new StringArray($array))->trim();
    }

    public function fromSnakeCase()
    {
        $array = explode('_', $this->string);

        return new StringArray($array, '_');
    }

    public function fromKebabCase()
    {
        $array = explode('-', $this->string);

        return new StringArray($array, '-');
    }
}
