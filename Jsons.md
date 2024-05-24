# Jsons

Jsons section

### Table of Contents

**[encodeJson](#encodeJson)**  
**[decodeJson](#decodeJson)**  
**[validateJson](#validateJson)**  
**[beautifyJson](#beautifyJson)**  
**[formatJson](#formatJson)**  

### Preparation

```php
require_once 'Comprasions.php';
$jsons = new Jsons();
```

encodeJson
Encodes a PHP variable to JSON format.
```php
$data = ['name' => 'John', 'age' => 30];
$encodedJson = $jsons->encodeJson($data);
echo $encodedJson; // Output: {"name":"John","age":30}
```

decodeJson
Decodes a JSON string into a PHP variable.
```php
$jsonString = '{"name":"Jane","age":25}';
$decodedData = $jsons->decodeJson($jsonString);
print_r($decodedData); // Output: Array([name] => Jane, [age] => 25)
```

validateJson
Validates the structure of a JSON string.
```php
$isJsonValid = $jsonHandler->validateJson($encodedJson);
echo "Is JSON valid? " . ($isJsonValid ? 'Yes' : 'No'); // Is JSON valid? Yes
```

beautifyJson
Beautifies a JSON string for readability.
```php
$uglyJson = '{"key1":"value1","key2":"value2"}';
$beautifiedJson = $jsons->beautifyJson($uglyJson);
echo $beautifiedJson; // Output:
/*
{
    "key1": "value1",
    "key2": "value2"
}
*/
```

formatJson
Formats a JSON string into a well-presented, human-readable format.
```php
$jsonString = '{"name":"Alice","age":35}';
$formattedJson = $jsons->formatJson($jsonString);
echo $formattedJson; // Output:
/*
{
    "name": "Alice",
    "age": 35
}
*/
```

paginateToJsonSecure
Paginates an array of data and returns a secure and comprehensive JSON response with pagination details.
```php
$data = ['item1', 'item2', 'item3', 'item4', 'item5'];
$currentPage = 2;
$perPage = 2;
$baseUrl = 'https://example.com/data';
$responseData = ['message' => 'Pagination example'];
$paginatedJson = $jsons->paginateToJsonSecure($data, $currentPage, $perPage, $baseUrl, $responseData);
echo $paginatedJson; // Output: JSON string with paginated data and pagination details
```
