<?php

namespace Amber\StringObject;

use Amber\StringObject\Base\Essential;

class Str
{
    use Essential;

    protected $string;

    public function __construct($string)
    {
        $this->string = $string;
    }
}
