<?php

if (! function_exists('sort_phones_by')) {
    function sort_phones_by($column, $columnLabel)
    {
        $sortDirection = (Request::input('sortDirection') == 'desc') ? 'asc' : 'desc';
        $howMany = Request::input('howMany', 20);        
        $page = Request::input('page', 1);

        return link_to_action(
            '\App\Http\Controllers\PhoneMakeAndModelController@index', $columnLabel,
            [
                'howMany' => $howMany,
                $column => $sortDirection,
                'sortDirection' => $sortDirection,
                'page' => $page
            ]
        );
    }
}