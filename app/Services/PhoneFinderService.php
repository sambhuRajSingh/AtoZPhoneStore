<?php

namespace App\Services;

use DB;
use App\Phone;
use App\Filters\PhoneFilters;

class PhoneFinderService
{   
    private $phone;

    private $phoneFilters;

    public function __construct(Phone $phone, PhoneFilters $phoneFilters)
    {
        $this->phone = $phone;
        $this->phoneFilters = $phoneFilters;
    }

    public function paginatedByMakeAndModel($howMany = 20)
    {
        $phones = $this->phone
                    ->select(
                        DB::raw('count(*) as total'),
                        'make',
                        'model',
                        'name'                      
                    )
                    ->groupBy('make')
                    ->groupBy('model')
                    ->groupBy('name');

        if ($this->phoneFilters->request->all()) {
            $phones = $phones->filter($this->phoneFilters);
        } else {
            //@TODO: orderByMake()
            $phones->orderBy('make', 'asc');
        }
                    
        return $phones->paginate($howMany);
    }

    public function paginatedByName($phoneName, $howMany = 20)
    {
        return $this->phone
                    ->whereName($phoneName)
                    ->paginate($howMany);
    }
}
