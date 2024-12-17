<?php

class Logics
{
    /**
     * Checks if the first value is greater than the second value.
     *
     * @param mixed $value1 The first value to compare.
     * @param mixed $value2 The second value to compare.
     * @return bool TRUE if value1 is greater than value2, otherwise FALSE.
     */
    public static function isGreater($value1, $value2)
    {
        return $value1 > $value2;
    }

    /**
     * Checks if the first value is lower than the second value.
     *
     * @param mixed $value1 The first value to compare.
     * @param mixed $value2 The second value to compare.
     * @return bool TRUE if value1 is lower than value2, otherwise FALSE.
     */
    public static function isLower($value1, $value2)
    {
        return $value1 < $value2;
    }

    /**
     * Checks if two values are equal.
     *
     * @param mixed $value1 The first value to compare.
     * @param mixed $value2 The second value to compare.
     * @return bool TRUE if the values are equal, otherwise FALSE.
     */
    public static function isEqual($value1, $value2)
    {
        return $value1 == $value2;
    }

    /**
     * Executes a callback function if a condition is TRUE.
     *
     * @param bool $condition The condition to evaluate.
     * @param callable $callback The function to execute if the condition is TRUE.
     * @return mixed The result of the callback function, or NULL if the condition is FALSE.
     */
    public static function orThen($condition, callable $callback)
    {
        return $condition ? $callback() : null;
    }

    /**
     * Checks if all elements in an array satisfy a given condition.
     *
     * @param array $array The array to check.
     * @param callable $callback A callback function to evaluate each element.
     * @return bool TRUE if all elements satisfy the condition, otherwise FALSE.
     */
    public static function all(array $array, callable $callback)
    {
        foreach ($array as $item) {
            if (!$callback($item)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Checks if any element in an array satisfies a given condition.
     *
     * @param array $array The array to check.
     * @param callable $callback A callback function to evaluate each element.
     * @return bool TRUE if at least one element satisfies the condition, otherwise FALSE.
     */
    public static function any(array $array, callable $callback)
    {
        foreach ($array as $item) {
            if ($callback($item)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Checks if a value is between two bounds (inclusive).
     *
     * @param mixed $value The value to check.
     * @param mixed $lower The lower bound.
     * @param mixed $upper The upper bound.
     * @return bool TRUE if the value is between the bounds, otherwise FALSE.
     */
    public static function isBetween($value, $lower, $upper)
    {
        return $value >= $lower && $value <= $upper;
    }
}

?>
