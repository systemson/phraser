<?php

namespace Amber\Phraser\Base\String;

trait ArrayAccessTrait
{
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
