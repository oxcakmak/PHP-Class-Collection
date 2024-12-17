# Logics

Logics section

### Table of Contents

**[isGreater](#isGreater)**  
**[isLower](#isLower)**  
**[isEqual](#isEqual)**  
**[orThen](#orThen)**  
**[all](#all)**  
**[any](#any)**  
**[isBetween](#isBetween)**  

### Preparation

```php
require_once 'Logics.php';
$logics = new Logics();

// Example usage:
$value1 = 10;
$value2 = 20;
```

### isGreater

Checks if the first value is greater than the second value.

```php
// isGreater
echo "Is Greater: " . (Logics::isGreater($value2, $value1) ? "Yes" : "No") . "\n";
```

### isLower

Checks if the first value is lower than the second value.

```php
// isLower
echo "Is Lower: " . (Logics::isLower($value1, $value2) ? "Yes" : "No") . "\n";
```

### isEqual

Checks if two values are equal.

```php
// isEqual
echo "Is Equal: " . (Logics::isEqual($value1, 10) ? "Yes" : "No") . "\n";
```

### orThen

Executes a callback function if a condition is TRUE.

```php
// orThen
Logics::orThen(true, function () {
    echo "Condition is TRUE, executing callback.\n";
});
```

### all

Checks if all elements in an array satisfy a given condition.

```php
// all
$array = [1, 2, 3, 4];
echo "All greater than 0: " . (Logics::all($array, function ($item) {
    return $item > 0;
}) ? "Yes" : "No") . "\n";

```

### any

Checks if any element in an array satisfies a given condition.

```php
// any
echo "Any greater than 3: " . (Logics::any($array, function ($item) {
    return $item > 3;
}) ? "Yes" : "No") . "\n";
```

### isBetween

Checks if a value is between two bounds (inclusive).

```php
// isBetween
echo "Is Between 5 and 15: " . (Logics::isBetween(10, 5, 15) ? "Yes" : "No") . "\n";
```
