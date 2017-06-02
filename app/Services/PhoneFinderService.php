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

    public function paginatedMakeAndModel($howMany = 20)
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
}
