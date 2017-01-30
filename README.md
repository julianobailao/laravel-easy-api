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

Make a Model:
``` php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donkey extends Model
{
  //
}
```

Then, make a controller, and use the traits of this package. Exists one trait for each method from resource controller equivalent.

``` php

namespace App\Http\Controllers;

// needed for all other traits
use JulianoBailao\LaravelEasyApi\QueryTrait; 

// the index method from resource controller
use JulianoBailao\LaravelEasyApi\IndexTrait;

// the show  method from resource controller
use JulianoBailao\LaravelEasyApi\ShowTrait; 

// needed from store and update traits
use JulianoBailao\LaravelEasyApi\SaveTrait;

// the store method from resource controller
use JulianoBailao\LaravelEasyApi\StoreTrait;

// the update method from resource controller
use JulianoBailao\LaravelEasyApi\UpdateTrait;

// the delete method from resource controller
use JulianoBailao\LaravelEasyApi\DeleteTrait;

class DonkeyController extends Controller
{
    use QueryTrait, IndexTrait, ShowTrait, SaveTrait, StoreTrait, UpdateTrait, DeleteTrait;

    // By default the model name is Donkey, because of the controller name, case need to change this:
    // protected $modelName = 'DonkeyModelName';

    // By default the model namespace is App\\, case need to change this:
    // protected $modelName = 'App\\Product\\Namespace';
}
```

Configure your routes:

``` php
Route::resource('donkeys', 'DonkeyController', ['except' => ['create', 'edit']]);
```
And it`s done!!! You have a resource controller with the index, show, store, update and destroy methods, runing for model Donkey, in the /donkeys route.

## Todo
  * Rename the DeleteTrait to DestroyTrait.
  * Add transformer support.
  * Remove package dependency.
  * Add a trait with all traits added to full resource controllers.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Donate
Support this project and others, via [PayPal](link-donate).

[![Donate][ico-donate]][link-donate]
