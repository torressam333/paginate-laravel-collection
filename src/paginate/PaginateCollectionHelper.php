<?php

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

if (! function_exists('paginate_collection')) {
    /**
     * @param  $collection
     * @param  int  $perPage
     * @param int|null $currentPage
     * @param  array  $options
     * @return LengthAwarePaginator
     */
    function paginate_collection($collection, int $perPage = 15, $currentPage = null, array $options = []): LengthAwarePaginator
    {
        $currentPage = $currentPage ?: (Paginator::resolveCurrentPage() ?: 1);
        $collection = $collection instanceof Collection ? $collection : Collection::make($collection);

        return new LengthAwarePaginator(
            $collection->forPage($currentPage, $perPage),
            $collection->count(),
            $perPage,
            $currentPage,
            $options
        );
    }
}
