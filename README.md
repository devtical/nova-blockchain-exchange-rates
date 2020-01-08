# Blockchain Exchange Rates

Currency data from the major bitcoin exchanges.

![Screenshot](https://i.imgur.com/9jOj8pf.png)

## Installation 

You can install the package in to a [Laravel](http://laravel.com) app that uses [Nova](http://nova.laravel.com) via composer :

```cli
composer require kristories/nova-blockchain-exchange-rates
```


## Usage

Add the card to your `NovaServiceProvider.php`


```php

use Kristories\BlockchainExchangeRates\BlockchainExchangeRates;

// ...

public function cards()
{
    return [
        // ...
        new BlockchainExchangeRates(),
    ];
}
```

## License

The MIT License (MIT).
