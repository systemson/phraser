<?php

namespace Amber\StringObject\Base;

class BaseString implements \JsonSerializable, \ArrayAccess
{
    use Essential;

    /**
     * @var 
     */
    protected $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function contains($needle)
    {
        return strpos($this->string, $needle) !== false;
    }

    public function has($needle)
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
        if ($this->has($offset)) {
            $this->string = str_replace($offset, $value, $this->string);
        } elseif (is_null($offset)) {
            $this->string .= $value;
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
