<?php

namespace App;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    /**
     * Get the Tarrif Data as GB or MB.
     *
     * @param  string $value
     * @return string
     */
    public function getTarDataAttribute($tarData)
    {
        if ($tarData >= 1024) {
            return $tarData / 1024 . ' GB';
        }

        return $tarData . ' MB';
    }

    /**
     * Apply the filter on provided query.
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  QueryFilter $filters
     * @return
     */
    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }
}
