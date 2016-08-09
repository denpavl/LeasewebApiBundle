LeasewebApiBundle
=================

Bundle for LeaseWeb API

## Requirements

* [LswApiCallerBundle](https://github.com/LeaseWeb/LswApiCallerBundle)
* PHP 5.3 with curl support
* Symfony 2.1

## Installation

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

## License

This bundle is under the MIT license.
