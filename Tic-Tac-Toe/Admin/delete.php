<?php
require_once('db.php');
$query = "delete from signup where id =".$_GET['id'];

$result = mysqli_query($con,$query);
header("Location:index.php");
exit();

?>