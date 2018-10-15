<?php

namespace Tests;

use Amber\Phraser\Str;
use Amber\Phraser\Base\StringArray;
use PHPUnit\Framework\TestCase;

class StringArrayTest extends TestCase
{
    public function testWordsArray()
    {
        $string = '  Hello world ';
        $raw = explode(' ', trim($string));

        $array = (new Str($string))->words()->trim();

        $this->assertInstanceOf(StringArray::class, $array);

        $this->assertInstanceOf(Str::class, $array[0]);

        $this->assertEquals('Hello', $array[0]);
        $this->assertEquals('world', $array[1]);

        $this->assertTrue(isset($array[0]));

        $array[1] = 'developer';
        $this->assertEquals('developer', $array[1]);

        $this->assertEquals('Hello developer', (string) $array);
        $this->assertEquals('Hello developer', $array->toString());

        $this->assertFalse($raw[1] == $array[1]);

        unset($array[1]);

        $this->assertEquals('Hello', (string) $array);

        $array[] = 'and';
        $array[] = 'have';
        $array[] = 'a';
        $array[] = 'nice';
        $array[] = 'day';

        $this->assertEquals('Hello and have a nice day', (string) $array);
        $this->assertEquals('Hello and have a nice day', $array->toString());
    }

    public function testLinesArray()
    {
        $text = "This is a long text.\nThis is the second line.\r\nThis is the third line.";

        $raw = array_filter(explode(PHP_EOL, preg_replace("#\r|\n|\t#", PHP_EOL, $text)), 'strlen');
        $raw = array_values($raw);

        $array = (new Str($text))->lines()->trim();

        $this->assertInstanceOf(StringArray::class, $array);

        $this->assertInstanceOf(Str::class, $array[0]);
        $this->assertEquals($raw[0], (string) $array[0]);
        $this->assertEquals($raw[1], (string) $array[1]);
        $this->assertEquals($raw[2], (string) $array[2]);
    }
}
