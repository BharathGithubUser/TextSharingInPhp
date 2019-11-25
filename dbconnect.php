<?php
  $BASE_URL = "http://192.168.2.56";
function dbConnectUsingProcedural() {
	$servername = "127.0.0.1";
	$username = "root";
	$password = "mysqlroot";
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
	    $connection = new PDO('mysql:host=127.0.0.1;dbname=share', 'root', 'mysqlroot',
    	 array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    	 );
	    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    return $connection;
	} catch (PDOException $e) {
		echo $e->getMessage();
    die;
	    return false;
	}
}
?>
