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

	public function form()
	{
		Forms::validate([
			"name" => ["required", "max:12"],
			"password" => ["required", "min:8", function ($text) {
				if (!preg_match('/[A-Z]/', $text)) {
					return false;
				} else {
					return true;
				}
			}]
		], function () {
			\Ignite(412);
		});
		return view('index');
	}

	public function api()
	{
		Forms::validate([
			"count" => ["required", "max:7", "number"]
		], function () {
			\Ignite(412);
		});
		$h = [
			"Kukanq ogląda hetaje",
			"kukanq to taki bardzo bardzo super super kasztan, co lubi anime i fapie do 420 letnich dziewczynek, ogółem niefajny człowiek",
			"Pan koza pisze śmieci w batchu",
			"Sieciaki nie lubią sieciuchów",
			"Wycinek i szkic to bloat i do tego jest podróbką narzędzie wycinanie",
			"Creper132 tworzy śmieciowe \"wirusy\""
		];
		return Arr::random($h, $_GET["count"]);
	}
}
