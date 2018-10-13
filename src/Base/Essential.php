<?php

namespace Amber\StringObject\Base;

/**
 * Implements the basis for the Collection.
 */
trait Essential
{
    /**
     * Returns a new collection.
     *
     * @param string $string.
     *
     * @return static a new Instance of the collection.
     */
    protected function make($string = '')
    {
        return new static($string);
    }

    /**
     * Returns an array of the string.
     *
     * @return array An array of the words in the string.
     */
    public function toArray(string $delimiter): array
    {
        return explode($delimiter, $this->string);
    }

    /**
     * Returns an array of the string.
     *
     * @return array An array of the words in the string.
     */
    public function words(): StringArray
    {
        return new StringArray($this->toArray(' '), ' ');
    }

    /**
     * Returns an array of the string lines.
     *
     * @return array An array of the lines in the string.
     */
    public function lines(): StringArray
    {
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
     * Creates a shallow copy of the string.
     *
     * @return String a shallow copy of the string.
     */
    public function copy(): self
    {
        return $this->make($this->string);
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
     * @return void
     */
    public function replace(string $string)
    {
        $this->string = $string;
        return $this;
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
     * Returns the string for json serialization.
     *
     * @return string
     */
    public function jsonSerialize(): string
    {
        return $this->string;
    }

    /**
     * Reverses the order of the string.
     *
     * @return static
     */
    public function reverse()
    {
        $this->string = strrev($this->string);
        return $this;
    }

    /**
     * Returns a new reversed string.
     *
     * @return String A new reversed String instance.
     */
    public function reversed(): self
    {
        return $this->make(strrev($this->string));
    }

    public function __toString()
    {
        return $this->string;
    }
}
