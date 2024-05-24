# Urls

Urls section

### Table of Contents

**[createSlug](#createSlug)**  
**[parseUrl](#parseUrl)**  

### Preparation

```php
require_once 'Urls.php';
$urls = new Urls();
```

### createSlug
Generates a URL slug from a string, replacing special characters and converting to lowercase.
```php
$text = 'Hello, World! Şişli İstanbul';
$slug = $urls->createSlug($text);
echo $slug; // hello-world-sisli-istanbul
```

### parseUrl
Parses a URL into its component parts.
```php
$url = 'https://www.example.com/path/to/page?query=123#section';
$parsedUrl = $urls->parseUrl($url);
print_r($parsedUrl);
/*
Array
(
    [scheme] => https
    [host] => www.example.com
    [port] => 
    [user] => 
    [pass] => 
    [path] => /path/to/page
    [query] => query=123
    [fragment] => section
)
*/
```
