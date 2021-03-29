<?php

namespace App\Controllers;

use App\Core\App;
use Sure\TestRunner;

class TestingController
{
	public function master()
	{
		if (App::get("config")["production"]) {
			\Ignite(401);
		}
		$test = new TestRunner();
		$test->url(App::get("config")["site"]["url"], 200);
		$test->url(App::get("config")["site"]["url"] . "home", 200);
		$test->url(App::get("config")["site"]["url"] . "scheduled", 200);
		$test->url(App::get("config")["site"]["url"] . "stats", 200);
		$test->url(App::get("config")["site"]["url"] . "bots", 200);
		$test->url(App::get("config")["site"]["url"] . "botfasdfjsdhafkj", 404);
		return $test->test();
	}
}