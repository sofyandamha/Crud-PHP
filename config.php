<?php 

//WEB CONFIG
$WEB_CONFIG = [
	'app_name' => 'TEST CRUD PHP', 
	'base_url' => 'http://localhost/crud/'
];

//DATABASE CONFIG
$DB_CONFIG = [
	'host' => 'localhost',
	'user' => 'root',
	'passwd' => '',
	'db_name' => 'crud'
];		
$connect = mysqli_connect($DB_CONFIG['host'], $DB_CONFIG['user'], $DB_CONFIG['passwd'], $DB_CONFIG['db_name']);
