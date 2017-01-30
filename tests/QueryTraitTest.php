<?php

namespace JulianoBailao\LaravelEasyApi\Tests;

use JulianoBailao\LaravelEasyApi\QueryTrait;
use JulianoBailao\LaravelEasyApi\Tests\Stubs\Donkey;

class QueryTraitTest extends TestCase
{
    use QueryTrait;

    /**
     * Testing the model name gets withou set the model name.
     *
     * @return void
     */
    public function testGetModelNameWithoutSetModelName()
    {
        $this->assertEquals('QueryTraitTest', $this->getModelName());
    }

    /**
     * Testing the model name gets seting the model name.
     *
     * @return void
     */
    public function testGetModelNameSetingTheModelName()
    {
        $this->modelName = 'Donkey';
        $this->assertEquals($this->modelName, $this->getModelName());
    }

    /**
     * Testing the model object gets withou set name space.
     *
     * @expectedException ReflectionException
     *
     * @return void
     */
    public function testGetModelWithoutSetNameSpace()
    {
        $this->assertInstanceOf(Donkey::class,$this->getModel());
    }

    /**
     * Testing the model object gets seting the name space.
     *
     * @expectedException ReflectionException
     *
     * @return void
     */
    public function testGetModelSetingTheNameSpace()
    {
        $this->modelNameSpace = 'JulianoBailao\LaravelEasyApi\Tests\Stubs\\';
        $this->assertInstanceOf(Donkey::class,$this->getModel());
    }

    /**
     * Testing the model table columns gets.
     *
     * @return void
     */
    public function testGetColumns()
    {
        $this->modelName = 'Donkey';
        $this->modelNameSpace = 'JulianoBailao\LaravelEasyApi\Tests\Stubs\\';
        $columns = $this->getColumns();
        $this->assertEquals(['id', 'foo', 'bar', 'created_at', 'updated_at'], $columns);
    }

    /**
     * Testing the query object gets.
     *
     * @return void
     */
    public function testSetAndGetQuery()
    {
        $this->modelName = 'Donkey';
        $this->modelNameSpace = 'JulianoBailao\LaravelEasyApi\Tests\Stubs\\';
        $query = $this->getModel()->find(1);
        $this->assertEquals('bar', $query->foo);
        $this->assertEquals('foo', $query->bar);
        $this->setQuery($query);
        $this->assertEquals($query, $this->getQuery());
    }
}
