<?php
// user_dashboard.php

session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Your user dashboard content goes here
echo "<h2>User Dashboard</h2>";
echo "<p>Welcome, {$_SESSION["username"]}!</p>";
echo "<p>Email: {$_SESSION["email"]}!</p>";

// Link to logout
echo '<p><a href="logout.php">Logout</a></p>';
?>
