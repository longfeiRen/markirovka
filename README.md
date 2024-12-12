Here is a description for the `markirovka` package version 3, focusing on the `XSignature` class:

---

## Markirovka v3 - XSignature

The `markirovka` package provides a robust solution for handling digital signatures in PHP applications. Version 3 introduces the `XSignature` class, which simplifies the process of signing data using certificates.

### Features

- **Certificate Management**: Easily manage and utilize certificates for signing data.
- **Data Signing**: Sign data arrays with a digital signature.
- **Exception Handling**: Improved error handling for missing or invalid certificates.

### Installation

To install the package, use Composer:

```bash
composer require markirovka/signature
```

### Usage

Below is an example of how to use the `XSignature` class:

```php
<?php

require 'vendor/autoload.php';

use Markirovka\Signature\Signature;

$certHash = 'your_certificate_hash';
$data = ['key' => 'value'];

try {
    $signature = new Signature($certHash);
    $signedData = $signature->sign($data);
    echo "Signed Data: " . $signedData;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
```

### Requirements

- PHP >= 7.1.0
- ext-json
- ext-curl
- ext-php\_CPCSP
- guzzlehttp/guzzle ^6.3

### License

This package is licensed under the MIT License.

---

This description provides an overview of the `markirovka` package, its features, installation instructions, usage example, requirements, and license information.