<?php

namespace JulianoBailao\LaravelEasyApi\Tests;

use JulianoBailao\LaravelEasyApi\ShowTrait;
use JulianoBailao\LaravelEasyApi\QueryTrait;

class ShowTraitTest extends TestCase
{
    use QueryTrait, ShowTrait;

    protected $modelName = 'Donkey';

    protected $modelNameSpace = 'JulianoBailao\LaravelEasyApi\Tests\Stubs\\';

    /**
     * Testing the show method from a resource controller.
     *
     * @return void
     */
    public function testShow()
    {
        $response = $this->show(1);
        $json = json_decode($response->content());

        $this->assertEquals(200, $response->status());
        $this->assertEquals(1, $json->id);
        $this->assertEquals('bar', $json->foo);
        $this->assertEquals('foo', $json->bar);
    }
}
