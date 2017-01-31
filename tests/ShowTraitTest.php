<?php

namespace JulianoBailao\LaravelEasyApi\Tests;

use JulianoBailao\LaravelEasyApi\ShowTrait;
use JulianoBailao\LaravelEasyApi\QueryTrait;

class ShowTraitTest extends TestCase
{
    use QueryTrait, ShowTrait {
        transformShowResponse as traitTransfomer;
    }

    protected $modelName = 'Donkey';

    protected $modelNameSpace = 'JulianoBailao\LaravelEasyApi\Tests\Stubs\\';

    protected function transformShowResponse($data, $id)
    {
        $data = $this->traitTransfomer($data, $id);
        $data['testTranformer'] = true;

        return $data;
    }

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
        $this->assertEquals(true, $json->testTranformer);
    }
}
