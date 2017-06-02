<?php

namespace App\Services;

use App\Phone;

class PhoneFinderService
{	
	public function __construct(Phone $phone)
	{
		$this->phone = $phone;
	}

	public function allPhones()
	{
		return $this->phone->all();
		return $this->phone
					->orderBy('make', 'asc')
					->paginate(10);
	}
}