<?php

namespace Tests;

use Amber\Phraser\Phraser;
use PHPUnit\Framework\TestCase;

class CaseTest extends TestCase
{
    public function testToUpperCaseFirst()
    {
        $string = 'test multiple cases';

        $this->assertEquals(
            ucfirst($string),
            Phraser::make($string)->upperCaseFirst()
        );
    }

    public function testString()
    {
        $string = 'Test Multiple Cases';
        $array = Phraser::make($string)->fromString(' ');

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
        $array = Phraser::make($string)->fromCamelCase();

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
        $array = Phraser::make($string)->fromCamelCase();

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
        $array = Phraser::make($string)->fromSnakeCase();

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
        $array = Phraser::make($string)->fromKebabCase();

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
