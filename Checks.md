# Checks

Checks section

### Table of Contents

**[isArray](#isArray)**  
**[isNumber](#isNumber)**  
**[isFloat](#isFloat)**  
**[isDouble](#isDouble)**  
**[isString](#isString)**  
**[isUrl](#isUrl)**  
**[isEmail](#isEmail)**  


### Preparation

```php
require_once 'Checks.php';
$checks = new Checks();

// Example usage:
$value1 = [1, 2, 3];
$value2 = "hello@example.com";
$value3 = 123;
$value4 = "https://example.com";
```

### isArray

Checks if the given value is an array.

```php
// isArray
echo "Is Array: " . (Checks::isArray($value1) ? "Yes" : "No") . "\n";
```

### isNumber

Checks if the given value is an integer.

```php
// isNumber
echo "Is Number: " . (Checks::isNumber($value3) ? "Yes" : "No") . "\n";
```

### isFloat

Checks if the given value is a float.

```php
// isFloat
echo "Is Float: " . (Checks::isFloat(1.23) ? "Yes" : "No") . "\n";
```

### isDouble

Checks if the given value is a double (In PHP, double is an alias for float.)

```php
// isDouble
echo "Is Double: " . (Checks::isDouble(1.23) ? "Yes" : "No") . "\n";
```

### isString

Checks if the given value is a string.

```php
// isString
echo "Is String: " . (Checks::isString($value2) ? "Yes" : "No") . "\n";
```

### isUrl

Checks if the given value is a valid URL.

```php
// isUrl
echo "Is URL: " . (Checks::isUrl($value4) ? "Yes" : "No") . "\n";
```

### isEmail

Checks if the given value is a valid email address.

```php
// isEmail
echo "Is Email: " . (Checks::isEmail($value2) ? "Yes" : "No") . "\n";
```
