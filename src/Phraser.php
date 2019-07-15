<?php

namespace Amber\Phraser;

use Amber\Phraser\Base\StringArray\StringArray;
use Spatie\Macroable\Macroable;

class Phraser
{
    use Macroable;

    /**
     * Returns a new string.
     *
     * @param string $string.
     *
     * @return static a new Instance of the StringObject.
     */
    public static function make(string $string = ''): Str
    {
        return new Str($string);
    }

    public static function fromString($string)
    {
        $raw = explode(' ', strtolower($string));

        return (new StringArray($raw, ' '))->trim();
    }

    public static function getInstance(string $string): Str
    {
        return Str::make($string);
    }

    public static function __callStatic($method, $args = [])
    {
        $string = $args[0];
        unset($args[0]);

        $instance = static::getInstance($string);

        return call_user_func_array([$instance, $method], $args);
    }
}
