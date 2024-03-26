<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','playerstatistics');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into signup(name, email) values(?, ?)");
		$stmt->bind_param("ss", $name, $email);
		if($stmt->execute()){
			echo 'success';
		}else{
			echo 'failure';
		}
	}
?>