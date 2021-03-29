<?php

namespace App\Core\Database;

use QueryBuilder;
use App\Core\App;

class Schema
{
    public function __construct(QueryBuilder $db) {
		$this->db = $db;
		$this->table = new Table();
	}

	public function create(String $name, $callback) {
		$dbname = App::get("config")["database"]["name"];
		return "CREATE TABLE `{$dbname}`.`{$name}` ( " . $callback($this->table) . " ) ENGINE = InnoDB;";
	}
}