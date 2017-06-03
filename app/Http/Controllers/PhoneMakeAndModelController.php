<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PhoneFinderService;

class PhoneMakeAndModelController extends Controller
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
    public function index()
    {
        $phones = $this->phoneFinderService->paginatedByMakeAndModel();
        
        $make = $this->request->input('make', '');
        $model = $this->request->input('model', '');
        $name = $this->request->input('name', '');

        return View('home', compact('phones', 'make', 'model', 'name'));
    }   
}
