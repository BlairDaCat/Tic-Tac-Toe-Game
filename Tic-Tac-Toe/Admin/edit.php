<?php

require_once('db.php');
$query = "select * from signup where id =".$_GET['id'];
$result = mysqli_query($con,$query);

?>

<html>
     <head>
</head>
<body>

    
<?php
                            
while($row=mysqli_fetch_assoc($result))
{
?>
<form action="editplayer.php" method="post">

<h2>Edit Player</h2>

<div class="input-box">
    <span class="icon"><i class='bx bxs-user'></i></span>
    <input type="text" readonly id="id" name="id" value="<?php echo $row['id']; ?>" />
    <label >ID</label>
</div>

<div class="input-box">
    <span class="icon"><i class='bx bxs-user'></i></span>
    <input type="text" required id="name" name="name" value="<?php echo $row['name']; ?>" />
    <label >Player Name</label>
</div>
<div class="input-box">
    <span class="icon"><i class='bx bxs-envelope'></i></span>
    <input type="email" required id="email" name="email" value="<?php echo $row['email']; ?>"/>
    <label >Email</label>
</div>


<!-- INACTIVE <div class="input-box">
    <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
    <input type="password" required>
    <label>Password</label>
</div>
<div class="remember-password">
    <label for=""><input type="checkbox">I agree with this statment</label>
</div>
--> 
<button class="btn">Update</button>

</form>
<?php

}

?> 
</body>