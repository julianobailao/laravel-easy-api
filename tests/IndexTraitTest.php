<?php

namespace JulianoBailao\LaravelEasyApi\Tests;

use JulianoBailao\LaravelEasyApi\IndexTrait;
use JulianoBailao\LaravelEasyApi\QueryTrait;

class IndexTraitTest extends TestCase
{
    use QueryTrait, IndexTrait {
        transformIndexResponse as traitTransform;
    }

    protected $modelName = 'Donkey';

    protected $modelNameSpace = 'JulianoBailao\LaravelEasyApi\Tests\Stubs\\';

    protected function transformIndexResponse($data)
    {
        $data = $this->traitTransform($data);
        $data['items'][0]['transformerTest'] = true;
        return $data;
    }

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
        $this->assertEquals(1, $json->metadata->total);
        $this->assertEquals(200, $json->metadata->per_page);
        $this->assertEquals(1, $json->metadata->current_page);
        $this->assertEquals(1, $json->metadata->last_page);
        $this->assertEquals(1, $json->metadata->from);
        $this->assertEquals(1, $json->metadata->to);
        $this->assertEquals(true, $json->items[0]->transformerTest);
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
        $this->assertEquals('foo', $json->items[0]->bar);
    }
}
