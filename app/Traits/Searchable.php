<?php

namespace App\Traits;

trait Searchable
{
    /**
     * Scope a query to search based on given columns.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $searchTerm
     * @param array $searchColumns
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $searchTerm, $searchColumns)
    {
        return $query->where(function ($query) use ($searchTerm, $searchColumns) {
            foreach ($searchColumns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $searchTerm . '%');
            }
        });
    }
}
