<?php
    $id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	
	// Database connection
	$conn = new mysqli('localhost','root','','playerstatistics');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("update signup set name=?, email=? where id=?");
		$stmt->bind_param("ssi", $name, $email, $id);
		if($stmt->execute()){
			header("Location:index.php");
		}else{
			echo 'failure';
		}
	}
?>