<?php

namespace JulianoBailao\LaravelEasyApi;

use Illuminate\Http\Request;

trait UpdateTrait
{
    public function update($id, Request $request)
    {
        return $this->save($request, 'update', $id);
    }
}
