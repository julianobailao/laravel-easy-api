<?php

namespace JulianoBailao\LaravelEasyApi;

trait ShowTrait
{
    /**
     * Override it to transform the show query.
     *
     * @param Model $query
     * @param int   $id
     *
     * @return mixed
     */
    protected function transformShowQuery($query, $id)
    {
        return $this->showQuery($query, $id);
    }

    /**
     * Make the show query.
     *
     * @param Model $query
     * @param int   $id
     *
     * @return bool
     */
    protected function showQuery($query, $id)
    {
        return $query->findOrFail($id);
    }

    /**
     * Override it to transform the show response.
     *
     * @param bool $query
     *
     * @return array
     */
    protected function transformShowResponse($response)
    {
        return $this->showResponse($response);
    }

    /**
     * The show response.
     *
     * @param bool $response
     *
     * @return array
     */
    public function showResponse($response)
    {
        return $response;
    }

    /**
     * Gets a json response with a specific model register.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function show($id)
    {
        $query = $this->transformShowQuery($this->getModel(), $id);
        $data = $this->transformShowResponse($query->toArray());

        return response()->json($data);
    }
}
