# Laravel - Easy Api

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]
[![Donate][ico-donate]][link-donate]

[ico-version]: https://img.shields.io/packagist/v/julianobailao/laravel-easy-api.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/julianobailao/laravel-easy-api/master.svg?style=flat-square
[ico-scrutinizer]:https://img.shields.io/scrutinizer/coverage/g/julianobailao/laravel-easy-api.svg?style=flat-square
[ico-code-quality]:https://img.shields.io/scrutinizer/g/julianobailao/laravel-easy-api.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/julianobailao/laravel-easy-api.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/80361872/shield
[ico-donate]:https://img.shields.io/badge/Donate-PayPal-brightgreen.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/julianobailao/laravel-easy-api
[link-travis]: https://travis-ci.org/julianobailao/laravel-easy-api
[link-scrutinizer]: https://scrutinizer-ci.com/g/julianobailao/laravel-easy-api/?branch=master
[link-code-quality]: https://scrutinizer-ci.com/g/julianobailao/laravel-easy-api/?branch=master
[link-downloads]: https://packagist.org/packages/julianobailao/laravel-easy-api
[link-styleci]: https://styleci.io/repos/80361872
[link-donate]: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LDRJCTGY2YXYJ

## Install

Via Composer

```bash
$ composer require julianobailao/laravel-easy-api
```

## How to use

``` php

use JulianoBailao\LaravelEasyApi\QueryTrait;
use JulianoBailao\LaravelEasyApi\IndexTrait;
use JulianoBailao\LaravelEasyApi\ShowTrait;
use JulianoBailao\LaravelEasyApi\SaveTrait;
use JulianoBailao\LaravelEasyApi\StoreTrait;
use JulianoBailao\LaravelEasyApi\UpdateTrait;
use JulianoBailao\LaravelEasyApi\DeleteTrait;

class ProductController extends Controller
{
    use QueryTrait, IndexTrait, ShowTrait, SaveTrait, StoreTrait, UpdateTrait, DeleteTrait;

    // originaly the model name is Product, case need customize this
    protected $modelName = 'ProductModelName';

    // originaly the model namespace is App\\, case need customize this
    protected $modelName = 'App\\Product\\Namespace';
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Donate
Support this project and others, via [PayPal](link-donate).

[![Donate][ico-donate]][link-donate]
