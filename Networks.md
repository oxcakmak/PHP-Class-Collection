# Networks

Networks section

### Table of Contents

**[getDomainName](#getDomainName)**  
**[visitorIpAddress](#visitorIpAddress)**  
**[DDDDDDDDD](#DDDDDDDDD)**  
**[DDDDDDDDD](#DDDDDDDDD)**  
**[DDDDDDDDD](#DDDDDDDDD)**  
**[DDDDDDDDD](#DDDDDDDDD)**  
**[DDDDDDDDD](#DDDDDDDDD)**  
**[DDDDDDDDD](#DDDDDDDDD)**  
**[DDDDDDDDD](#DDDDDDDDD)**  
**[DDDDDDDDD](#DDDDDDDDD)**  
**[DDDDDDDDD](#DDDDDDDDD)**  
**[DDDDDDDDD](#DDDDDDDDD)**  

### visitorIpAddress

Retrieve the visitor's IP address

```php
// IP Address retrieval
$ip = $networkds->visitorIpAddress();
echo "Visitor IP Address: " . ($ip ?: 'Not Available') . "\n";
```

### Preparation

```php
require_once 'Networks.php';
$networks = new Networks();
```

### getDomainName

Extract domain name from a given URL

```php
$url = 'https://www.example.com/path';
echo "Simple Domain: " . $networks->getDomainName($url) . "\n";
```

### getAdvancedDomainName

Advanced domain extraction with more comprehensive parsing - include subdomains

```php
$url = 'http://subdomain.example.co.uk/page';
echo "Advanced Domain (with subdomains): " . $networks->getAdvancedDomainName($url, true) . "\n";
```

### getAdvancedDomainName

Advanced domain extraction with more comprehensive parsing

```php
$url = 'www.test-site.org';
echo "Advanced Domain (main domain): " . $networks->getAdvancedDomainName($url, false) . "\n\n";
```

### sanitizeIpAddress

Sanitize and validate IP address.
Removes any potential malicious characters and validates the IP address format.

```php
$ip = '2001:0db8::1!@#$%^';
echo "IP: " . $networks->sanitizeIpAddress($ip) . "\n\n";
```
