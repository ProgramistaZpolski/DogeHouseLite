<?php

namespace App\Controllers;

use ProgramistaZpolski\DogePHP\Doge;

class PagesController
{
	public function home()
	{
		return view("index", ["data" => Doge::rooms("popular")]);
	}
}
