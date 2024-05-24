# Files
Files section

### Table of Contents

**[humanReadableFilesize](#humanReadableFilesize)**  

### Preparation
```php
require_once 'Files.php';
$files = new Files();
```

### humanReadableFilesize
Converts a file size in bytes to a human-readable format (e.g., KB, MB, GB).
```php
$fileSize1 = 1024; // 1 KB
$fileSize2 = 5368709120; // 5 GB

try {
    echo $files->humanReadableFilesize($fileSize1); // Output: 1 KB
    echo "\n";
    echo $files->humanReadableFilesize($fileSize2); // Output: 5 GB
} catch (InvalidArgumentException $e) {
    echo 'Error: ' . $e->getMessage();
} catch (OutOfRangeException $e) {
    echo 'Error: ' . $e->getMessage();
}
```
