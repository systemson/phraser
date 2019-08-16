<?php

namespace Amber\Phraser\Base\String;

use Amber\Phraser\Base\StringArray\StringArray;

/**
 * Implements the basis for the String Object.
 */
trait EssentialTrait
{
    /**
     * Returns a new string.
     *
     * @param string $string.
     *
     * @return static a new Instance of the StringObject.
     */
    public static function make(string $string = ''): self
    {
        return new static($string);
    }

    public function contains(string $needle)
    {
        return strpos($this->string, $needle) !== false;
    }

    /**
     * Returns an array of the string.
     *
     * @return array An array of the words in the string.
     */
    public function explode(string $delimiter = ', '): StringArray
    {
        $array = explode($delimiter, $this->string);

        return new StringArray($array, $delimiter);
    }

    /**
     * Alias for explode().
     *
     * @return array An array of the words in the string.
     */
    public function toArray(string $delimiter): array
    {
        return explode($delimiter, $this->string);
    }

    /**
     * Returns an array of the string's words.
     *
     * @return array An array of the words in the string.
     */
    public function words(): StringArray
    {
        return $this->explode(' ');
    }

    /**
     * Returns an array of the string's lines.
     *
     * @return array An array of the lines in the string.
     */
    public function lines(): StringArray
    {
        $this->string = preg_replace("#\r\n|\r|\n|\t#", PHP_EOL, $this->string);

        return new StringArray($this->toArray(PHP_EOL), PHP_EOL);
    }

    /**
     * Returns an json representation of the string.
     *
     * @return string The json representation of the string.
     */
    public function toJson(): string
    {
        return json_encode($this->string);
    }

    /**
     * Returns the string for json serialization.
     *
     * @return string
     */
    public function jsonSerialize(): string
    {
        return $this->string;
    }

    /**
     * Returns the wrapped string.
     *
     * @return string
     */
    public function toString(): string
    {
        return $this->string;
    }

    public function __toString(): string
    {
        return $this->string;
    }

    /**
     * Creates a shallow copy of the string.
     *
     * @return String a shallow copy of the string.
     */
    public function copy(): self
    {
        return static::make($this->string);
    }

    /**
     * Alias for copy.
     *
     * @return String a shallow copy of the string.
     */
    public function clone(): self
    {
        return $this->copy();
    }

    /**
     * Replaces the string.
     *
     * @param string|array $search  The string(s) to search for.
     * @param string       $replace The string to replace.
     *
     * @return static
     */
    public function replace($search, string $replace = ''): self
    {
        $string = str_replace($search, $replace, $this->string);

        return static::make($string);
    }

    /**
     * Replaces the string.
     *
     * @param string|array $pattern  The string(s) to search for.
     * @param string       $replace The string to replace.
     *
     * @return static
     */
    public function pregReplace($pattern, string $replace = ''): self
    {
        $string = preg_replace($pattern, $replace, $this->string);

        return static::make($string);
    }

    /**
     * Returns whether the string is empty.
     *
     * @return bool Whether the string is empty.
     */
    public function isEmpty(): bool
    {
        return empty($this->string);
    }

    /**
     * Returns the size of the string.
     *
     * @return int
     */
    public function length(): int
    {
        return strlen($this->string);
    }

    /**
     * Reverses the order of the string.
     *
     * @return static
     */
    public function reverse(): self
    {
        $string = strrev($this->string);

        return static::make($string);
    }

    /**
     * Adds a sub-string at the start of the string.
     *
     * @param string $substr
     * @param mixed  $condition
     *
     * @return self
     */
    public function prepend(string $substr, $condition = true): self
    {
        $string = $this->string;

        if ($condition) {
            $string =  "{$substr}{$string}";
        }

        return static::make($string ?? '');
    }

    /**
     * Adds a sub-string at the end of the string.
     *
     * @param string $substr
     * @param mixed  $condition
     *
     * @return self
     */
    public function append(string $substr, $condition = true): self
    {
        $string = $this->string;

        if ($condition) {
            $string .= $substr;
        }

        return static::make($string ?? '');
    }

    /**
     * Adds a end of line at the end of the string.
     *
     * @param int $multiplier How many EOL would be added.
     *
     * @return self
     */
    public function eol(int $multiplier = 1): self
    {
        return static::make($this->append(str_repeat(PHP_EOL, $multiplier)));
    }
}
