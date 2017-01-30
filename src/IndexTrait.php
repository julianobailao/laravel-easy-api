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
     * @return self
     */
    protected function filter($searchTerm)
    {
        if ($searchTerm != null) {
            $this->query->where(function ($query) use ($searchTerm) {
                foreach ($this->getColumns() as $field) {
                    $this->query->orWhere($field, '=', $searchTerm);
                    $this->query->orWhere($field, 'like', '%'.$searchTerm.'%');
                }
            });
        }

        return $this;
    }

    /**
     * Gets a json response with a model paginate pages.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $selectFields = method_exists($this, 'selectFields') ? $this->selectFields() : '*';

        $this->query = $this->getModel()->select($selectFields);
        $this->filter($request->get('filter'));

        $data = $this->query->paginate($request->get('per_page') ?: 100);

        return response()->json($data);
    }
}
