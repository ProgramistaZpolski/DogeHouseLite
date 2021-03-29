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
		return "CREATE TABLE `beaverbook`.`users2w` ( `id` INT NOT NULL AUTO_INCREMENT COMMENT 'User ID' , `email` TEXT NOT NULL COMMENT 'Users Email' , `password` TEXT NOT NULL COMMENT 'Users Password' , `type` TEXT NOT NULL COMMENT 'User Type - for example Admin/User' , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
	}

	/**
     * Reverse the migration.
     * @return String A sql query
     */

	public function down()
	{
		return "DROP TABLE `users2w`";
	}
}