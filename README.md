LeasewebApiBundle
=================

Bundle for LeaseWeb API (http://developer.leaseweb.com/api-docs/?php)

## Requirements

* [LswApiCallerBundle](https://github.com/LeaseWeb/LswApiCallerBundle)
* PHP 5.3 with curl support
* Symfony 2.1

## Installation

### Step 1: Download LeasewebApiBundle using composer

Add LeasewebApiBundle in your composer.json:

``` js
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/dieselproxy/LeasewebApiBundle"
        }
    ],
    "require": {
        "dieselproxy/leaseweb-api-bundle": "*",
        ...
    },
```

Now tell composer to download the bundle by running the command:

```
$ php composer.phar update
```

Composer will install the bundle to your project's `vendor/dieselproxy` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new new Dp\LeasewebApiBundle\LeasewebApiBundle(),
    );
}
```

## Configuration

``` yaml
# app/config/config.yml
leaseweb_api:
    api_url: 'https://api.leaseweb.com/v1'
    api_key: '****-****-****-****'
    as_associative_array: false
```
How to get `api_url` and `api_key` you can find here: [LeaseWeb API Authentication](http://developer.leaseweb.com/api-docs/#authentication)

Parameter `as_associative_array` is related to [json_decode](http://php.net/manual/en/function.json-decode.php) `assoc` parameter.

## Usage

## License

This bundle is under the MIT license.
