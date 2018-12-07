<?php

namespace Amber\Phraser\Base\StringArray;

use Amber\Phraser\Str;

trait ArrayAccessTrait
{
    public function offsetExists($offset)
    {
        return $this->array->has($offset);
    }

    public function offsetGet($offset)
    {
        return new Str($this->array[$offset]);
    }

    public function offsetSet($offset, $value)
    {
        if (is_int($offset)) {
            $this->array->put($offset, $value);
        } else {
            $this->array->push($value);
        }
    }

    public function offsetUnset($offset)
    {
        $this->array->delete($offset);
        $this->trim();
    }
}
