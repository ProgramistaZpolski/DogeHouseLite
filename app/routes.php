<?php

$router->get("", "PagesController@home");
//$router->post("users", "UsersController@store"); for POSTs

// Tests
$router->get("testsure", "TestingController@master");