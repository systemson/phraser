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

    /**
     * Retruns a StringArray instance from the a camel case string.
     *
     * @return StringArray
     */
    public function fromCamelCase()
    {
        $array = preg_split('/(?=[A-Z])/', $this->string);

        return (new StringArray($array))->trim();
    }

    /**
     * Retruns a StringArray instance from the a snake case string.
     *
     * @return StringArray
     */
    public function fromSnakeCase()
    {
        $array = explode('_', $this->string);

        return new StringArray($array, '_');
    }

    /**
     * Retruns a StringArray instance from the a kebab case string.
     *
     * @return StringArray
     */
    public function fromKebabCase()
    {
        $array = explode('-', $this->string);

        return new StringArray($array, '-');
    }
}
