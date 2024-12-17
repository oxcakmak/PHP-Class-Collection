<?php

class Strings
{
    /**
     * Converts a string into a URL-friendly slug, supporting Turkish and other languages.
     *
     * @param string $string The string to be converted.
     * @param string $delimiter The delimiter for the slug (default is '-').
     * @return string The URL-friendly slug.
     */
    public static function slugify($string, $delimiter = '-')
    {
        // Convert special characters (e.g., Turkish characters) to ASCII equivalents
        $transliteration = [
            'Ç' => 'C', 'Ş' => 'S', 'Ğ' => 'G', 'Ü' => 'U', 'İ' => 'I', 'Ö' => 'O',
            'ç' => 'c', 'ş' => 's', 'ğ' => 'g', 'ü' => 'u', 'ı' => 'i', 'ö' => 'o'
        ];
        $string = strtr($string, $transliteration);

        // Remove non-alphanumeric characters and replace spaces with the delimiter
        $string = preg_replace('/[^a-zA-Z0-9\s]+/u', '', $string);
        $string = preg_replace('/\s+/', $delimiter, strtolower(trim($string)));

        return trim($string, $delimiter);
    }

    /**
     * Checks if a string starts with a specific substring.
     *
     * @param string $haystack The string to search in.
     * @param string $needle The substring to search for.
     * @return bool TRUE if the haystack starts with the needle, otherwise FALSE.
     */
    public static function startsWith($haystack, $needle)
    {
        return substr($haystack, 0, strlen($needle)) === $needle;
    }

    /**
     * Checks if a string ends with a specific substring.
     *
     * @param string $haystack The string to search in.
     * @param string $needle The substring to search for.
     * @return bool TRUE if the haystack ends with the needle, otherwise FALSE.
     */
    public static function endsWith($haystack, $needle)
    {
        return substr($haystack, -strlen($needle)) === $needle;
    }

    /**
     * Cleans a string by removing extra whitespace and non-printable characters.
     *
     * @param string $string The string to be cleaned.
     * @return string The cleaned string.
     */
    public static function clean($string)
    {
        return trim(preg_replace('/\s+/', ' ', $string));
    }

    /**
     * Cleans a string to prevent XSS (Cross-Site Scripting) attacks by stripping dangerous HTML tags.
     *
     * @param string $string The string to be sanitized.
     * @return string The sanitized string.
     */
    public static function xssClean($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Converts a string from its detected encoding to UTF-8
     * 
     * @param string $text The string to convert
     * @return string The converted string in UTF-8 encoding
     */
    public static function convertToUtf8($text) {
        // Ensure input is a string
        if (!is_string($text)) {
            return $text;
        }

        // Use mb_detect_encoding with fallback
        $originalEncoding = mb_detect_encoding($text, mb_detect_order(), true);
        
        if ($originalEncoding === false) {
            // Fallback to default encoding if detection fails
            return $text;
        }

        // Attempt conversion to UTF-8
        $convertedText = @iconv($originalEncoding, "UTF-8//IGNORE", $text);

        // Validate conversion
        return mb_check_encoding($convertedText, "UTF-8") ? $convertedText : $text;
    }

    /**
     * Sanitizes a string for output by removing HTML tags and escaping special characters
     * 
     * @param string $text The string to sanitize
     * @return string The sanitized string
     */
    public static function sanitizeOutput($text) {
        // Ensure input is a string
        if (!is_string($text)) {
            return $text;
        }

        // Remove slashes, trim, and strip HTML tags
        $sanitizedText = trim(strip_tags(stripslashes($text)));

        // Escape special characters with fallback
        return htmlspecialchars($sanitizedText, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * Escapes special characters to prevent XSS vulnerabilities
     * 
     * @param string $text The string to escape
     * @return string The escaped string
     */
    public static function escapeXss($text) {
        // Ensure input is a string
        if (!is_string($text)) {
            return $text;
        }

        // Escape with fallback
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * Removes all whitespace characters from a string
     * 
     * @param string $str The input string
     * @return string The string with all whitespaces removed
     */
    public static function stripAllWhitespace($str) {
        // Ensure input is a string
        if (!is_string($str)) {
            return $str;
        }

        // Use preg_replace to remove all whitespace
        return preg_replace('/\s+/', '', $str);
    }

    /**
     * Truncates a string to a specified length without cutting a word
     * 
     * @param string $string The string to truncate
     * @param int $maxLength Maximum length of the truncated string
     * @param string $ending Ending string to append (default: "...")
     * @return string The truncated string
     */
    public static function truncateStringWithoutCuttingWord($string, $maxLength, $ending = "...") {
        // Validate inputs with more flexible type checking
        if (!is_string($string) || !is_numeric($maxLength) || $maxLength <= 0) {
            return $string;
        }

        // Ensure maxLength is an integer
        $maxLength = (int)$maxLength;

        // If string is shorter than max length, return original
        if (strlen($string) <= $maxLength) {
            return $string;
        }

        // Find the last space within the allowed length
        $lastSpace = strrpos(substr($string, 0, $maxLength), ' ');

        // Truncate and append ending
        if ($lastSpace !== false) {
            return rtrim(substr($string, 0, $lastSpace)) . $ending;
        }

        // No space found, truncate at max length
        return substr($string, 0, $maxLength) . $ending;
    }
}

?>
