# Strings

Strings section

### Table of Contents

**[Slugify](#Slugify)**  
**[startsWith](#startsWith)**  
**[endsWith](#endsWith)**  
**[clean](#clean)**  
**[xssClean](#xssClean)**  
**[convertToUtf8](#convertToUtf8)**  
**[sanitizeOutput](#sanitizeOutput)**  
**[escapeXss](#escapeXss)**  
**[stripAllWhitespace](#stripAllWhitespace)**  
**[truncateStringWithoutCuttingWord](#truncateStringWithoutCuttingWord)**  


### Preparation

```php
require_once 'Strings.php';
$strings = new Strings();

// Example usage:
$string = " Hello, World! Welcome to programming with PHP. ";
```

### Slugify

Converts a string into a URL-friendly slug, supporting Turkish and other languages.

```php
// Slugify
echo "Slugified: " . Strings::slugify($string) . "\n";
```

### startsWith

Checks if a string starts with a specific substring.

```php
// Starts with
echo "Starts with 'Hello': " . (Strings::startsWith($string, "Hello") ? "Yes" : "No") . "\n";
```

### endsWith

Checks if a string ends with a specific substring.

```php
// Ends with
echo "Ends with 'PHP.': " . (Strings::endsWith($string, "PHP.") ? "Yes" : "No") . "\n";
```

### clean

Cleans a string by removing extra whitespace and non-printable characters.

```php
// Clean
echo "Cleaned: " . Strings::clean($string) . "\n";
```

### xssClean

Cleans a string to prevent XSS (Cross-Site Scripting) attacks by stripping dangerous HTML tags.

```php
// XSS Clean
$maliciousString = "<script>alert('XSS');</script>";
echo "XSS Cleaned: " . Strings::xssClean($maliciousString) . "\n";
```

### convertToUtf8

Converts a string from its detected encoding to UTF-8

```php
// Encoding conversion
$originalString = "Some text with potential encoding issues";
$utf8String = Strings::convertToUtf8($originalString);
echo "UTF-8 Converted: $utf8String\n";
```

### sanitizeOutput

Sanitizes a string for output by removing HTML tags and escaping special characters

```php
// Output sanitization
$dirtyInput = "<script>alert('XSS');</script>Hello, World!";
$cleanOutput = Strings::sanitizeOutput($dirtyInput);
echo "Sanitized Output: $cleanOutput\n";
```

### escapeXss

Escapes special characters to prevent XSS vulnerabilities

```php
// XSS Escaping
$xssInput = "& \"' < >";
$escapedInput = Strings::escapeXss($xssInput);
echo "XSS Escaped: $escapedInput\n";
```

### stripAllWhitespace

Removes all whitespace characters from a string

```php
// Whitespace stripping
$stringWithSpaces = "  Hello   World  \n\t";
$strippedString = Strings::stripAllWhitespace($stringWithSpaces);
echo "Whitespace Stripped: $strippedString\n";
```

### truncateStringWithoutCuttingWord

Truncates a string to a specified length without cutting a word

```php
// String truncation
$longString = "This is a very long string that needs to be truncated without cutting words";
$truncatedString = Strings::truncateStringWithoutCuttingWord($longString, 30);
echo "Truncated String: $truncatedString\n";
```
