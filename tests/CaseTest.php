<?php

namespace Tests;

use Amber\Phraser\Phraser;
use PHPUnit\Framework\TestCase;

class CaseTest extends TestCase
{
    public function testString()
    {
        $string = 'Test Multiple Cases';
        $array = Phraser::fromString($string);

        // Camel Case
        $this->assertEquals(
            'TestMultipleCases',
            $array->toCamelCase()
        );

        // Lower Camel Case
        $this->assertEquals(
            'testMultipleCases',
            $array->toCamelCase(true)
        );

        // Snake Case
        $this->assertEquals(
            'test_multiple_cases',
            $array->toSnakeCase()
        );

        // Kebab Case
        $this->assertEquals(
            'test-multiple-cases',
            $array->toKebabCase()
        );

        // Upper Case
        $this->assertEquals(
            strtoupper($string),
            $array->toUpperCase()
        );

        // Lower Case
        $this->assertEquals(
            strtolower($string),
            $array->toLowerCase()
        );
    }

    public function testFromCamelCase()
    {
        $string = 'TestMultipleCases';
        $array = Phraser::fromCamelCase($string);

        // Camel Case
        $this->assertEquals(
            'TestMultipleCases',
            $array->toCamelCase()
        );

        // Lower Camel Case
        $this->assertEquals(
            'testMultipleCases',
            $array->toCamelCase(true)
        );

        // Snake Case
        $this->assertEquals(
            'test_multiple_cases',
            $array->toSnakeCase()
        );

        // Kebab Case
        $this->assertEquals(
            'test-multiple-cases',
            $array->toKebabCase()
        );

        // Upper Case
        $this->assertEquals(
            strtoupper($string),
            $array->toUpperCase()
        );

        // Lower Case
        $this->assertEquals(
            strtolower($string),
            $array->toLowerCase()
        );
    }

    public function testFromLowerCamelCase()
    {
        $string = 'testMultipleCases';
        $array = Phraser::fromCamelCase($string);

        // Camel Case
        $this->assertEquals(
            'TestMultipleCases',
            $array->toCamelCase()
        );

        // Lower Camel Case
        $this->assertEquals(
            'testMultipleCases',
            $array->toCamelCase(true)
        );

        // Snake Case
        $this->assertEquals(
            'test_multiple_cases',
            $array->toSnakeCase()
        );

        // Kebab Case
        $this->assertEquals(
            'test-multiple-cases',
            $array->toKebabCase()
        );

        // Upper Case
        $this->assertEquals(
            strtoupper($string),
            $array->toUpperCase()
        );

        // Lower Case
        $this->assertEquals(
            strtolower($string),
            $array->toLowerCase()
        );
    }

    public function testFromSnakeCase()
    {
        $string = 'test_multiple_cases';
        $array = Phraser::fromSnakeCase($string);

        // Camel Case
        $this->assertEquals(
            'TestMultipleCases',
            $array->toCamelCase()
        );

        // Lower Camel Case
        $this->assertEquals(
            'testMultipleCases',
            $array->toCamelCase(true)
        );

        // Snake Case
        $this->assertEquals(
            'test_multiple_cases',
            $array->toSnakeCase()
        );

        // Kebab Case
        $this->assertEquals(
            'test-multiple-cases',
            $array->toKebabCase()
        );

        // Upper Case
        $this->assertEquals(
            strtoupper($string),
            $array->toUpperCase()
        );

        // Lower Case
        $this->assertEquals(
            strtolower($string),
            $array->toLowerCase()
        );
    }

    public function testFromKebabCase()
    {
        $string = 'test-multiple-cases';
        $array = Phraser::fromKebabCase($string);

        // Camel Case
        $this->assertEquals(
            'TestMultipleCases',
            $array->toCamelCase()
        );

        // Lower Camel Case
        $this->assertEquals(
            'testMultipleCases',
            $array->toCamelCase(true)
        );

        // Snake Case
        $this->assertEquals(
            'test_multiple_cases',
            $array->toSnakeCase()
        );

        // Kebab Case
        $this->assertEquals(
            'test-multiple-cases',
            $array->toKebabCase()
        );

        // Upper Case
        $this->assertEquals(
            strtoupper($string),
            $array->toUpperCase()
        );

        // Lower Case
        $this->assertEquals(
            strtolower($string),
            $array->toLowerCase()
        );
    }
}
