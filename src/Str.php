<?php

namespace Amber\Phraser;

use Amber\Phraser\Base\String\StringObject;

class Str extends StringObject
{
    /**
     * @var string The content of the class.
     */
    protected $string = '';

    public function __construct(string $string)
    {
        $this->string = $string;
    }

    public static function fromCamelCase($string)
    {
        $array = preg_split('/(?=[A-Z])/', $this->tring);

        return (new StringArray($array))->trim();
    }

    public static function fromSnakeCase($string)
    {
        $array = explode('_', $this->tring);

        return new StringArray($array, '_');
    }

    public static function fromKebabCase($string)
    {
        $array = explode('-', $this->tring);

        return new StringArray($array, '-');
    }
}
