# Comprasions
Comparison section

### Table of Contents

**[isEqual](#isEqual)**  
**[isNotEqual](#isNotEqual)**  
**[isGreaterThan](#isGreaterThan)**  
**[isLessThan](#isLessThan)**  

### Preparation
```php
require_once 'Comprasions.php';
$comparisons = new Comprasions();
```

### isEqual
Checks if two values are equal using strict comparison.
```php
$value1 = 5;
$value2 = '5';
var_dump($comparisons->isEqual($value1, $value2)); // Output: false
```

### isNotEqual
Checks if two values are not equal using strict comparison.
```php
$value3 = 10;
$value4 = 10;
var_dump($comparisons->isNotEqual($value3, $value4)); // Output: false
```
### isGreaterThan
Checks if one value is greater than another.
```php
$value5 = 15;
$value6 = 10;
var_dump($comparisons->isGreaterThan($value5, $value6)); // Output: true
```

### isLessThan
Checks if one value is less than another.
```php
$value7 = 20;
$value8 = 25;
var_dump($comparisons->isLessThan($value7, $value8)); // Output: true
```
