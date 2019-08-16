<?php

namespace Amber\Phraser;

use Amber\Phraser\Base\String\StringObject;
use Amber\Phraser\Base\StringArray\StringArray;

/**
 * Wrapper class for working with strings.
 */
class Phraser extends StringObject
{
    /**
     * @var string The content of the class.
     */
    protected $string = '';

    const SNAKE_CASE_DELIMITER = '_';

    const KEBAB_CASE_DELIMITER = '-';

    /**
     * Class constructor.
     *
     * @param string $string
     */
    public function __construct(string $string = null)
    {
        $this->string = $string ?? '';
    }

    protected function newStringArray(array $array, string $delimiter = ''): StringArray
    {
        return (new StringArray($array, $delimiter))
            ->trim()
        ;
    }

    /**
     * Retruns a StringArray instance from a string.
     *
     * @param string $string
     * @param string $delimited
     *
     * @return StringArray
     */
    public function fromString(string $delimiter = ' ')
    {
        $array = explode($delimiter, strtolower($this->string));

        return $this->newStringArray($array, $delimiter);
    }

    /**
     * Retruns a StringArray instance from the a camel cased string.
     *
     * @return StringArray
     */
    public function fromCamelCase(): StringArray
    {
        $array = preg_split('/(?=[A-Z])/', $this->string);

        return $this->newStringArray($array);
    }

    /**
     * Retruns a StringArray instance from the a snake cased string.
     *
     * @return StringArray
     */
    public function fromSnakeCase(): StringArray
    {
        $array = explode(self::SNAKE_CASE_DELIMITER, $this->string);

        return $this->newStringArray($array, self::SNAKE_CASE_DELIMITER);
    }

    /**
     * Retruns a StringArray instance from the a kebab cased string.
     *
     * @return StringArray
     */
    public function fromKebabCase(): StringArray
    {
        $array = explode(self::KEBAB_CASE_DELIMITER, $this->string);

        return $this->newStringArray($array, self::KEBAB_CASE_DELIMITER);
    }
}
