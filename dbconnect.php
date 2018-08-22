<?php
function dbConnectUsingProcedural() { 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$databasename = "share";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $databasename);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} else {
		return $conn;
	} 
}
function dbConnectUsingPDO() {
	try {
	    $connection = new PDO('mysql:host=localhost;dbname=share', 'root', '', 
    	 array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    	 );
	    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    return $connection;
	} catch (PDOException $e) {
		echo $e->getMessage();
	    return false;
	}
}
?>