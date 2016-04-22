# mrequest-manager

mrequest-manager is a library to read the data coming from a POST request and mapping it in some PHP object.

## Install

Add to you composer.json file:

```json
{
    "require": {
        "mpstyle/mrequest-manager": "dev-master"
    }
}
```

## Usages

```php
<?php

$requestBook = new RequestBook();
$request = $requestBook->transform( json_encode($_POST['request'], true) );
var_dump($request);

```