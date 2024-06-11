# Generators

Generators section

### Table of Contents

**[generateStrongPassword](#generateStrongPassword)**  
**[generateRandomString](#generateRandomString)**  
**[generateRandomHexColor](#generateRandomHexColor)**  
**[generateRandomNumber](#generateRandomNumber)**  
**[generateSimpleId](#generateSimpleId)**  
**[generateSimpleUuid](#generateSimpleUuid)**  

### Preparation

```php
require_once 'Generators.php';
$generators = new Generators();
```

### generateStrongPassword

Generates a random strong password with specified character sets and length.

```php
$password = $generators->generateStrongPassword(12, 16, true, true, true, true);
echo $password;
```

### generateRandomString

Generates a random string of a specified length containing letters and numbers.

```php
$randomString = $generators->generateRandomString(8);
echo $randomString;
```

### generateRandomHexColor

Generates a random hexadecimal color code.

```php
$hexColor = $generators->generateRandomHexColor(true);
echo $hexColor;
```

### generateRandomNumber

Generates a random number within a specified range, optionally allowing floating-point values.

```php
$randomNumber = $generators->generateRandomNumber(10, 20, true);
echo $randomNumber;
```

### generateSimpleId

Generates a simple 20-character ID consisting of numbers, starting with 1.

```php
try {
  $tweetId = $generators->generateSimpleId();
  echo $tweetId; // Outputs a 20-character ID like "12345678901234567890"
} catch (Exception $e) {
  echo "Error generating ID: " . $e->getMessage();
}
```

### generateSimpleUuid

Generates a simple 32-character string resembling a version 4 UUID.

```php
$uuid = $generators->generateSimpleUuid();
echo $uuid; // Outputs a 32-character string similar to "9baeabe4-c224-0786-6484-67bee363622e"
```
