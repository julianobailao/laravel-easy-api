<?php

namespace JulianoBailao\LaravelEasyApi;

use Illuminate\Support\Facades\Schema;

trait QueryTrait
{
    /**
     * The query builder object.
     *
     * @var Illuminate\Database\Eloquent\Builder
     */
    private $query;

    /**
     * Gets the model name.
     *
     * @return string
     */
    protected function getModelName()
    {
        if (! isset($this->modelName) || $this->modelName === null) {
            $this->modelName = str_replace('Controller', null, class_basename($this));
        }

        return $this->modelName;
    }

    /**
     * Gets the model Object
     *
     * @return mixed
     */
    protected function getModel()
    {
        if (! isset($this->modelNameSpace) || $this->modelNameSpace === null) {
            $this->modelNameSpace = 'App\\';
        }

        return app($this->modelNameSpace.$this->getModelName());
    }

    /**
     * Gets the table columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return Schema::getColumnListing($this->getModel()->getTable());
    }

    /**
     * Gets the query builder object.
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    protected function getQuery()
    {
        return $this->query;
    }

    /**
     * Sets the query builder object.
     *
     * @param mixed
     *
     * @return mixed
     */
    protected function setQuery($builder)
    {
        return $this->query = $builder;
    }
}
