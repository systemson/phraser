<?php

namespace Amber\Phraser\Base\StringArray;

use Amber\Phraser\Str;

trait ArrayAccessTrait
{
    public function offsetGet($offset)
    {
        return new Str(parent::offsetGet($offset));
    }
}
