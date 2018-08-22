<?php
header('Content-Type: application/json');
header ("Access-Control-Allow-Origin: *"); 

include("dbconnect.php");
if(isset($_POST["textarea"]) && $_POST["textarea"] != ""){ 
	$textToStore = $_POST["textarea"];
	// Create connection
	$conn = dbConnectUsingProcedural();
	// Check connection
	if (!($conn->connect_error)) {
		$sql = "INSERT INTO text_sharing (text)
		VALUES ('$textToStore')";

		if ($conn->query($sql) === TRUE) {
			$response = array("resultCode" => "Success", "record_inserted" => $textToStore);
			echo json_encode($response);		
		} else {
			$response = array("resultCode" => "Failure!", "message" => "Unable to connect to database");
			echo json_encode($response);		}
	} else { 
		$response = array("resultCode" => "Failure!", "message" => "Unable to connect to database");
		echo json_encode($response);	
	}
	$conn->close();
} else {
	$response = array("resultCode" => "Failure!", "message" => "empty_data");
		echo json_encode($response);
}
?>