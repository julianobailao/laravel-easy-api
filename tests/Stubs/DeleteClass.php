<?php

namespace JulianoBailao\LaravelEasyApi\Tests\Stubs;

use JulianoBailao\LaravelEasyApi\DeleteTrait;
use JulianoBailao\LaravelEasyApi\QueryTrait;

class DeleteClass
{
    use QueryTrait, DeleteTrait;

    protected $modelName = 'Donkey';

    protected $modelNameSpace = 'JulianoBailao\LaravelEasyApi\Tests\Stubs\\';
}
