# Skyhub - Api SDK

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]
[![Donate][ico-donate]][link-donate]

[ico-version]: https://img.shields.io/packagist/v/marketplacehub/php-skyhub-sdk.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/marketplacehub/php-skyhub-sdk/master.svg?style=flat-square
[ico-scrutinizer]:https://img.shields.io/scrutinizer/coverage/g/marketplacehub/php-skyhub-sdk.svg?style=flat-square
[ico-code-quality]:https://img.shields.io/scrutinizer/g/marketplacehub/php-skyhub-sdk.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/marketplacehub/php-skyhub-sdk.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/79355495/shield
[ico-donate]:https://img.shields.io/badge/Donate-PayPal-brightgreen.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/marketplacehub/php-skyhub-sdk
[link-travis]: https://travis-ci.org/marketplacehub/php-skyhub-sdk
[link-scrutinizer]: https://scrutinizer-ci.com/g/marketplacehub/php-skyhub-sdk/?branch=master
[link-code-quality]: https://scrutinizer-ci.com/g/marketplacehub/php-skyhub-sdk/?branch=master
[link-downloads]: https://packagist.org/packages/marketplacehub/php-skyhub-sdk
[link-styleci]: https://styleci.io/repos/79355495
[link-donate]: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LDRJCTGY2YXYJ

## Instalação

Via Composer

```bash
$ composer require marketplacehub/php-skyhub-sdk
```

## Como usar

Sintaxe simples e intuitiva.

``` php
use Marketplacehub\Skyhub\ApiClient as Skyhub;

$skyhub = new Skyhub($username = 'foo', $token = 'bar', $debug = true);

$response = $skyhub->products()->get(); // GuzzleHttp\Psr7\Response
$products = json_decode($response->getBody()); // stdClass product data
$statusCode = $response->getStausCode(); // 200
```

Por favor, visite a [wiki](https://github.com/marketplacehub/php-skyhub-sdk/wiki) deste projeto para ver a documentação completa.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Doações
Se este projeto o ajudou, por favor, considere me fazer uma doação. Qualquer quantia me ajudaria muito.

[![Donate][ico-donate]][link-donate]
