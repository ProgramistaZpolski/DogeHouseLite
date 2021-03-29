<?php

namespace App\Core\Forms;

class Email
{
	public static function validate(String $setting, String $value)
	{
		if (str_contains($setting, "email") !== FALSE) {
			if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
				return false;
			} else {
				return true;
			}
		}
	}
}
