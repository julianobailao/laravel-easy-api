<?php

namespace JulianoBailao\LaravelEasyApi;

use Illuminate\Http\Request;

trait IndexTrait
{
    /**
     * Configure the query filters.
     *
     * @param string $searchTerm
     *
     * @return mixed
     */
    protected function filter($query, $searchTerm)
    {
        if ($searchTerm != null) {
            $query->where(function ($query) use ($query, $searchTerm) {
                foreach ($this->getColumns() as $field) {
                    $query->orWhere($field, '=', $searchTerm);
                    $query->orWhere($field, 'like', '%'.$searchTerm.'%');
                }
            });
        }

        return $query;
    }

    /**
     * Override it to transform the index query.
     *
     * @param Model   $query
     * @param Request $request
     *
     * @return Paginator
     */
    protected function transformIndexQuery($query, Request $request)
    {
        return $this->indexQuery($query, $request);
    }

    /**
     * Make the index query.
     *
     * @param Model   $query
     * @param Request $request
     *
     * @return Paginator
     */
    protected function indexQuery($query, Request $request)
    {
        $selectFields = method_exists($this, 'selectFields') ? $this->selectFields() : '*';
        $query = $query->select($selectFields);
        $query = $this->filter($query, $request->get('filter'));

        $data = $query->paginate($request->get('per_page') ?: 100);
        return $data;
    }

    /**
     * Overide it to transform the index response.
     *
     * @param array $data
     *
     * @return array
     */
    protected function transformIndexResponse(array $data)
    {
        return $this->indexResponse($data);
    }

    /**
     * The index response.
     *
     * @param array $data
     *
     * @return array
     */
    protected function indexResponse(array $data)
    {
        $response = [];
        $items = $data['data'];
        unset($data['data']);
        $response['metadata'] = $data;
        $response['items'] = $items;

        return $response;
    }

    /**
     * The index method from resource controller.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $query = $this->transformIndexQuery($this->getModel(), $request);
        $data = $this->transformIndexResponse($query->toArray());

        return response()->json($data);
    }
}
