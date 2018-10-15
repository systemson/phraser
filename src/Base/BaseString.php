<?php

namespace Amber\Phraser\Base;

class BaseString implements \JsonSerializable, \ArrayAccess
{
    use Essential;

    /**
     * @var string The content of the class.
     */
    protected $string = '';

    public function __construct($string = '')
    {
        $this->string = $string;
    }

    public function set(string $string)
    {
        return $this->string = $string;
    }

    public function contains(string $needle)
    {
        return strpos($this->string, $needle) !== false;
    }

    public function has(string $needle)
    {
        return $this->contains($needle);
    }

    public function trim()
    {
        $this->string = trim($this->string);
        return $this;
    }

    public function fix()
    {
        $this->string = preg_replace("/\s+/", ' ', $this->string);
        return $this;
    }

    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    public function offsetGet($offset)
    {
        return;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->string .= $value;
        } elseif ($this->has($offset)) {
            $this->string = str_replace($offset, $value, $this->string);
        } elseif (is_int($offset)) {
            $this->string = substr_replace($this->string, $value, $offset, 0);
        } else {
            throw new \Exception("Current string does not contains \"{$offset}\".");
        }
    }

    public function offsetUnset($offset)
    {
        $this->string = str_replace($offset, '', $this->string);
    }
}
