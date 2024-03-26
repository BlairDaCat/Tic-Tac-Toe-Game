<?php

require_once('db.php');
$query = "select * from signup";
$result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible"content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Admin Page</title>
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5"><!--mt-5 stands for margin-->
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Players Admin Page</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>ID</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>
                            <tr> <!--Loop process for fetching the data -->
                            <?php
                            
                                while($row=mysqli_fetch_assoc($result))
                                {
                                ?>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                                
                                </tr>
                                <?php

                                }

                            ?>                         
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>