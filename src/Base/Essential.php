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
     * @param array $array The items for the new collection.
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
     * @return array The items in the collection.
     */
    public function toArray(): array
    {
        //
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
     * Creates a shallow copy of the collection.
     *
     * @return Collection a shallow copy of the collection.
     */
    public function copy(): self
    {
        return $this->make($this->string);
    }

    /**
     * Alias for copy.
     *
     * @return Collection A shallow copy of the collection.
     */
    public function clone(): self
    {
        return $this->copy();
    }

    /**
     * Returns whether the collection is empty.
     *
     * @return bool Whether the collection is empty.
     */
    public function isEmpty(): bool
    {
        //
    }

    /**
     * Returns the size of the collection.
     *
     * @return int
     */
    public function count(): int
    {
        //
    }

    /**
     * Returns an array of the collection.
     *
     * @return array The items in the collection.
     */
    public function jsonSerialize(): string
    {
        return $this->string;
    }

    /**
     * Reverses the order of the collection.
     *
     * @return void
     */
    public function reverse()
    {
        //
    }

    /**
     * Returns a new reversed collection.
     *
     * @return Collection A new collection instance.
     */
    public function reversed(): self
    {
        //
    }

    public function __toString()
    {
        return $this->string;
    }
}
