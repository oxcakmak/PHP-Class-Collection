# Jsons

Jsons section

### Table of Contents

**[encode](#encode)**  
**[decode](#decode)**  
**[beautify](#beautify)**  

### Preparation

```php
require_once 'Jsons.php';
$jsons = new Jsons();

// Example usage:
$data = ["name" => "John", "age" => 30, "city" => "New York"];
```

### encode

Encode data into JSON format.

```php
// Encoding
$encoded = Jsons::encode($data, true);
echo "Encoded JSON:\n" . $encoded . "\n\n";
```

### decode

Decode a JSON string into a PHP variable.

```php
// Decoding
$decoded = Jsons::decode($encoded);
echo "Decoded Array:\n";
print_r($decoded);
```

### beautify

Beautify a JSON string for improved readability.

```php
// Beautifying
$uglyJson = '{"name":"John","age":30,"city":"New York"}';
$beautified = Jsons::beautify($uglyJson);
echo "\nBeautified JSON:\n" . $beautified;
```
