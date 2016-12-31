## LitRes API Client

[![Build Status](https://travis-ci.org/firelike/litres-api.svg?branch=master&format=flat-square)](https://travis-ci.org/firelike/litres-api)
[![License](https://poser.pugx.org/firelike/litres-api/license?format=flat-square)](https://packagist.org/packages/firelike/litres-api)


## Introduction

Zend Framework module to consume LitRes API

## Installation
Install the module using Composer into your application's vendor directory. Add the following line to your
`composer.json`.

```json
{
    "require": {
        "firelike/litres-api": "^1.0"
    }
}
```
## Configuration

Enable the module in your `application.config.php` file.

```php
return array(
    'modules' => array(
        'Firelike\LitRes'
    )
);
```

Copy and paste the `litres.local.php.dist` file to your `config/autoload` folder and customize it with your credentials and
other configuration settings. Make sure to remove `.dist` from your file.Your `litres.local.php` might look something like the following:

```php
<?php
return [
    'litres_service' => [
        'log'=>[
            'enable'=>false,
            'message_formats'=>[
                '{method} {uri} HTTP/{version} {req_body}',
                'RESPONSE: {code} - {res_body}',
            ],
            'logger'=>[
                 'stream' => 'php://output',
            ]
        ]
    ]
];
```

## Usage

Calling from your code:

```php
        use Firelike\LitRes\Request\AbstractRequest;
        use Firelike\LitRes\Request\Browser as BrowserRequest;
        use Firelike\LitRes\Service\LitResService;

        
        $request = new BrowserRequest();
        $request->setSearch('King')
            ->setLang('en')
            ->setLimit(25);

        $service = new LitResService();
        $result = $service->browser($request);
        
        $numberOfRecords = $result->toArray()['results'];
        var_dump($numberOfRecords);

        $records= $result->toArray()['fb2-book'];
        var_dump($records);
        
```

Using the console:

```php
php public/index.php litres browser --search=King -v
```
## Implemented Service Methods:

* **browser**
* **genres**
* **persons**


## Links

* [Zend Framework](http://framework.zend.com)
* [LitRes Catalog API Documentation Download](https://www.litres.ru/static/CataLitResAPI.zip)
* [LitRes Affiliate Program](https://www.litres.ru/o-kompanii/partnerskie-programmy/referalnye-partnery/)
