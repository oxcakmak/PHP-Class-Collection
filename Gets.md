# Gets

Gets section

### Table of Contents

**[getCurrentIpAddress](#getCurrentIpAddress)**  

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
