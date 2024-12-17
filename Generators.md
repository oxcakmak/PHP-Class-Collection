# Generators

Generators section

### Table of Contents

**[hex](#hex)**  
**[hexWithMtRand](#hexWithMtRand)**  
**[uuid](#uuid)**  
**[random](#random)**  
**[randomInt](#randomInt)**  

### Preparation

```php
require_once 'Generators.php';
$generator = new Generators();
```

### hex

Generates a random hexadecimal string of a specified length.

```php
// Generate a hex string using random_bytes.
echo "Hex: " . Generators::hex(16) . "\n";
```

### hexWithMtRand

Generates a random hexadecimal string using mt_rand.

```php
// Generate a hex string using mt_rand.
echo "Hex with mt_rand: " . Generators::hexWithMtRand(16) . "\n";
```

### uuid

Generates a universally unique identifier (UUID).

```php
// Generate a UUID.
echo "UUID: " . Generators::uuid() . "\n";
```

### random

Generates a random string with customizable characters.

```php
// Generate a random string with default characters.
echo "Random String: " . Generators::random(12) . "\n";
```

### randomInt

Generates a random integer within a specified range.

```php
// Generate a random string with custom characters.
echo "Random String (Custom): " . Generators::random(12, 'ABCDEF') . "\n";
```
