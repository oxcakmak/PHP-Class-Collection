# Gets

Gets section

### Table of Contents

**[getCurrentIpAddress](#getCurrentIpAddress)**  
**[getNextCode](#getNextCode)**  

### Preparation

```php
require_once 'Gets.php';
$gets = new Gets();
```

### getCurrentIpAddress

Retrieves the current user's IP address.

```php
$ipAddress = $gets->getCurrentIpAddress();

if ($ipAddress) {
  echo "Your IP address is: $ipAddress";
} else {
  echo "Could not determine your IP address.";
}
```

### getNextCode

Generates the next character in the sequence based on the provided input code.

```php
$currentCode = "0";
for ($i = 0; $i < 70; $i++) {
    echo $currentCode . "\n";
    $currentCode = $gets->getNextCode($currentCode);
}
```
