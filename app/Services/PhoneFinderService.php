<?php

namespace App\Services;

use DB;
use App\Phone;


class PhoneFinderService
{   
    public function __construct(Phone $phone)
    {
        $this->phone = $phone;
    }

    public function paginatedByMakeAndModel($howMany = 20)
    {
        return $this->phone
                    ->select(
                        DB::raw('count(*) as total'),
                        'make',
                        'model',
                        'name'                      
                    )
                    ->groupBy('make')
                    ->groupBy('model')
                    ->groupBy('name')
                    ->orderBy('make', 'asc')
                    ->paginate($howMany);
    }

    public function paginatedByName($phoneName, $howMany = 20)
    {
        return $this->phone
                    ->whereName($phoneName)
                    ->paginate($howMany);
    }
}
