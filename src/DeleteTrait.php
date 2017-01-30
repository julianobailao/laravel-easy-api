<?php

namespace JulianoBailao\LaravelEasyApi;

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
