<?php

$router->get("", "PagesController@home");
$router->get("home", "PagesController@home");
$router->get("scheduled", "PagesController@scheduledRooms");
$router->get("stats", "PagesController@statistics");
$router->get("bots", "PagesController@bots");
//$router->post("users", "UsersController@store"); for POSTs

// Tests
$router->get("testsure", "TestingController@master");