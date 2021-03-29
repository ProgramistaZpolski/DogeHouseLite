<?php

namespace App\Migrations;

class ExampleMigration
{
	/**
     * Run the migration.
     * @return String A sql query
     */

	public function up()
	{
		return file_get_contents("dogehouselite.sql");
	}

	/**
     * Reverse the migration.
     * @return String A sql query
     */

	public function down()
	{
		return "DROP TABLE `cache`";
	}
}