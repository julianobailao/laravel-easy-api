<?php

namespace JulianoBailao\LaravelEasyApi;

trait DestroyTrait
{
    /**
     * Override it to transform the destroy query.
     *
     * @param Model $query
     * @param int   $id
     *
     * @return mixed
     */
    protected function transformDestroyQuery($query, $id)
    {
        return $this->destroyQuery($query, $id);
    }

    /**
     * Make the destroy query.
     *
     * @param Model $query
     * @param int   $id
     *
     * @return bool
     */
    protected function destroyQuery($query, $id)
    {
        $query = $this->getModel()->findOrFail($id);

        return $query->delete();
    }

    /**
     * Override it to transform the destroy response.
     *
     * @param bool $query
     *
     * @return array
     */
    protected function transformDestroyResponse($response)
    {
        return $this->destroyResponse($response);
    }

    /**
     * The destroy response.
     *
     * @param bool $response
     *
     * @return array
     */
    public function destroyResponse($response)
    {
        return [
            'deleted' => $response,
        ];
    }

    /**
     * The resource controller destroy method.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        $deleted = $this->transformDestroyQuery($this->query, $id);
        $response = $this->transformDestroyResponse($deleted);

        return response()->json($response);
    }
}
