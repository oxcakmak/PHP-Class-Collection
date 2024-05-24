# Strings

Strings section

### Table of Contents

**[isString](#isString)**  
**[convertToUtf8](#convertToUtf8)**  
**[sanitizeOutput](#sanitizeOutput)**  
**[escapeXss](#escapeXss)**  

### Preparation

```php
require_once 'Strings.php';
$stringUtils = new Strings();
```

### isString
Determines if the provided input is a string data type.
```php
$inputString = "Hello";
try {
    $isStringResult = $stringUtils->isString($inputString);
    echo "Is '$inputString' a string? " . ($isStringResult ? "Yes" : "No");
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage();
}
// Is 'Hello' a string? Yes
```

### convertToUtf8
Converts a string from its detected encoding to UTF-8.
```php
$textToConvert = "Códer";
$convertedText = $stringUtils->convertToUtf8($textToConvert);
echo "Converted text: $convertedText"; // Converted text: Códer
```

### sanitizeOutput
Sanitizes a string for output by removing HTML tags, slashes, and trimming whitespace. Additionally, escapes special characters to prevent XSS vulnerabilities.
```php
$textToSanitize = "<p>Hello, world!</p>";
$sanitizedText = $stringUtils->sanitizeOutput($textToSanitize);
echo "Sanitized text: $sanitizedText"; // Sanitized text: Hello, world!
```

### escapeXss
Escapes special characters in a string to prevent XSS vulnerabilities.
```php
$textToEscape = "<script>alert('XSS attack');</script>";
$escapedText = $stringUtils->escapeXss($textToEscape);
echo "Escaped text: $escapedText"; // Escaped text: &lt;script&gt;alert(&#039;XSS attack&#039;);&lt;/script&gt;
```
