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

This package will helps you build as quickly as possible your APIs, using pre-configured traits and resource controllers, [see the wiki for more information](https://github.com/julianobailao/laravel-easy-api/wiki).

## Install

Via Composer

```bash
$ composer require julianobailao/laravel-easy-api
```

## Documentation

Please, see the [wiki](https://github.com/julianobailao/laravel-easy-api/wiki) for the full documentation of this project.

## Basic Usage

### Create a Model:
Create a model and configure it has you wish.

``` php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donkey extends Model
{
  //
}
```

### Create a controller
Create a controller, and use the ResourceTrait of this package. Exists one trait for each method from resource controller equivalent, if you want use a especific methods, and not all of then, read about [Independent Methods](#).

``` php

namespace App\Http\Controllers;

use JulianoBailao\LaravelEasyApi\ResourceTrait;

class DonkeyController extends Controller
{
  use ResourceTrait;
}
```

### Route
Configure your route like a resource controller:

``` php
Route::resource('donkeys', 'DonkeyController', ['except' => ['create', 'edit']]);
```

### It's runing!
You have a resource controller with the index, show, store, update and destroy methods, runing for model Donkey, in the /donkeys route.

Please, see the [wiki](https://github.com/julianobailao/laravel-easy-api/wiki) for the full documentation of this project.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Donate
Support this project and others, via [PayPal](link-donate).

[![Donate][ico-donate]][link-donate]
