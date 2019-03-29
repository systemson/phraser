<?php

namespace Amber\Phraser\Base\String;

trait CaseHandlerTrait
{
    public function toLowerCase()
    {
        $this->string = strtolower($this->string);
        return $this;
    }

    public function lowerCaseFirst()
    {
        $this->string = lcfirst($this->string);
        return $this;
    }

    public function toUpperCase()
    {
        $this->string = strtoupper($this->string);
        return $this;
    }

    public function upperCaseFirst()
    {
        $this->string = ucfirst($this->string);
        return $this;
    }
}
