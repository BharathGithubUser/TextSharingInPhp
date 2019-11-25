<?php
header('Content-Type: application/json');
header ("Access-Control-Allow-Origin: *");

include("dbconnect.php");
if(isset($_POST["textarea"]) && $_POST["textarea"] != ""){
	$textToStore = $_POST["textarea"];
	echo "<script>console.log( 'Debug Objects: " . $textToStore . "' );</script>";
	// Create connection
	$conn = dbConnectUsingProcedural();
	$textToStore = mysqli_real_escape_string($conn, $textToStore);
	// Check connection
	if (!($conn->connect_error)) {
		if (strpos($textToStore, 'http') === 0 || strpos($textToStore, 'https') === 0 ) {
			$textToStore = '<a href="'.$textToStore.'">'.$textToStore.'</a>';
			$sql = "INSERT INTO text_sharing (text)
			VALUES ('$textToStore')";
		} else {
		$sql = "INSERT INTO text_sharing (text)
		VALUES ('$textToStore')";
		}
		if ($conn->query($sql) === TRUE) {
			$response = array("resultCode" => "Success", "record_inserted" => $textToStore);
			echo json_encode($response);
		} else {
			$response = array("resultCode" => "Failure!", 
							  "message" => "Unable to store the requested data to the database"						
						);
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
