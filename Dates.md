# Dates

Dates section

### Table of Contents

**[currentDateTime](#currentDateTime)**  
**[timeAgo](#timeAgo)**  
**[add](#add)**  

### Preparation

```php
require_once 'Dates.php';
$dates = new Dates();
```

### currentDateTime

Get current date and time in specified format

```php
// Current DateTime
echo "Current DateTime: " . Dates::currentDateTime() . "\n";
```

### timeAgo

Calculate human-readable time difference (time ago)

```php
// Time Ago calculations
echo "Time Ago for '2023-01-01': " . Dates::timeAgo('2023-01-01') . "\n";
```

### add

Add time to a given date

```php
// Add time to dates
echo "Add 1 year to now: " . Dates::add('now', '1 year') . "\n";
echo "Add 6 months to '2024-01-01': " . Dates::add('2024-01-01', '6 months') . "\n";
echo "Add 14 days to '2024-12-01': " . Dates::add('2024-12-01', '14 days') . "\n";
echo "Add 2 hours to '2024-12-01 10:00:00': " . Dates::add('2024-12-01 10:00:00', '2 hours') . "\n";
```
