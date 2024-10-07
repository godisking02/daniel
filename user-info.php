<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $_SESSION['name'] = htmlspecialchars(trim($_POST['name'] ?? 'N/A'));
    $_SESSION['email'] = htmlspecialchars(trim($_POST['email'] ?? 'N/A'));
    $_SESSION['phone'] = htmlspecialchars(trim($_POST['phone'] ?? 'N/A'));

    // Redirect to gender selection page
    header("Location: measurement.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sections/users.css">
    <title>User Information</title>
</head>
<body>
    <header>
        <h1>AOA Fashion Hub</h1>
    </header>
    <div class="container">
        <h2>Enter Your Information</h2>
        <form method="post" action="user-info.php"> 
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required> <!-- Changed type to tel for better input handling -->
            </div>
            <button type="submit" class="btn">Next</button>
        </form>
    </div>
</body>
</html>
