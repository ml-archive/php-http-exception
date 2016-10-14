Fuzz HTTP Exception
===================

A library containing a set of RESTful HTTP exceptions that use a consistent interface, built upon the ideas set by [symfony/http-kernel](https://github.com/symfony/http-kernel)

## Usage
```php
<?php

use Fuzz\HttpException\AccessDeniedHttpException;

throw new AccessDeniedHttpException('Access denied.');
```

## TODO
1. Support all HTTP status codes
1. Improve exception API
