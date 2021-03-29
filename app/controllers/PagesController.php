<?php

namespace App\Controllers;

use App\Core\Helpers\Arr;
use App\Core\Forms\Forms;

class PagesController
{
	public function home()
	{
		return view('index');
	}
}
