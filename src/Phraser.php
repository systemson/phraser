<?php

namespace Amber\Phraser;

use Amber\Phraser\Base\StringArray\StringArray;

class Phraser
{
    public static function fromCamelCase($string)
    {
        $array = preg_split('/(?=[A-Z])/', $string);

        return new StringArray($array);
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

    public static function fromString($string)
    {
        $raw = explode(' ', strtolower($string));

        return (new StringArray($raw, ' '))->trim();
    }

    public static function last(string $string, string $delimiter = '.')
    {
    	$array = explode($delimiter, $string);

    	return end($array);
    }
}
