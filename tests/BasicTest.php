<?php

namespace Tests;

use Amber\Phraser\Str;
use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    public function testBasics()
    {
        $raw = 'Hello world';

        $string = new Str($raw);

        $this->assertEquals($raw, (string) $string);

        $this->assertTrue($string->has('world'));

        $this->assertEquals(json_encode($raw), json_encode($string));
        $this->assertEquals(json_encode($raw), $string->toJson());

        $this->assertEquals($string, $string->clone());
        $this->assertInstanceOf(Str::class, $string->clone());

        $this->assertEquals(11, $string->length());

        $string->reverse();
        $this->assertEquals(strrev($raw), $string);
        $this->assertEquals($raw, $string->reversed());

        $this->assertFalse($string->isEmpty());

        $string->set('');
        $this->assertTrue($string->isEmpty());

        return $string;
    }

    /**
     * @depends testBasics
     */
    public function testStringAsArray($string)
    {
        $raw = 'Wapper class to handle strings.';
        $string->set($raw);
        $search = 'strings';
        $replace = 'strings like objects';

        $this->assertEquals($raw, (string) $string);

        unset($string['strings.']);
        $this->assertEquals(
            str_replace($search . '.', '', $raw),
            (string) $string
        );

        $this->assertFalse(isset($string[$search]));

        $string[] = $search . '.';
        $this->assertEquals(
            $raw,
            (string) $string
        );

        $this->assertTrue(isset($string[$search]));

        $string[$search] = $replace;
        $this->assertEquals(
            str_replace($search, $replace, $raw),
            (string) $string
        );

        $string[-1] = '..';
        $this->assertEquals(
            str_replace($search, $replace, $raw) . '..',
            (string) $string
        );
    }
}
