<?php

class Jsons
{
    /**
     * Encode data into JSON format.
     *
     * @param mixed $data The data to be encoded.
     * @param bool $prettyPrint Whether to format the JSON with indentation for readability.
     * @return string The JSON-encoded string or an empty string on failure.
     */
    public static function encode($data, $prettyPrint = false)
    {
        $options = 0;
        if ($prettyPrint && version_compare(PHP_VERSION, '5.4.0', '>=')) {
            $options |= JSON_PRETTY_PRINT;
        }

        $json = json_encode($data, $options);

        // Ensure compatibility with PHP versions where json_encode might fail silently.
        if (json_last_error() !== JSON_ERROR_NONE) {
            return '';
        }

        return $json;
    }

    /**
     * Decode a JSON string into a PHP variable.
     *
     * @param string $json The JSON string to be decoded.
     * @param bool $assoc When TRUE, returned objects will be converted into associative arrays.
     * @return mixed The decoded PHP variable or NULL on failure.
     */
    public static function decode($json, $assoc = true)
    {
        $result = json_decode($json, $assoc);

        // Check for errors during decoding.
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }

        return $result;
    }

    /**
     * Beautify a JSON string for improved readability.
     *
     * @param string $json The JSON string to beautify.
     * @return string The beautified JSON string or the original input if an error occurs.
     */
    public static function beautify($json)
    {
        $decoded = self::decode($json, true);
        if ($decoded === null) {
            return $json; // Return the original string if decoding fails.
        }

        return self::encode($decoded, true);
    }
}

?>
