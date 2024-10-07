<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Hub - Choose Gender</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Welcome to AOA Fashion Hub</h1>
    </header>
    <div class="container">
        <h2>Select Your Gender</h2>
        <form action="measurements.php" method="post">
            <div class="form-group">
                <label>
                    <input type="radio" name="gender" value="male" required> Male
                </label>
                <label>
                    <input type="radio" name="gender" value="female" required> Female
                </label>
            </div>
            <button type="submit" class="btn">Proceed</button>
        </form>
    </div>
</body>
</html>
