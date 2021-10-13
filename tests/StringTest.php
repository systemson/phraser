<?php

namespace Tests;

use Amber\Phraser\Phraser as Str;
use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    public function testBasics()
    {
        $raw = '  Hello world ';

        $string = new Str($raw);

        $this->assertEquals($raw, (string) $string);
        $this->assertEquals($raw, $string->toString());

        $this->assertTrue($string->has('world'));

        $this->assertEquals(json_encode($raw), json_encode($string));
        $this->assertEquals(json_encode($raw), $string->toJson());

        $this->assertEquals($string, $string->clone());
        $this->assertInstanceOf(Str::class, $string->clone());

        $this->assertEquals(14, $string->length());

        $this->assertEquals(11, $string->trim()->length());

        $string = new Str($raw);

        $this->assertEquals(strrev($raw), $string = $string->reverse());
        $this->assertEquals($raw, $string->reverse());

        $this->assertFalse($string->isEmpty());

        $new = 'Hola mundo';
        $string->exchangeString($new);
        $this->assertEquals($new, (string) $string);

        return $string;
    }

    public function testAppendPrepend()
    {
        $raw1 = 'Wapper class';
        $raw2 = ' to handle strings.';

        $string = new Str($raw1);

        $this->assertEquals($raw1 . $raw2, $string->append($raw2));

        $string = new Str($raw2);

        $this->assertEquals($raw1 . $raw2, $string->prepend($raw1));

        $string = new Str($raw1 . $raw2);

        $this->assertEquals($raw1 . $raw2 . PHP_EOL, $string->eol());

        $this->assertEquals($raw1 . $raw2 . '    ', $string->tab());
    }
}
