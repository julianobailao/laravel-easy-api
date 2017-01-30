<?php

namespace JulianoBailao\LaravelEasyApi;

use Illuminate\Http\Request;

trait SaveTrait
{
    public function save(Request $request, $method, $id = null)
    {
        if (method_exists($this, 'validateRequest')) {
            $validation = $this->validateRequest($request, $method, $id);

            if ($validation !== true) {
                return $validation;
            }
        }

        $model = $this->getModel();
        $data = ($id !== null) ? $model->findOrFail($id) : new $model();
        $data->fill($request->all());
        $data->save();

        return response()->json($model->findOrFail($data->id));
    }
}
