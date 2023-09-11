<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

class Paginator
{
    protected $collection;
    protected $perPage;

    public function __construct($collection, $perPage)
    {
        $this->collection = $collection;
        $this->perPage = $perPage;
    }
    
    /**
     * Pagination with limit
     * @param Illuminate\Database\Eloquent\Collection
     * @param integer
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function custom_paginator()
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        if ($currentPage == 1) {
            $start = 0;
        }
        else {
            $start = ($currentPage - 1) * $this->perPage;
        }

        $currentPageCollection = $this->collection->slice($start, $this->perPage)->all();

        $paginatedTop100 = new LengthAwarePaginator($currentPageCollection, count($this->collection), $this->perPage);

        return $paginatedTop100->setPath(LengthAwarePaginator::resolveCurrentPath());
    }
}