<?php

class Hashings {
    /**
     * Encode password using password_hash with default algorithm
     * 
     * @param string $password Plain text password
     * @param int $algo Password hashing algorithm (default PASSWORD_DEFAULT)
     * @param array $options Additional hashing options
     * @return string Hashed password
     */
    public function encode($password, $algo = PASSWORD_DEFAULT, $options = []) {
        return password_hash($password, $algo, $options);
    }

    /**
     * Verify password against its hash
     * 
     * @param string $password Plain text password
     * @param string $hash Stored password hash
     * @return bool Verification result
     */
    public function verify($password, $hash) {
        return password_verify($password, $hash);
    }

    /**
     * Base64 Encoding
     * 
     * @param string $data Data to encode
     * @return string Base64 encoded string
     */
    public function base64e($data) {
        return base64_encode($data);
    }

    /**
     * Base64 Decoding
     * 
     * @param string $data Base64 encoded string
     * @return string Decoded data
     */
    public function base64d($data) {
        return base64_decode($data);
    }

    /**
     * Generate hash using specified algorithm
     * 
     * @param string $data Data to hash
     * @param string $algo Hashing algorithm
     * @param bool $raw_output Return raw binary output
     * @return string Generated hash
     */
    private function generateHash($data, $algo, $raw_output = false) {
        return hash($algo, $data, $raw_output);
    }

    /**
     * Dynamic hash generation method for multiple algorithms
     * 
     * @param string $method Hashing method called
     * @param array $args Arguments passed
     * @return string Generated hash
     * @throws BadMethodCallException If method is not supported
     */
    public function __call($method, $args) {
        $supported_hashes = [
            'md2', 'md4', 'md5', 
            'sha1', 'sha224', 'sha256', 'sha384', 'sha512',
            'ripemd128', 'ripemd160', 'ripemd256', 'ripemd320',
            'whirlpool', 
            'tiger128', 'tiger160', 'tiger192',
            'gost', 'snefru', 'siphash', 'skein', 'sm3',
            'crc32', 'crc32b', 
            'fnv132', 'fnv1a32', 'fnv164', 'fnv1a64',
            'joaat',
            'haval128', 'haval160', 'haval192', 'haval224', 'haval256'
        ];

        // Check if the called method is a supported hash algorithm
        if (in_array(strtolower($method), $supported_hashes)) {
            // Default to first argument as data, second as raw_output (optional)
            $data = $args[0] ?? '';
            $raw_output = $args[1] ?? false;
            
            return $this->generateHash($data, $method, $raw_output);
        }

        throw new BadMethodCallException("Unsupported hashing method: $method");
    }
}

?>
