<?php

namespace JulianoBailao\LaravelEasyApi\Tests\Stubs;

use JulianoBailao\LaravelEasyApi\DestroyTrait;
use JulianoBailao\LaravelEasyApi\QueryTrait;

class DeleteClass
{
    use QueryTrait, DestroyTrait {
        transformDestroyResponse as traitTransform;
    }

    protected $modelName = 'Donkey';

    protected $modelNameSpace = 'JulianoBailao\LaravelEasyApi\Tests\Stubs\\';

    protected function transformDestroyResponse($response)
    {
        $data = $this->traitTransform($response);
        $data['transformedData'] = true;

        return $data;
    }
}
