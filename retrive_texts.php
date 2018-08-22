<?php
	header('Content-Type: application/json');
	header ("Access-Control-Allow-Origin: *"); 
	include_once("dbconnect.php");
	// Create connection
	$conn = dbConnectUsingPDO();
	// Check connection
	if ($conn) {
		$sql = "SELECT text FROM text_sharing ORDER BY id DESC";
		$query = $conn->prepare($sql);
		$query->execute();
		$all_texts = $query->fetchall();
		if (count($all_texts) > 0) {
			$response = array("resultCode" => "Success", "records" => $all_texts);
			echo json_encode($response);
		} else { 
			$response = array("resultCode" => "Records Unavailable", "message" => "No Records Found Currently");
			echo json_encode($response);
		}
	} else {
		$response = array("resultCode" => "Failure!", "message" => "Unable to connect to database");
		echo json_encode($response);
	}
?>