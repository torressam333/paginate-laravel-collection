<?php

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

if (! function_exists('paginate_collection')) {
    /**
     * @param  $collection
     * @param  int  $perPage
     * @param  null  $page
     * @param  array  $options
     * @return LengthAwarePaginator
     */
    function paginate_collection($collection, int $perPage = 15, $page = null, array $options = []): LengthAwarePaginator
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $collection = $collection instanceof Collection ? $collection : Collection::make($collection);

        return new LengthAwarePaginator($collection->forPage($page, $perPage), $collection->count(), $perPage, $page, $options);
    }
}
