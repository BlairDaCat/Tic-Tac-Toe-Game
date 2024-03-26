<?php

// Database connection

$host = 'localhost';

$db   = 'playerstatistics';

$user = 'root';

$pass = '';


try {
     $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch users from the database

    $stmt = $dbh->prepare("SELECT * FROM signup");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Build the user list HTML

    $userListHTML = "<select name='users' id='users'>";
    $userListHTML .= "<option value='[Select Player]'>[Select Player]</option>";

    foreach ($users as $user) {

        $userListHTML .= "<option value='{$user['name']} - {$user['email']}'>{$user['name']} - {$user['email']}</option>";

    }

    // Send the HTML back to the AJAX request

    echo $userListHTML;

} catch (PDOException $e) {

    echo "Error: " . $e->getMessage();

}

?>