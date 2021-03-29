<?php

namespace App\Core;

class Request
{
	public static function uri()
	{
		return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
	}

	public static function method()
	{
		return isset($_REQUEST["pzplphp-method"]) ? $_REQUEST["pzplphp-method"] : $_SERVER['REQUEST_METHOD'];
	}
}