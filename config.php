<?php
session_start();

/************	You can edit details starting from here ************/
$dbhost = 'localhost';		// Write your MySQL host here.
$dbuser = 'root';	// Write your MySQL User here.
$dbpass = 'vertrigo';	// Write your MySQL Password here.
$dbname = 'test_inv';		// Write the MySQL Database where you want to install Invento


/************ DON'T EDIT NOTHING BELOW ************/




if(!isset($noredir) && $dbhost == 'localhost' && $dbuser == 'MYSQL USERNAME' && $dbpass == 'MYSQL PASSWORD')
	header('Location:install.php');
if(!isset($noredir)) {
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if($mysqli->connect_errno)
		die('<h2>Se ha producido un error al intentar conectarse a su base de datos MySQL. Error: ' . $mysql->connect_errno.'<h2>');

	// Check existance of random table to test installed system
	$tables = array('users','categories','items','logs','settings');
	$rn = rand(0,4);
	$res = $mysqli->query("SHOW TABLES LIKE '%invento_{$tables[$rn]}%'");
	if($res->num_rows == 0)
		header('Location:install.php');
}
