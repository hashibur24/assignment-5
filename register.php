<?php
// register_process.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Save user details to a file (you can use a database for a more robust solution)
    $userDetails = "$username,$email,$password\n";
    file_put_contents("./users.txt", $userDetails, FILE_APPEND);

    // Redirect to login page
    header("Location: login.php");
    exit();
}
?>



<!-- register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
    <h2>User Registration</h2>
    <form action="register.php" method="post">
        <label for="username">Username:</label>
        <input class="form-control" type="text" name="username" required><br>
        
        <label for="email">Email:</label>
        <input class="form-control" type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input class="form-control" type="password" name="password" required><br>

        <input class="form-control btn btn-primary" type="submit" value="Register">
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
