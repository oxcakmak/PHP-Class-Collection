# Checks
It is the Checks section, it is checked here.

### Table of Contents

**[checkStringStartsWith](#checkStringStartsWith)**  
**[checkStringEndsWith](#checkStringEndsWith)**  
**[checkEmailDomain](#checkEmailDomain)**  

### Preparation
```php
require_once 'Checks.php';
$checker = new Checks();
```

### checkStringStartsWith
Checks if a string starts with a given target substring at a specific position.
```php
$text = 'Hello, world!';
$targetString = 'Hello';
$startsWithResult = $checks->checkStringStartsWith($text, $targetString);
echo $startsWithResult ? 'Text starts with the target string' : 'Text does not start with the target string';
// Output: Text starts with the target string
```

### checkStringEndsWith
Checks if a string ends with a given target substring at a specific position.
```php
$text = 'Hello, world!';
$targetString = 'world!';
$endingPosition = 12; // Check up to position 12
$endsWithResult = $checks->checkStringEndsWith($text, $targetString, $endingPosition);
echo $endsWithResult ? 'Text ends with the target string at the specified position' : 'Text does not end with the target string at the specified position';
// Text ends with the target string at the specified position
```

### checkEmailDomain
Checks if an email address contains any of the specified domains.
```php
$email = 'example@example.com';
$domains = ['example.com', 'test.com'];

$result = $checker->checkEmailDomain($email, $domains);

var_dump($result); // Output: bool(true)

// or

$email = 'example@example.com';
$domains = ['example.com', 'test.com'];
$domainValidator = function ($domain) {
    return strpos($domain, '.') !== false; // Custom domain validation logic
};
$emailDomainResult = $checks->checkEmailDomain($email, $domains, $domainValidator);
echo $emailDomainResult ? 'Email address contains one of the specified domains' : 'Email address does not contain any of the specified domains';
// Output: Email address contains one of the specified domains
```
