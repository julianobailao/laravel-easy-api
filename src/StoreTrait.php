<?php

namespace JulianoBailao\LaravelEasyApi;

use Illuminate\Http\Request;

trait StoreTrait
{
    public function store(Request $request)
    {
        return $this->save($request, 'store');
    }
}
