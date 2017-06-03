<?php

namespace App;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /**
     * Apply the filter on provided query.
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  QueryFilter $filters
     * @return
     */
    public function scopeFilter($query, QueryFilter $filters, $customRequest = null)
    {
        if (!is_null($customRequest)) {
            $filters->customRequest($customRequest);
        }

        return $filters->apply($query);
    }
}
