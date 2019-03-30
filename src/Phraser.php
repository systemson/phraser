<?php

namespace Amber\Phraser;

use Amber\Phraser\Base\StringArray\StringArray;

class Phraser
{
    public static function fromString($string)
    {
        $raw = explode(' ', strtolower($string));

        return (new StringArray($raw, ' '))->trim();
    }

    public static function fromCamelCase($string)
    {
        $array = preg_split('/(?=[A-Z])/', $string);

        return (new StringArray($array))->trim();
    }

    public static function fromSnakeCase($string)
    {
        $raw = explode('_', $string);

        return new StringArray($raw, '_');
    }

    public static function fromKebabCase($string)
    {
        $raw = explode('-', $string);

        return new StringArray($raw, '-');
    }

    public static function last(string $string, string $delimiter = '.')
    {
        $array = new StringArray(explode($delimiter, $string));

        return $array->last();
    }

    public static function first(string $string, string $delimiter = '.')
    {
        $array = new StringArray(explode($delimiter, $string));

        return $array->first();
    }

    public static function getInstance(string $string): Str
    {
    	return new Str($string);
    }

    public static function __callStatic($method, $args = []): Str
    {
    	$string = $args[0];

    	$instance = static::getInstance($string);

    	call_user_func_array([$instance, $method], $args);
    	return $instance;
    }
}
