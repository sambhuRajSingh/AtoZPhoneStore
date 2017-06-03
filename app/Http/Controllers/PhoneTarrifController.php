<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PhoneFinderService;

class PhoneTarrifController extends Controller
{
    protected $request;

    protected $phoneFinderService;

    public function __construct(Request $request, PhoneFinderService $phoneFinderService)
    {
        $this->request = $request;
        $this->phoneFinderService = $phoneFinderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($phoneName)
    {
        return View('phoneTarrifs')->with(
            'phones', 
            $this->phoneFinderService->paginatedByName($phoneName)
        );
    }
}
