<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

abstract class QueryFilter
{
    /**
     * Instance of the http request.
     *
     * @var Illuminate\Http\Request
     */
    public $request;

    /**
     * Instance of the query builder class.
     * 
     * @var Illuminate\Database\Eloquent\Builder
     */
    public $builder;    

    /**
     * QueryFilter constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Use Custom Request Class.
     * 
     * @param Request $customRequest
     */
    public function customRequest($customRequest)
    {
        $this->request = $customRequest;

        return $this;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        //['make' => 'desc', 'model' => 'asc']
        foreach($this->filters() as $name => $value) {
            //check if method model exist on the class for e.g., $phoneFilters
            if (method_exists($this, $name)) {        
                /**
                 * For e.g. calls the method name  ($phoneFilters->model)
                 * and pass the value as parameter into the method.
                 *
                 * $phoneFilters->model('desc');
                 *
                 * On $this object called the method $name, and then send the $value
                 * as a parementer into the method $name. Array filter is getting
                 * rid of any falsy value including empty string.
                 *
                 * If empty we don't want to call it.
                 */
                if (!empty($value)) { 
                    call_user_func_array([$this, $name], array_filter([$value]));
                }
            }
        }

        return $this->builder;
    }

    public function filters()
    {
        return $this->request->all();
    }
}
