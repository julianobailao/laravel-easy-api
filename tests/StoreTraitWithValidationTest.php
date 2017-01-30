<?php

namespace JulianoBailao\LaravelEasyApi\Tests;

use JulianoBailao\LaravelEasyApi\QueryTrait;
use JulianoBailao\LaravelEasyApi\SaveTrait;
use JulianoBailao\LaravelEasyApi\StoreTrait;
use JulianoBailao\LaravelEasyApi\ValidationTrait;

class StoreTraitWithValidationTest extends TestCase
{
    use QueryTrait, ValidationTrait, SaveTrait, StoreTrait;

    protected $modelName = 'Donkey';

    protected $modelNameSpace = 'JulianoBailao\LaravelEasyApi\Tests\Stubs\\';

    /**
     * Testing the store method from a resource controller.
     *
     * @return void
     */
    public function testStoreWithoutError()
    {
        $request = new \Illuminate\Http\Request();
        $request->query->add(['foo' => 'bar']);
        $request->query->add(['bar' => 1]);
        $response = $this->store($request);
        $json = json_decode($response->content());

        $this->assertEquals(200, $response->status());
        $this->assertEquals('bar', $json->foo);
        $this->assertEquals(null, $json->bar);
    }


    /**
     * Testing the store method from a resource controller with validation errors.
     *
     * @return void
     */
    public function testStoreWithError()
    {
        $request = new \Illuminate\Http\Request();
        $request->query->add(['bar' => 'foo']);
        $response = $this->store($request);
        $json = json_decode($response->content());

        $this->assertEquals(422, $response->status());
    }

    protected function validationRules($method, $id = null)
    {
        return [
            'foo' => 'required',
        ];
    }

    protected function validationMessages()
    {
        return [
            'foo.required' => 'hey! sets the foo value!',
        ];
    }
}
