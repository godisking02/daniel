<?php
session_start();

// Ensure user information is available
if (!isset($_SESSION['name']) || !isset($_SESSION['email']) || !isset($_SESSION['gender'])) {
    header("Location: measurement.php");
    exit();
}

// Get the gender from the session
$gender = $_SESSION['gender'];

// Check if measurements are available
if ($gender === 'male') {
    if (!isset($_POST['shirt-size']) || !isset($_POST['trouser-size'])) {
        header("Location: gender.php");
        exit();
    }
    // Collect measurements
    $shirt_size = $_POST['shirt-size'] ?? 'N/A';
    $trouser_size = $_POST['trouser-size'] ?? 'N/A';
    // Save measurements to the session
    $_SESSION['shirt-size'] = $shirt_size;
    $_SESSION['trouser-size'] = $trouser_size;
} else {
    if (!isset($_POST['dress-size'])) {
        header("Location: gender.php");
        exit();
    }
    // Collect measurements
    $dress_size = $_POST['dress-size'] ?? 'N/A';
    // Save measurements to the session
    $_SESSION['dress-size'] = $dress_size;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Style Preferences</title>
</head>
<body>
    <header>
        <h1>AOA Fashion Hub</h1>
    </header>
    <div class="container">
        <h2>Select Your Style Preferences</h2>
        <form method="post" action="result.php">
            <div class="form-group">
                <label for="style">Preferred Style:</label>
                <select id="style" name="style" required>
                    <option value="casual">Casual</option>
                    <option value="formal">Formal</option>
                    <option value="sporty">Sporty</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fabric">Preferred Fabric:</label>
                <select id="fabric" name="fabric" required>
                    <option value="cotton">Cotton</option>
                    <option value="silk">Silk</option>
                    <option value="denim">Denim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="color">Preferred Color:</label>
                <input type="color" id="color" name="color" required>
            </div>
            <button type="submit" class="btn">Next</button>
        </form>
    </div>
</body>
</html>
