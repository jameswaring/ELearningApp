<?php
function OpenCon(){
	//pass the database details to variables
	$host = "localhost";
	$dbuser = "jw17acs";
	$dbpass = "tcQ8Dz3B";
	$dbname = "dbjw17acs";
	// combine host and db name in to single variable
	$dbhost = "mysql:host=$host;dbname=$dbname";
	//create PDO from database information
	$dbconn = new PDO($dbhost, $dbuser, $dbpass);
	return $dbconn;
}
?>