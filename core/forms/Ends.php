<?php

namespace App\Core\Forms;

class EndsWith
{
	public static function validate(String $setting, String $value)
	{
		if (str_contains($setting, "ends_with:") !== FALSE) {
			$ends = explode(":", $setting)[1];
			if (str_ends_with($value, $ends)) {
				return false;
			} else {
				return true;
			}
		}
	}
}
