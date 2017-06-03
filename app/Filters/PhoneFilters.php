<?php

namespace App\Filters;

use App\Filters\QueryFilter;

class PhoneFilters extends QueryFilter
{
    public function make($order='')
    {
        return $this->builder->orderBy('make', $order);
    }

    public function model($order='')
    {
        return $this->builder->orderBy('model', $order);
    }

    public function name($order='')
    {
        return $this->builder->orderBy('name', $order);
    }
}
