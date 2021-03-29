<?php

namespace App\Core\Forms;

class NumberN
{
	public static function validate(String $setting, String $value)
	{
		if (str_contains($setting, "number") !== FALSE) {
			if (is_numeric($value)) {
				return false;
			} else {
				return true;
			}
		}
	}
}
