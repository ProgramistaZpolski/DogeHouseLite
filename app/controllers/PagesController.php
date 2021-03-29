<?php

namespace App\Controllers;

use ProgramistaZpolski\DogePHP\Doge;
use App\Core\App;

class PagesController
{
	protected function fetcher(String $route, $whattofetch, Int $cacheTime) {
		$result = App::get("database")->sql("SELECT * FROM `cache` WHERE `route` LIKE '{$route}';");
		if (isset($result) && $result != []) {
			$dbDate = new \DateTime($result[0]->written_on);
			$currDate = new \DateTime();
			$interval = $currDate->diff($dbDate);
			if ($interval->i < $cacheTime) {
				$result = json_decode(
					str_replace(
						"\n",
						"\\n",
						utf8_encode(
							stripslashes(
								preg_replace("/(\"[a-zA-Z]*\"):\"(\"[a-zA-Z])([a-z ]*)\"/i", "$1:\"$3", $result[0]->content)
							)
						)
					)
				);
			} else {
				App::get("database")->sqlNoFetch("DELETE FROM `cache` WHERE route='{$route}'");
				$result2 = $whattofetch();
				$result = str_replace("'", "", json_encode($result2));
				App::get("database")->sqlNoFetch("INSERT INTO `cache` (`id`, `route`, `content`, `written_on`) VALUES (NULL, '{$route}', '{$result}', CURRENT_TIMESTAMP);");
				$result = $result2;
			}
		} else {
			$result2 = $whattofetch();
			$result = str_replace("'", "", json_encode($result2));
			App::get("database")->sqlNoFetch("INSERT INTO `cache` (`id`, `route`, `content`, `written_on`) VALUES (NULL, '{$route}', '{$result}', CURRENT_TIMESTAMP);");
			$result = $result2;
		};
		return $result;
	}

	public function home()
	{
		$result = $this->fetcher("popular", function () {
			return Doge::rooms("popular");
		}, 1);
		return view("index", ["data" => $result]);
	}

	public function scheduledRooms()
	{
		$result = $this->fetcher("schedule", function () {
			return Doge::rooms("scheduled");
		}, 5);
		return view("scheduled", ["data" => $result]);
	}

	public function statistics()
	{
		$result = $this->fetcher("stats", function () {
			return Doge::stats();
		}, 5);
		return view("stats", ["data" => $result]);
	}

	public function bots()
	{
		$result = Doge::bots();
		return view("bots", ["data" => $result]);
	}
}
