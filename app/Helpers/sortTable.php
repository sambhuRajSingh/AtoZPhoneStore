<?php

if (! function_exists('sort_phones_by')) {
    function sort_phones_by($column, $columnLabel)
    {
        $sortDirection = (Request::input($column) == 'asc') ? 'desc' : 'asc';        

        return link_to_action(
            '\App\Http\Controllers\PhoneMakeAndModelController@index', 
            $columnLabel,
            [
                $column => $sortDirection
            ]
        );
    }
}