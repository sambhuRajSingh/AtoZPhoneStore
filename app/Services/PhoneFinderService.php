<?php

namespace App\Services;

use DB;
use Config;
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

    public function paginatedByMakeAndModel()
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
            $phones->orderBy('make', 'asc');
        }        
                    
        return $phones->paginate(Config::get('sorting.phone-make-model.displayPerPage'));
    }

    public function paginatedByName($phoneName)
    {
        return $this->phone
                    ->whereName($phoneName)
                    ->paginate(Config::get('sorting.phone-tarrif.displayPerPage'));
    }
}
