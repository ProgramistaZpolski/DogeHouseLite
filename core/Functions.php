<?php

function view($name, $data = [])
{
	extract($data);
	return require "app/views/{$name}.view.php";
}

function redirect($path)
{
	http_response_code(307);
	header("Location: /{$path}");
	die();
}

function redirectPerm($path)
{
	http_response_code(308);
	header("Location: /{$path}");
	die();
}

if (!function_exists("str_contains")) {
	function str_contains(string $haystack, string $needle): bool
	{
		return '' === $needle || false !== strpos($haystack, $needle);
	}
}

if (!function_exists("str_starts_with")) {
	function str_starts_with(string $haystack, string $needle): bool
	{
		return \strncmp($haystack, $needle, \strlen($needle)) === 0;
	}
}

if (!function_exists("str_ends_with")) {
	function str_ends_with(string $haystack, string $needle): bool
	{
		return $needle === '' || $needle === \substr($haystack, -\strlen($needle));
	}
}

function dd($data)
{
	echo "<pre style='font-size: 1.25rem; line-height: 1.5;'>";
	var_dump($data);
	echo "</pre>";
	die();
}

function dump($data)
{
	echo "<pre style='font-size: 1.25rem; line-height: 1.5;'>";
	var_dump($data);
	echo "</pre>";
}

function app_path()
{
	return __DIR__;
}

function asset(String $filename)
{
	$split = explode(".", $filename);
	if ($split[1] == "css") {
		return "/assets/css/" . $split[0] . ".css";
	} else if ($split[1] == "js") {
		return "/assets/js/" . $split[0] . ".js";
	} else if ($split[1] == "mjs") {
		return "/assets/js/" . $split[0] . ".min.js";
	} else if ($split[1] == "mcss") {
		return "/assets/css/" . $split[0] . ".min.css";
	} else {
		return "/" . "assets/" . $filename;
	}
}

function csrf()
{
	if ($_POST["pzplphp-csrf-token"] != $_SESSION["pzplphp-csrf-token"]) {
		\Ignite(401);
	}
}

function clean(String $str)
{
	return str_replace("=", "\\=", str_replace("\"", "\\\"", str_replace("'", "\\'", $str)));
}

function unclean(String $str)
{
	return str_replace("\\=", "=", str_replace("\\\"", "\"", str_replace("\\'", "'", $str)));
}