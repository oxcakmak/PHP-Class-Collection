# Times

Times section

### Table of Contents

**[getCurrentDateTime](#getCurrentDateTime)**  
**[timeAgo](#timeAgo)**  

### Preparation

```php
require_once 'Times.php';
$times = new Times();
```

### getCurrentDateTime

Gets the current date and time in a formatted string.

```php
$currentDate = $times->getCurrentDateTime();
echo "Current date and time: $currentDate\n"; // Outputs "YYYY-MM-DD HH:MM:SS"

// Get date only (YYYY-MM-DD)
$dateOnly = $times->getCurrentDateTime('Y-m-d');
echo "Date only: $dateOnly\n";

// Get time only (HH:MM:SS)
$timeOnly = $times->getCurrentDateTime('H:i:s');
echo "Time only: $timeOnly\n";
```

### timeAgo

Calculates the time difference between a given date and the current date and returns a user-friendly string representation.

```php
$date = '2024-06-11 18:00:00'; // Adjust as needed

try {
  $timeAgoString = timeAgo($date);
  echo "It was $timeAgoString.";
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
```
