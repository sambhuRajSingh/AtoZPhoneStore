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
        $howMany = $this->request->input('how_many', 20);
        $phones = $this->phoneFinderService->paginatedByMakeAndModel($howMany);
        return View('home', compact('phones', 'howMany'));
    }   
}
