<?php

namespace JulianoBailao\LaravelEasyApi;

use Illuminate\Http\Request;

trait SaveTrait
{
    /**
     * Override it to transform the store query.
     *
     * @param Model   $query
     * @param Request $request
     *
     * @return mixed
     */
    protected function transformStoreQuery($query, Request $request)
    {
        return $this->saveQuery($query, $request);
    }

    /**
     * Override it to transform the update query.
     *
     * @param Model   $query
     * @param Request $request
     * @param int     $id
     *
     * @return mixed
     */
    protected function transformUpdateQuery($query, Request $request, $id)
    {
        return $this->saveQuery($query, $request, $id);
    }

    /**
     * Make the default save store/update query.
     *
     * @param Model   $query
     * @param Request $request
     * @param int     $id
     *
     * @return mixed
     */
    protected function saveQuery($query, Request $request, $id = null)
    {
        $data = ($id !== null) ? $query->findOrFail($id) : new $query();
        $data->fill($request->all());
        $data->save();

        return $query->findOrFail($data->id);
    }

    /**
     * Override it to transform the store response.
     *
     * @param Request $request
     * @param string  $method
     *
     * @return array
     */
    protected function transformStoreResponse(array $data, $method)
    {
        return $this->saveResponse($data, $method);
    }

    /**
     * Override it to transform the update response.
     *
     * @param Request $request
     * @param string  $method
     *
     * @return array
     */
    protected function transformUpdateResponse(array $data, $method, $id)
    {
        return $this->saveResponse($data, $method, $id);
    }

    /**
     * The store / update response.
     *
     * @param array  $data
     * @param string $method
     * @param int    $id
     *
     * @return array
     */
    protected function saveResponse(array $data, $method, $id = null)
    {
        return [
            'id'     => $id ?: $data['id'],
            'method' => $method,
            'data'   => $data,
        ];
    }

    /**
     * Save the data in the database from store and update method.
     *
     * @param Request $request
     * @param string  $method
     * @param int     $id
     *
     * @return mixed
     */
    public function save(Request $request, $method, $id = null)
    {
        if (method_exists($this, 'validateRequest')) {
            $validation = $this->validateRequest($request, $method, $id);

            if ($validation !== true) {
                return $validation;
            }
        }

        $model = $this->getModel();
        $query = $this->{'transform'.ucfirst($method).'Query'}($model, $request, $id);
        $data = $this->{'transform'.ucfirst($method).'Response'}($query->toArray(), $method, $id);

        return response()->json($data);
    }
}
