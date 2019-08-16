<?php

namespace Amber\Phraser\Base\String;

abstract class StringObject implements \JsonSerializable, \ArrayAccess
{
    use EssentialTrait, ArrayAccessTrait, CaseHandlerTrait;

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

    public function fix()
    {
        $this->string = preg_replace("/\s+/", ' ', $this->string);
        return $this;
    }

    public function remove(string $search): self
    {
        return $this->replace($search);
    }

    public function removeAll(array $search): self
    {
        return $this->replace($search);
    }
}
