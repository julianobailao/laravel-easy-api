<?php

namespace JulianoBailao\LaravelEasyApi\Tests;

use JulianoBailao\LaravelEasyApi\QueryTrait;
use JulianoBailao\LaravelEasyApi\SaveTrait;
use JulianoBailao\LaravelEasyApi\UpdateTrait;

class UpdateTraitWithoutValidationTest extends TestCase
{
    use QueryTrait, SaveTrait, UpdateTrait;

    protected $modelName = 'Donkey';

    protected $modelNameSpace = 'JulianoBailao\LaravelEasyApi\Tests\Stubs\\';

    /**
     * Testing the update method from a resource controller.
     *
     * @return void
     */
    public function testStoreWithoutError()
    {
        $request = new \Illuminate\Http\Request();
        $request->query->add(['foo' => 'barUpdated']);
        $response = $this->update(1, $request);
        $json = json_decode($response->content());

        $this->assertEquals(200, $response->status());
        $this->assertEquals('barUpdated', $json->data->foo);
    }
}
