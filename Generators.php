<?php

class Generators
{
    /**
     * Generates a random hexadecimal string of a specified length.
     *
     * @param int $length The desired length of the hexadecimal string.
     * @return string A random hexadecimal string.
     */
    public static function hex($length = 8)
    {
        return bin2hex(random_bytes($length / 2));
    }

    /**
     * Generates a random hexadecimal string using mt_rand.
     *
     * @param int $length The desired length of the hexadecimal string.
     * @return string A random hexadecimal string.
     */
    public static function hexWithMtRand($length = 8)
    {
        $hex = '';
        for ($i = 0; $i < $length; $i++) {
            $hex .= dechex(mt_rand(0, 15));
        }
        return $hex;
    }

    /**
     * Generates a universally unique identifier (UUID).
     *
     * @return string A UUID string.
     */
    public static function uuid()
    {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // Set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // Set variant to 10

        return sprintf(
            '%08x-%04x-%04x-%04x-%012x',
            unpack('N1', substr($data, 0, 4))[1],
            unpack('n1', substr($data, 4, 2))[1],
            unpack('n1', substr($data, 6, 2))[1],
            unpack('n1', substr($data, 8, 2))[1],
            unpack('N1', substr($data, 10, 4))[1] . unpack('n1', substr($data, 14, 2))[1]
        );
    }

    /**
     * Generates a random string with customizable characters.
     *
     * @param int $length The desired length of the string.
     * @param string $characters The set of characters to use for generation.
     * @return string A random string.
     */
    public static function random($length = 16, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Generates a random integer within a specified range.
     *
     * @param int $min The minimum value (inclusive).
     * @param int $max The maximum value (inclusive).
     * @return int A random integer within the range.
     */
    public static function randomInt($min = 0, $max = PHP_INT_MAX)
    {
        return mt_rand($min, $max);
    }
}

?>
