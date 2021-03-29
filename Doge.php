<?php

namespace ProgramistaZpolski\DogePHP;

class Doge
{
	public static function rooms(String $type)
	{
		$type = $type == "popular" ? "popularRooms" : "scheduledRooms";
		return json_decode(file_get_contents("https://api.dogehouse.xyz/v1/{$type}"));
	}

	public static function stats()
	{
		return json_decode(file_get_contents("https://api.dogehouse.xyz/v1/statistics"));
	}

	public static function bots() {
		return json_decode(file_get_contents("https://api.dogehouse.xyz/v1/bots"))->bots;
	}

	public static function info() {
		return json_decode(file_get_contents("https://api.dogehouse.xyz/v1/"));
	}
}