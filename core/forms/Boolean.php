<?php

namespace App\Core\Forms;

class BooleanB
{
	public static function validate(String $setting, String $value)
	{
		if (str_contains($setting, "boolean") !== FALSE) {
			if ($value == "true" || $value == "false" || $value == true || $value == false) {
				return false;
			} else {
				return true;
			}
		}
	}
}
