<?php

namespace JulianoBailao\LaravelEasyApi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

trait ValidationTrait
{
    /**
     * Implements to customize the validation rules.
     *
     * @param string $method storage or update
     * @param int    $id     the id from update record
     *
     * @return array
     */
    abstract protected function validationRules($method, $id = null);

    /**
     * Implements to customize the validation messages.
     *
     * @param string $method storage or update
     * @param int    $id     the id from update record
     *
     * @return array
     */
    abstract protected function validationMessages($method, $id = null);

    /**
     * Validate a Request data.
     *
     * @param Request $request
     * @param string  $method
     * @param string  $id
     *
     * @return mixed
     */
    protected function validateRequest(Request $request, $method, $id = null)
    {
        $validator = Validator::make(
            $request->all(),
            $this->validationRules($method, $id),
            $this->validationMessages($method, $id)
        );

        if ($validator->fails()) {
            $rerrorData = [
                'error'    => true,
                'messages' => $validator->messages()->all(),
            ];

            return response()->json($rerrorData, 422);
        }

        return true;
    }
}
