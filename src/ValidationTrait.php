<?php

namespace JulianoBailao\LaravelEasyApi;

use Illuminate\Http\Request;

trait ValidationTrait
{
    /**
     * Save a new register.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        $selectFields = method_exists($this, 'selectFields') ? $this->selectFields() : '*';
        $this->query = $this->getModel()->select($selectFields)->findOrFail($id);

        return response()->json($this->query);
    }

    /**
     * Implements to customize the validation rules.
     * @param Request $request
     *
     * @return array
     */
    abstract protected function validationRules(Request $request);
}
