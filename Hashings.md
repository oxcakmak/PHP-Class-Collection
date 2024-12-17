# Hashings

Hashings section

### Table of Contents

**[encode](#encode)**  
**[verify](#verify)**  
**[base64e](#base64e)**  
**[base64d](#base64d)**  
**[byName](#byName)**  

### Preparation

```php
require_once 'Hashings.php';
$hash = new Hashings();

// Example usage demonstration
$password = 'SecurePassword123!';
```

### encode

Encode password using password_hash with default algorithm

```php
$encoded_password = $hash->encode($password);
```

### verify

Verify password against its hash

```php
$isValid = $hash->verify($password, $encoded_password);
```

### base64e

Base64 Encoding

```php
$base64_encoded = $hash->base64e($password);
```

### base64d

Base64 Decoding

```php
$base64_decoded = $hash->base64d($password);
```

### byName

Dynamic hash generation method for multiple algorithms

```php
// Various hash examples
$algorithms = [
    'md5', 'sha256', 'sha512', 'ripemd160', 
    'whirlpool', 'tiger192', 'crc32', 'fnv164'
];

$hash_results = [];
foreach ($algorithms as $algo) {
    $hash_results[$algo] = $hash->$algo($original_data);
}

// Print hash results
foreach ($hash_results as $algo => $result) {
    echo "$algo Hash: $result\n";
}
```

Algorithms

```
md2, md4, md5, 
sha1, sha224, sha256, sha384, sha512,
ripemd128, ripemd160, ripemd256, ripemd320,
whirlpool, 
tiger128, tiger160, tiger192,
gost, snefru, siphash, skein, sm3,
crc32, crc32b, 
fnv132, fnv1a32, fnv164, fnv1a64,
joaat,
haval128, haval160, haval192, haval224, haval256
```
