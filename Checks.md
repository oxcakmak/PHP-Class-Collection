# Checks
It is the Checks section, it is checked here.

### Table of Contents

**[checkEmailDomain](#checkEmailDomain)**  

### Preparation
```php
require_once 'Checks.php';
$checker = new Checks();
```

### checkEmailDomain
Checks if an email address contains any of the specified domains.
```php
$email = 'example@example.com';
$domains = ['example.com', 'test.com'];

$result = $checker->checkEmailDomain($email, $domains);

var_dump($result); // Output: bool(true)
```
