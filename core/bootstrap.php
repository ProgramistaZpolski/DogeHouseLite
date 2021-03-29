<?php

use App\Core\App;

require_once "Functions.php";

App::bind('config', require 'config.php');

App::bind('database', new QueryBuilder(
	Connection::make(App::get('config')['database'])
));

function exception_error_handler($errno, $errstr, $errfile, $errline)
{
	throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
}
set_error_handler("exception_error_handler");

session_start();

if (!isset($_SESSION["pzplphp-csrf-token"])) {
	$_SESSION["pzplphp-csrf-token"] = bin2hex(random_bytes(32));
}