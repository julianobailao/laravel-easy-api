<?php

namespace JulianoBailao\LaravelEasyApi;

use Illuminate\Http\Request;

trait ShowTrait
{
    /**
     * Gets a json response with a specific model register.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $selectFields = method_exists($this, 'selectFields') ? $this->selectFields() : '*';

        $this->query = $this->getModel()->select($selectFields)->findOrFail($id);

        return response()->json($this->query);
    }
}
