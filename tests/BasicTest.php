<?php

namespace Tests;

use Amber\StringObject\Str;
use PHPUnit\Framework\TestCase;

class ServiceTest extends TestCase
{
    public function testService()
    {
        $raw = 'Hello world';

        $string = new Str($raw);

        $this->assertEquals($raw, (string) $string);

    }
}
