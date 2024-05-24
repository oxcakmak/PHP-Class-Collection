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
     * Checks if a string starts with a given target substring at a specific position.
     *
     * @param string $text The string to check.
     * @param string $targetString The target substring to search for.
     * @param int $startingPosition (optional) The starting position within the string to check from. Defaults to 0 (beginning of the string).
     * @throws InvalidArgumentException If the starting position is negative.
     * @return bool True if the string starts with the target substring at the specified position, false otherwise.
     */
    public function checkStringStartsWith(string $text, string $targetString, int $startingPosition = 0): bool
    {
        $textLength = strlen($text);

        // Validate starting position
        if ($startingPosition < 0) {
            throw new InvalidArgumentException('Starting position cannot be negative.');
        }

        // Handle position exceeding string length
        if ($startingPosition > $textLength) {
            $startingPosition = $textLength;
        }

        // Check if the substring starting at $startingPosition matches the target
        return substr($text, $startingPosition, strlen($targetString)) === $targetString;
    }

    /**
     * Checks if a string ends with a given target substring at a specific position.
     *
     * @param string $text The string to check.
     * @param string $targetString The target substring to search for.
     * @param int $endingPosition (optional) The ending position within the string to check up to. Defaults to null (entire string).
     * @throws InvalidArgumentException If the ending position is negative or exceeds the string length.
     * @return bool True if the string ends with the target substring at the specified position, false otherwise.
     */
    function checkStringEndsWith(string $text, string $targetString, int $endingPosition = null): bool
    {
        $textLength = strlen($text);
        $targetLength = strlen($targetString);

        // Validate ending position
        if ($endingPosition !== null) {
            if ($endingPosition < 0) {
            throw new InvalidArgumentException('Ending position cannot be negative.');
            } elseif ($endingPosition > $textLength) {
            throw new InvalidArgumentException('Ending position cannot exceed string length.');
            }
        }

        // Handle default ending position (entire string)
        if ($endingPosition === null) {
            $endingPosition = $textLength;
        }

        // Check if the substring ending at $endingPosition matches the target
        return $endingPosition >= $targetLength && substr($text, $endingPosition - $targetLength, $targetLength) === $targetString;
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