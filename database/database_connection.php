<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASSWORD", "root");
	define("DB_DATABASE", "testdb"); //TODO Change this to the correct db :)

	$conn = new PDO("mysql:host=" . DB_SERVER . ":8889;dbname=" . DB_DATABASE . "", "" . DB_USER . "", "" . DB_PASSWORD . "");
?>