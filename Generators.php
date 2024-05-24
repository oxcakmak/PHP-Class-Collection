<?php

class Generators {

    /**
     * Generates a random strong password with specified character sets and length.
     *
     * @param int $minLength (optional) Minimum password length (defaults to 20).
     * @param int $maxLength (optional) Maximum password length (defaults to 20). Enforces minimum if greater.
     * @param bool $useLowercase (optional) Whether to include lowercase letters (defaults to true).
     * @param bool $useUppercase (optional) Whether to include uppercase letters (defaults to true).
     * @param bool $useNumbers (optional) Whether to include numbers (defaults to true).
     * @param bool $useSymbols (optional) Whether to include special symbols (defaults to false).
     * @throws InvalidArgumentException If the minimum length is greater than the maximum length.
     * @return string The generated random password.
     */
    function generateStrongPassword(int $minLength = 20, int $maxLength = 20, bool $useLowercase = true, bool $useUppercase = true, bool $useNumbers = true, bool $useSymbols = false): string
    {
        if ($minLength > $maxLength) {
            throw new InvalidArgumentException('Minimum length cannot be greater than maximum length.');
        }

        $characterSets = [];
        if ($useLowercase) {
            $characterSets[] = 'abcdefghijklmnopqrstuvwxyz';
        }
        if ($useUppercase) {
            $characterSets[] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if ($useNumbers) {
            $characterSets[] = '1234567890';
        }
        if ($useSymbols) {
            $characterSets[] = "~@#$%^*()_+-={}|[]\."; // Added dot (".") as a potential symbol
        }

        if (empty($characterSets)) {
            throw new InvalidArgumentException('At least one character set must be chosen.');
        }

        $length = mt_rand($minLength, $maxLength);
        $combinedChars = implode('', $characterSets);
        $charsLength = strlen($combinedChars);

        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $combinedChars[mt_rand(0, $charsLength - 1)];
        }

        // Shuffle the password characters for better randomness (optional)
        $passwordChars = str_split($password);
        shuffle($passwordChars);
        $password = implode('', $passwordChars);

        return $password;
    }

    /**
     * Generates a random string of a specified length containing letters and numbers.
     *
     * @param int $length The desired length of the random string.
     * @throws InvalidArgumentException If the length is less than 1.
     * @return string The generated random string.
     */
    function generateRandomString(int $length): string
    {
        if ($length < 1) {
            throw new InvalidArgumentException('String length must be at least 1.');
        }

        // Combine all character sets
        $allChars = implode('', array_merge(range(0, 9), range('a', 'z'), range('A', 'Z')));

        // Generate random string using more efficient character selection
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $allChars[mt_rand(0, strlen($allChars) - 1)];
        }

        return $randomString;
    }

    /**
     * Generates a random hexadecimal color code.
     *
     * @param bool $uppercase (optional) Whether to generate the color code in uppercase (default: false).
     * @return string The generated random hex color code with a leading # symbol.
     * @throws InvalidArgumentException If the uppercase parameter is not a boolean.
     */
    function generateRandomHexColor(bool $uppercase = false): string
    {
        if (!is_bool($uppercase)) {
            throw new InvalidArgumentException('Uppercase parameter must be a boolean.');
        }

        $randomInt = mt_rand(0, 0xFFFFFF);
        $hexString = sprintf('%06X', $randomInt);

        return '#' . ($uppercase ? strtoupper($hexString) : $hexString);
    }

    /**
     * Generates a random number within a specified range, optionally allowing floating-point values.
     *
     * @param int|float $lowerBound (optional) The lower bound of the range (defaults to 0).
     * @param int|float $upperBound (optional) The upper bound of the range (defaults to the value of $lowerBound).
     * @param bool $allowFloat (optional) Whether to allow floating-point values (defaults to false).
     * @throws InvalidArgumentException If the lower bound is greater than the upper bound.
     * @return int|float A random number within the specified range.
     */
    function generateRandomNumber(float $lowerBound = 0.0, float $upperBound = null, bool $allowFloat = false): float
    {
        // Handle default and invalid parameters
        if ($upperBound === null) {
            $upperBound = $lowerBound;
            $lowerBound = 0.0;
        } elseif ($lowerBound > $upperBound) {
            throw new InvalidArgumentException('Lower bound cannot be greater than upper bound.');
        }

        // Determine floating-point requirement
        $allowFloat = $allowFloat || (is_float($lowerBound) || is_float($upperBound));

        // Generate random number based on type requirement
        if ($allowFloat || $lowerBound != round($lowerBound, 0) || $upperBound != round($upperBound, 0)) {
            $range = abs($upperBound - $lowerBound);
            return $lowerBound + $range * mt_rand(0, mt_getrandmax()) / mt_getrandmax();
        } else {
            return rand((int) $lowerBound, (int) $upperBound);
        }
    }
}

?>