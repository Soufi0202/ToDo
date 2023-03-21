<?php
include "dbconnect.php";
if ($stmt = $con->prepare('SELECT username, password FROM user WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['name']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['name'];
            echo 'Welcome ' . $_SESSION['name'] . '!';
        } else {
            // Incorrect password
            echo 'Incorrect username and/or password!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';
    }

	$stmt->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>DKHELTI
</body>
</html>