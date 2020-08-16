<?php  
	$conn = new mysqli("localhost","khan112d_pbl","mypassword","khan112d_pbl");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>