<?php

namespace JulianoBailao\LaravelEasyApi;

use Illuminate\Http\Request;

trait DeleteTrait
{
    public function delete($id)
    {
        $data = $this->getModel()->findOrFail($id);

        return response()->json([
            'deleted' => $data->delete(),
        ]);
    }
}
