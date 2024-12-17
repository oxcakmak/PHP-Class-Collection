<?php

class Checks
{
    /**
     * Checks if the given value is an array.
     *
     * @param mixed $value The value to check.
     * @return bool TRUE if the value is an array, otherwise FALSE.
     */
    public static function isArray($value)
    {
        return is_array($value);
    }

    /**
     * Checks if the given value is an integer.
     *
     * @param mixed $value The value to check.
     * @return bool TRUE if the value is an integer, otherwise FALSE.
     */
    public static function isNumber($value)
    {
        return is_int($value);
    }

    /**
     * Checks if the given value is a float.
     *
     * @param mixed $value The value to check.
     * @return bool TRUE if the value is a float, otherwise FALSE.
     */
    public static function isFloat($value)
    {
        return is_float($value);
    }

    /**
     * Checks if the given value is a double.
     * (In PHP, double is an alias for float.)
     *
     * @param mixed $value The value to check.
     * @return bool TRUE if the value is a double, otherwise FALSE.
     */
    public static function isDouble($value)
    {
        return is_double($value);
    }

    /**
     * Checks if the given value is a string.
     *
     * @param mixed $value The value to check.
     * @return bool TRUE if the value is a string, otherwise FALSE.
     */
    public static function isString($value)
    {
        return is_string($value);
    }

    /**
     * Checks if the given value is a valid URL.
     *
     * @param string $value The value to check.
     * @return bool TRUE if the value is a valid URL, otherwise FALSE.
     */
    public static function isUrl($value)
    {
        return filter_var($value, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Checks if the given value is a valid email address.
     *
     * @param string $value The value to check.
     * @return bool TRUE if the value is a valid email address, otherwise FALSE.
     */
    public static function isEmail($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}

?>
