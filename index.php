<!DOCTYPE html>
<html>
<head>
	<title>Share URL</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  	<script>
  		$(document).ready(function() {
  			getAllTexts();
  			function getAllTexts() {
		        $.ajax({
		        	type: "GET",
		        	url: "http://10.10.0.155/share/retrive_texts.php",
		        	success: function(result) {
		        		if(result.resultCode == "Success") { 
		        			for(var i = 0; i < result.records.length; i++) {
			        				$('#contents').append("<p>" +result.records[i].text+ "<p>");
							}
		        		} else {
		            		$("#contents").html("<p>No Data Available Currently!</p>");
		        		}
		        	},
		        	error: function() {
	      				$('#contents').html('<p>An error has occurred</p>');
	   				},
		        });
		    }

        	$("#submit_data").click(function() {
	        	$.ajax({
		        	type: "POST",
		        	url: "http://10.10.0.155/share/storeText.php",
		        	data: $("#text_data").serialize(),
		        	success: function(result) {
		        		console.log(result.resultCode);
		        		console.log(result.record_inserted);	
						if(result.resultCode == "Success") { 
			        		$('#contents').prepend("<p>" +result.record_inserted+ "<p>");
			        	}
		        	},
		        	error: function(error) {
		        		console.log(error);
	   				},
		        });
	        });

	    });
	</script>
	<style type="text/css">
		.text_component {
			overflow-y: scroll;
			max-height: 300px;
			background-color: #f4ac04;
			border-radius: 5px;
			border: 1px solid #000;
		}
	</style>
</head>
<body style="margin: 20px">
	<h1> Enter Your Text here...!</h1><br>
	<form id = "text_data">
		<textarea name = "textarea" style = "width: 100%" required></textarea> <br>
		<button type = "submit" id = "submit_data">Share</button>
	</form>
	<h1> Text Shared Until Now...</h1><br>
	<div class="text_component">
		<div id = "contents" style="margin: 10px"></div>
	</div>
</body>
</html>