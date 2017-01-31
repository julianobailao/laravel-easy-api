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
     * @param array $data
     * @param int   $id
     *
     * @return array
     */
    protected function transformShowResponse(array $data, $id)
    {
        return $this->showResponse($data, $id);
    }

    /**
     * The show response.
     *
     * @param array $data
     * @param int   $id
     *
     * @return array
     */
    public function showResponse(array $data, $id)
    {
        return $data;
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
        $data = $this->transformShowResponse($query->toArray(), $id);

        return response()->json($data);
    }
}
