<?php

namespace App\Core\Database;

class Table
{
    public String $query;

	public function integer(String $name, Bool $isNull = false) {
		$isNull = $isNull ? "NULL" : "NOT NULL";
		$this->query .= "`{$name}` INT {$isNull} , ";
	}

	public function id(String $name = "id") {
		$this->query .= "`{$name}` INT NOT NULL AUTO_INCREMENT, ";
	}
}