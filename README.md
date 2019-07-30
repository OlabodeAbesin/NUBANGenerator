# Nuban Account Generator

### This package was inspired by Samuel(https://github.com/samuel52)

### This package is used to generate a Nigerian Uniform Bank Account Number in php laravel

## Usage

```php
composer require olabodeabesin/nuban
```

## Top of your controller, 

```php
use Olabodeabesin\Nuban\Http\Controllers\NubanController as Nuban;
```


###

```php
    public function index()
    {
        $bankcode = 11111;
        $serial = 123456789;
        $nuban = new Nuban();
        $nuban = $nuban->generate($bankcode, $serial);
        dd($nuban);
    }
```

> Note: Bankcode and Serial number must be passed to the package. For a bank, bank code is 3 digits whie for a Microfinance, its 5 digits.