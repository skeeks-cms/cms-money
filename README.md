Module for working with money and currency
===================================

Info
-------------------

Модуль для работы с деньгами и валютой.

Основная работа была в том, чтобы появилась некоторая прозрачная работа с деньгами.
Типичны пример, который мы прозрачно решаем в этой библиотеке.
(10$ + 154руб + 12$) = рузальтат нужно показать в GBP, для de_DE локали

Example:

```
use \skeeks\cms\money\Money;

$result  = new Money('0', "RUB");

$money1  = new Money('10', "USD");
$money2 = new Money('154', "EUR");
$money3 = new Money('12', "RUB");

$result->add($money1)->add($money2)->add($money3);

$result->convertToCurrency('GBP');

echo (string) $result; // 
echo $result->format();

$formatter = new IntlFormatter('de_DE');

```


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/cms-money "*"
```

or add

```
"skeeks/cms-money": "*"
```

Install migrations

```
php yii migrate --migrationPath=vendor/skeeks/cms-money/migrations
```

Configuration
----------

```php

'components' =>
[
 'money' => [
     'class'         => 'skeeks\cms\money\MoneyComponent',
 ],
 'i18n' => [
     'translations' =>
     [
         'skeeks/money' => [
             'class'             => 'yii\i18n\PhpMessageSource',
             'basePath'          => '@skeeks/cms/money/messages',
             'fileMap' => [
                 'skeeks/money' => 'main.php',
             ],
         ]
     ]
 ],
 ],
 'modules' =>
 [
    'money' => [
        'class'         => 'skeeks\cms\money\Module',
    ]
 ]

```

# Примеры и использование

## Оригинальные примеры

#### Creating a Money object and accessing its monetary value

```php
use skeeks\cms\modules\money\Currency;
use skeeks\cms\modules\money\Money;

// Create Money object that represents 1 EUR
$m = new Money(100, new Currency('EUR'));

// Access the Money object's monetary value
print $m->getAmount();
```

The code above produces the output shown below:

    100

#### Creating a Money object from a string value

```php
use skeeks\cms\modules\money\Currency;
use skeeks\cms\modules\money\Money;

// Create Money object that represents 12.34 EUR
$m = Money::fromString('12.34', new Currency('EUR'))

// Access the Money object's monetary value
print $m->getAmount();
```

The code above produces the output shown below:

    1234
#### Formatting a Money object using PHP's built-in NumberFormatter

```php
use skeeks\cms\modules\money\Currency;
use skeeks\cms\modules\money\Money;
use skeeks\cms\modules\money\IntlFormatter;

// Create Money object that represents 1 EUR
$m = new Money(100, new Currency('EUR'));

// Format a Money object using PHP's built-in NumberFormatter (German locale)
$f = new IntlFormatter('de_DE');

print $f->format($m);
```

The code above produces the output shown below:

    1,00 €

#### Basic arithmetic using Money objects

```php
use skeeks\cms\modules\money\Currency;
use skeeks\cms\modules\money\Money;

// Create two Money objects that represent 1 EUR and 2 EUR, respectively
$a = new Money(100, new Currency('EUR'));
$b = new Money(200, new Currency('EUR'));

// Negate a Money object
$c = $a->negate();
print $c->getAmount();

// Calculate the sum of two Money objects
$c = $a->add($b);
print $c->getAmount();

// Calculate the difference of two Money objects
$c = $b->subtract($a);
print $c->getAmount();

// Multiply a Money object with a factor
$c = $a->multiply(2);
print $c->getAmount();
```

The code above produces the output shown below:

    -100
    300
    100
    200

#### Comparing Money objects

```php
use skeeks\cms\modules\money\Currency;
use skeeks\cms\modules\money\Money;

// Create two Money objects that represent 1 EUR and 2 EUR, respectively
$a = new Money(100, new Currency('EUR'));
$b = new Money(200, new Currency('EUR'));

var_dump($a->lessThan($b));
var_dump($a->greaterThan($b));

var_dump($b->lessThan($a));
var_dump($b->greaterThan($a));

var_dump($a->compareTo($b));
var_dump($a->compareTo($a));
var_dump($b->compareTo($a));
```

The code above produces the output shown below:

    bool(true)
    bool(false)
    bool(false)
    bool(true)
    int(-1)
    int(0)
    int(1)

The `compareTo()` method returns an integer less than, equal to, or greater than
zero if the value of one `Money` object is considered to be respectively less
than, equal to, or greater than that of another `Money` object.

You can use the `compareTo()` method to sort an array of `Money` objects using
PHP's built-in sorting functions:

```php
use skeeks\cms\modules\money\Currency;
use skeeks\cms\modules\money\Money;

$m = array(
    new Money(300, new Currency('EUR')),
    new Money(100, new Currency('EUR')),
    new Money(200, new Currency('EUR'))
);

usort(
    $m,
    function ($a, $b) { return $a->compareTo($b); }
);

foreach ($m as $_m) {
    print $_m->getAmount() . "\n";
}
```

The code above produces the output shown below:

    100
    200
    300

#### Allocate the monetary value represented by a Money object among N targets

```php
use skeeks\cms\modules\money\Currency;
use skeeks\cms\modules\money\Money;

// Create a Money object that represents 0,99 EUR
$a = new Money(99, new Currency('EUR'));

foreach ($a->allocateToTargets(10) as $t) {
    print $t->getAmount() . "\n";
}
```

The code above produces the output shown below:

    10
    10
    10
    10
    10
    10
    10
    10
    10
    9

#### Allocate the monetary value represented by a Money object using a list of ratios

```php
use skeeks\cms\modules\money\Currency;
use skeeks\cms\modules\money\Money;

// Create a Money object that represents 0,05 EUR
$a = new Money(5, new Currency('EUR'));

foreach ($a->allocateByRatios(array(3, 7)) as $t) {
    print $t->getAmount() . "\n";
}
```

The code above produces the output shown below:

    2
    3

#### Extract a percentage (and a subtotal) from the monetary value represented by a Money object

```php
use skeeks\cms\modules\money\Currency;
use skeeks\cms\modules\money\Money;

// Create a Money object that represents 100,00 EUR
$original = new Money(10000, new Currency('EUR'));

// Extract 21% (and the corresponding subtotal)
$extract = $original->extractPercentage(21);

printf(
    "%d = %d + %d\n",
    $original->getAmount(),
    $extract['subtotal']->getAmount(),
    $extract['percentage']->getAmount()
);
```

The code above produces the output shown below:

    10000 = 8265 + 1735

Please note that this extracts the percentage out of a monetary value where the
percentage is already included. If you want to get the percentage of the
monetary value you should use multiplication (`multiply(0.21)`, for instance,
to calculate 21% of a monetary value represented by a Money object) instead.




Links
-------
* [Web site](https://cms.skeeks.com)
* [Author](https://skeeks.com)
* [ChangeLog](https://github.com/skeeks-cms/cms-money/blob/master/CHANGELOG.md)

___

> [![skeeks!](https://skeeks.com/img/logo/logo-no-title-80px.png)](https://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](https://skeeks.com) | [cms.skeeks.com](https://cms.skeeks.com)

