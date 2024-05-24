# Hashings

Hashings section

### Table of Contents

**[hashPasswordSecure](#hashPasswordSecure)**  
**[verifyPasswordSecure](#verifyPasswordSecure)**  
**[isPotentialHash](#isPotentialHash)**  
**[generateSecureHash](#generateSecureHash)**  

### Preparation

```php
require_once 'Comprasions.php';
$hashings = new Hashings();
```

### hashPasswordSecure
Hashes a password securely using a strong one-way hashing algorithm.
```php
$password = 'mySecurePassword';
$hashedPassword = $hashings->hashPasswordSecure($password);
echo 'Hashed Password: ' . $hashedPassword; // Hashed Password: $2y$10$1q2w3e4r5t6y7u8i9o0p1a2s3d4f5g6h7j8k9l0z1x2c3v4b5n6m
```

### verifyPasswordSecure
Verifies a password against a stored hash securely.
```php
$storedHash = '$2y$10$1q2w3e4r5t6y7u8i9o0p1a2s3d4f5g6h7j8k9l0z1x2c3v4b5n6m';
$isPasswordMatch = $hashings->verifyPasswordSecure($password, $storedHash);
echo 'Password Match: ' . ($isPasswordMatch ? 'Yes' : 'No'); // Password Match: Yes
```

### isPotentialHash
Checks if a string resembles a valid hash format.
```php
$inputHash = '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8';
$isPotentialHash = $hashings->isPotentialHash($inputHash);
echo 'Is Potential Hash: ' . ($isPotentialHash ? 'Yes' : 'No'); // Is Potential Hash: Yes
```

### generateSecureHash
Generates a secure hash of a string using a recommended hashing algorithm.
```php
$stringToHash = 'Hello, World!';
$secureHash = $hashings->generateSecureHash($stringToHash);
echo 'Generated Secure Hash: ' . $secureHash; // Generated Secure Hash: 8f434346e4d4f7f032f5cfe9d0e6e686a2b3e2a1
```
