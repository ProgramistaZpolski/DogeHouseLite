<?php

namespace App\Controllers;

use ProgramistaZpolski\DogePHP\Doge;
use App\Core\App;

class PagesController
{
	public function home()
	{
		$result = App::get("database")->sql("SELECT * FROM `cache` WHERE `route` LIKE 'popular';");
		if (isset($result) && $result != []) {
			$dbDate = new \DateTime($result[0]->written_on);
			$currDate = new \DateTime();
			$interval = $currDate->diff($dbDate);
			if ($interval->i < 1) {
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
				App::get("database")->sqlNoFetch("DELETE FROM `cache` WHERE route='popular'");
				$result2 = Doge::rooms("popular");
				$result = str_replace("'", "", json_encode($result2));
				App::get("database")->sqlNoFetch("INSERT INTO `cache` (`id`, `route`, `content`, `written_on`) VALUES (NULL, 'popular', '{$result}', CURRENT_TIMESTAMP);");
				$result = $result2;
			}
		} else {
			$result2 = Doge::rooms("popular");
			$result = str_replace("'", "", json_encode($result2));
			App::get("database")->sqlNoFetch("INSERT INTO `cache` (`id`, `route`, `content`, `written_on`) VALUES (NULL, 'popular', '{$result}', CURRENT_TIMESTAMP);");
			$result = $result2;
		};
		return view("index", ["data" => $result]);
	}
}
