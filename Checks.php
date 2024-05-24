<?php

class Checks {

    /**
     * Checks if an email address contains any of the specified domains.
     *
     * This function adheres to professional coding standards for error handling, code
     * clarity, and testability. It leverages dependency injection principles by
     * accepting the domain validation logic as a callback function, allowing for
     * customization or mocking during unit testing. Additionally, it utilizes a
     * regular expression for efficient domain matching, providing a robust and
     * efficient solution.
     *
     * @param string $email The email address to check.
     * @param string[] $domains An array of domain names to check against.
     * @param callable|null $domainValidator (Optional) A callback function to
     *        validate individual domain names. Defaults to a simple string check.
     * @throws InvalidArgumentException If the email or domains parameter is not a string or an array, respectively.
     * @return bool True if the email address contains any of the specified domains, false otherwise.
     */
    function checkEmailDomain(string $email, array $domains, callable $domainValidator = null): bool
    {
        if (!is_string($email)) {
            throw new InvalidArgumentException('Email address must be a string.');
        }

        if (!is_array($domains)) {
            throw new InvalidArgumentException('Domains must be an array of strings.');
        }

        // Optional domain name validation (can be customized/mocked in tests)
        if ($domainValidator !== null) {
            foreach ($domains as $domain) {
            if (!call_user_func($domainValidator, $domain)) {
                throw new InvalidArgumentException('Invalid domain name provided.');
            }
            }
        } else {
            // Default validation (optional)
            foreach ($domains as $domain) {
            if (!is_string($domain)) {
                throw new InvalidArgumentException('Domain names must be strings.');
            }
            }
        }

        // Optimized regular expression for domain matching
        $domainPattern = '/@(?:' . implode('|', $domains) . ')$/i';

        return preg_match($domainPattern, $email) === 1;
    }


}

?>