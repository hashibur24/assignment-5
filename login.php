<?php
// login_process.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Load user data from the file (or database)
    $users = file("./users.txt", FILE_IGNORE_NEW_LINES);

    foreach ($users as $user) {
        list($username, $storedEmail, $storedPassword) = explode(",", $user);

        if ($email == $storedEmail && password_verify($password, $storedPassword)) {
            // Start session and set user information
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;

            // Redirect to user dashboard
            header("Location: user_dashboard.php");
            exit();
        }
    }

    // Invalid login, redirect back to login page
    header("Location: login.php");
    exit();
}
?>


<!-- login.php -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
    <h1>Login Here!</h1>
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input class="form-control" type="email" name="email" required><br>
        <label for="password">Password:</label>
        <input class="form-control" type="password" name="password" required><br>

       
        <input class="form-control btn btn-primary" type="submit" value="Login">
    </form>
    <!-- <form action="login.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <input type="submit" value="Login">
</form> -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>