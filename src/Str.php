<?php

namespace Amber\Phraser;

use Amber\Phraser\Base\String\StringObject;

class Str extends StringObject
{
    /**
     * @var string The content of the class.
     */
    protected $string = '';

    public function __construct($string = '')
    {
        $this->string = $string;
    }
}
