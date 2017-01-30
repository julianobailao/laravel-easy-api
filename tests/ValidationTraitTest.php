<?php

namespace JulianoBailao\LaravelEasyApi\Tests;

use JulianoBailao\LaravelEasyApi\ValidationTrait;
use JulianoBailao\LaravelEasyApi\QueryTrait;

class ValidationTraitTest extends TestCase
{
    use ValidationTrait;

    /**
     * Testing the show method from a resource controller.
     *
     * @return void
     */
    public function testValidationError()
    {
        $request = new \Illuminate\Http\Request();
        $response = $this->validateRequest($request, 'store');
        $json = json_decode($response->content());

        $this->assertEquals(422, $response->status());

        $messages = $this->validationMessages('store');
        foreach ($this->validationRules('store') as $key => $rule) {
            if (!isset($json->messages->{$key})) {
                continue;
            }

            $this->assertEquals($json->messages->{$key}[0], $messages[$key.'.'.$rule]);
        }

    }

    protected function validationRules($method, $id = null)
    {
        return [
            'foo' => 'required',
            'bar' => 'numeric',
        ];
    }

    protected function validationMessages()
    {
        return [
            'foo.required' => 'hey! sets the foo value!',
            'bar.numeric' => 'hey! bar must be a number.',
        ];
    }
}
