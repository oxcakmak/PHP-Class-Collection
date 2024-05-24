<?php

class Strings {

    /**
     * Determines if the provided input is a string data type.
     *
     * This function utilizes the built-in `is_string` function to rigorously
     * verify if the given variable is indeed a string.
     *
     * @param mixed $input The variable to be evaluated for type.
     * @return bool True if the input is a string, false otherwise.
     * @throws InvalidArgumentException If the input is not a valid variable.
     */
    function isString(mixed $input): bool
    {
        if (!is_string($input) || gettype($input) !== 'string') {
            throw new InvalidArgumentException('Invalid input provided. Expecting a variable.');
        }

        return true;
    }

    /**
     * Converts a string from its detected encoding to UTF-8.
     *
     * @param string $text The string to convert.
     * @return string The converted string in UTF-8 encoding, or the original string if conversion fails.
     * @throws InvalidArgumentException If the string is not valid UTF-8 after conversion.
     */
    function convertToUtf8(string $text): string
    {
        $originalEncoding = mb_detect_encoding($text, mb_detect_order(), true);
        
        if ($originalEncoding === false) {
            // Handle cases where encoding detection fails (e.g., log or return default)
            // echo "Warning: Could not detect encoding for the string.";
            return $text;
        }

        // Attempt conversion to UTF-8
        $convertedText = iconv($originalEncoding, "UTF-8", $text);

        // Validate the converted string
        if (!mb_check_encoding($convertedText, "UTF-8")) {
            throw new InvalidArgumentException("Conversion to UTF-8 failed. Original encoding: $originalEncoding");
        }

        return $convertedText;
    }

    /**
     * Sanitizes a string for output by removing HTML tags, slashes, and trimming whitespace.
     * Additionally, escapes special characters to prevent XSS vulnerabilities.
     *
     * @param string $text The string to sanitize.
     * @return string The sanitized string.
     * @throws InvalidArgumentException If the string is not valid UTF-8 after escaping.
     */
    function sanitizeOutput(string $text): string
    {
        $sanitizedText = trim(strip_tags(stripslashes($text)));

        // Escape special characters using htmlspecialchars with ENT_QUOTES and UTF-8 encoding
        $escapedText = htmlspecialchars($sanitizedText, ENT_QUOTES, 'UTF-8');

        // Validate the escaped string
        if (!mb_check_encoding($escapedText, "UTF-8")) {
            throw new InvalidArgumentException("String escaping failed. Original encoding unknown.");
        }

        return $escapedText;
    }

    /**
     * Escapes special characters in a string to prevent XSS vulnerabilities.
     *
     * @param string $text The string to escape.
     * @return string The string with escaped special characters.
     * @throws InvalidArgumentException If the string is not valid UTF-8 after escaping.
     */
    function escapeXss(string $text): string
    {
        $escapedText = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');

        // Validate the escaped string
        if (!mb_check_encoding($escapedText, "UTF-8")) {
            throw new InvalidArgumentException("String escaping failed. Original encoding unknown.");
        }

        return $escapedText;
    }

}

?>