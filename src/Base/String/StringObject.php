<?php

namespace Amber\Phraser\Base\String;

abstract class StringObject implements \JsonSerializable
{
    use EssentialTrait,
        CaseHandlerTrait
    ;

    public function exchangeString(string $string): void
    {
        $this->string = $string;
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
}
