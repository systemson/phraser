<?php

namespace Amber\Phraser\Base\String;

class StringObject implements \JsonSerializable, \ArrayAccess
{
    use EssentialTrait, ArrayAccessTrait, CaseHandlerTrait;

    public function set(string $string)
    {
        return $this->string = $string;
    }

    public function has(string $needle)
    {
        return $this->contains($needle);
    }

    public function contains(string $needle)
    {
        return strpos($this->string, $needle) !== false;
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
}
