<?php

namespace JulianoBailao\LaravelEasyApi\Tests;

use JulianoBailao\LaravelEasyApi\Tests\Stubs\DeleteClass;
use JulianoBailao\LaravelEasyApi\Tests\Stubs\Donkey;

class DeleteTraitTest extends TestCase
{
    /**
     * Testing the delete method from a resource controller.
     *
     * @return void
     */
    public function testStoreWithoutError()
    {
        $delete = new DeleteClass();
        $response = $delete->destroy(1);
        $json = json_decode($response->content());

        $this->assertEquals(200, $response->status());
        $this->assertEquals(true, $json->deleted);
        $this->assertEquals(true, $json->transformedData);
        $this->assertEquals(null, Donkey::find(1));
    }
}
