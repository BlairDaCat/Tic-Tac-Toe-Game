<?php
    $player1 = $_POST['player1'];
    $player2 = $_POST['player2'];

    //Database connection below
    $con = new mysqli("localhost", "root", "", "playerstatistics");
    if($con->connect_error) {
        die("Failed to connect : ".$con->connect_error);
    }else{
        $stmt = $con->prepare("select * from signup where email =?");
        $stmt->bind_param("?",)
    }

?>