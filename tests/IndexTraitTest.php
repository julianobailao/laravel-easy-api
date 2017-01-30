<?php

namespace JulianoBailao\LaravelEasyApi\Tests;

use JulianoBailao\LaravelEasyApi\IndexTrait;
use JulianoBailao\LaravelEasyApi\QueryTrait;

class IndexTraitTest extends TestCase
{
    use QueryTrait, IndexTrait;

    protected $modelName = 'Donkey';

    protected $modelNameSpace = 'JulianoBailao\LaravelEasyApi\Tests\Stubs\\';

    /**
     * Testing the index method from a resource controller.
     *
     * @return void
     */
    public function testIndex()
    {
        $request = new \Illuminate\Http\Request();
        $request->query->add(['per_page' => 200]);

        $response = $this->index($request);
        $json = json_decode($response->content());

        $this->assertEquals(200, $response->status());
        $this->assertEquals(1, $json->total);
        $this->assertEquals(200, $json->per_page);
        $this->assertEquals(1, $json->current_page);
        $this->assertEquals(1, $json->last_page);
        $this->assertEquals(1, $json->from);
        $this->assertEquals(1, $json->to);
    }

    /**
     * Testing the index method from a resource controller.
     *
     * @return void
     */
    public function testIndexWithFilter()
    {
        $request = new \Illuminate\Http\Request();
        $request->query->add(['filter' => 'foo']);

        $response = $this->index($request);
        $json = json_decode($response->content());

        $this->assertEquals(200, $response->status());
        $this->assertEquals('foo', $json->data[0]->bar);
    }
}
