# Generators

Generators section

### Table of Contents

**[generateStrongPassword](#generateStrongPassword)**  
**[generateRandomString](#generateRandomString)**  
**[generateRandomHexColor](#generateRandomHexColor)**  
**[generateRandomNumber](#generateRandomNumber)**

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
