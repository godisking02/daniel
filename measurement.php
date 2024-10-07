<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure user information is available
if (!isset($_SESSION['name']) || !isset($_SESSION['email'])) {
    header("Location: user-info.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save gender from the form
    $_SESSION['gender'] = htmlspecialchars($_POST['gender']);

    // Collect measurements based on gender
    if ($_SESSION['gender'] === 'male') {
        $_SESSION['neck'] = htmlspecialchars($_POST['neck']);
        $_SESSION['shoulder'] = htmlspecialchars($_POST['shoulder']);
        $_SESSION['chest'] = htmlspecialchars($_POST['chest']);
        $_SESSION['waist'] = htmlspecialchars($_POST['waist']);
        $_SESSION['hip'] = htmlspecialchars($_POST['hip']);
        $_SESSION['sleeve'] = htmlspecialchars($_POST['sleeve']);
        $_SESSION['shirt_length'] = htmlspecialchars($_POST['shirt_length']);
        $_SESSION['trouser_waist'] = htmlspecialchars($_POST['trouser_waist']);
        $_SESSION['trouser_hip'] = htmlspecialchars($_POST['trouser_hip']);
        $_SESSION['inseam'] = htmlspecialchars($_POST['inseam']);
    } else {
        $_SESSION['bust'] = htmlspecialchars($_POST['bust']);
        $_SESSION['waist'] = htmlspecialchars($_POST['waist']);
        $_SESSION['hip'] = htmlspecialchars($_POST['hip']);
        $_SESSION['shoulder'] = htmlspecialchars($_POST['shoulder']);
        $_SESSION['sleeve'] = htmlspecialchars($_POST['sleeve']);
        $_SESSION['dress_length'] = htmlspecialchars($_POST['dress_length']);
    }

    // Redirect to the style preferences page
    header("Location: style-preference.php"); // Adjusted to redirect to the correct page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sections/users.css">
    <title>Measurements</title>
</head>
<body>
    <header>
        <h1>AOA Fashion Hub</h1>
    </header>
    <div class="container">
        <h2>Enter Your Measurements</h2>
        <form method="post" action="result.php">
        <div class="form-group">
                <label for="gender">Gender:</label>

                <select id="gender" name="gender" required onchange="showMeasurements(this.value)">
                    <br />
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <fieldset id="male-measurements" style="display: block;">
                <legend>Male Measurements</legend>
                <!-- Use 'for' attributes in labels -->
                <label for="neck">Neck Circumference (inches):</label>
                <input type="number" name="neck" id="neck" required min="0">

                <label for="shoulder">Shoulder Width (inches):</label>
                <input type="number" name="shoulder" id="shoulder" required min="0">

                <label for="chest">Chest Circumference (inches):</label>
                <input type="number" name="chest" id="chest" required min="0">

                <label for="waist">Waist Circumference (inches):</label>
                <input type="number" name="waist" id="waist" required min="0">

                <label for="hip">Hip Circumference (inches):</label>
                <input type="number" name="hip" id="hip" required min="0">

                <label for="sleeve">Sleeve Length (inches):</label>
                <input type="number" name="sleeve" id="sleeve" required min="0">

                <label for="shirt_length">Shirt Length (inches):</label>
                <input type="number" name="shirt_length" id="shirt_length" required min="0">

                <label for="trouser_waist">Trouser Waist (inches):</label>
                <input type="number" name="trouser_waist" id="trouser_waist" required min="0">

                <label for="trouser_hip">Trouser Hip (inches):</label>
                <input type="number" name="trouser_hip" id="trouser_hip" required min="0">

                <label for="inseam">Inseam (inches):</label>
                <input type="number" name="inseam" id="inseam" required min="0">
            </fieldset>

            <fieldset id="female-measurements" style="display: none;">
                <legend>Female Measurements</legend>
                <label for="bust">Bust Circumference (inches):</label>
                <input type="number" name="bust" id="bust" required min="0">

                <label for="waist">Waist Circumference (inches):</label>
                <input type="number" name="waist" id="waist" required min="0">

                <label for="hip">Hip Circumference (inches):</label>
                <input type="number" name="hip" id="hip" required min="0">

                <label for="shoulder">Shoulder Width (inches):</label>
                <input type="number" name="shoulder" id="shoulder" required min="0">

                <label for="sleeve">Sleeve Length (inches):</label>
                <input type="number" name="sleeve" id="sleeve" required min="0">

                <label for="dress_length">Dress Length (inches):</label>
                <input type="number" name="dress_length" id="dress_length" required min="0">
            </fieldset>

            <button type="submit" class="btn">Submit Measurements</button>
        </form>
    </div>

    <script>
        function showMeasurements(gender) {
            const maleMeasurements = document.getElementById("male-measurements");
            const femaleMeasurements = document.getElementById("female-measurements");

            if (gender === "male") {
                maleMeasurements.style.display = "block";
                femaleMeasurements.style.display = "none";
            } else {
                maleMeasurements.style.display = "none";
                femaleMeasurements.style.display = "block";
            }
        }
    </script>
</body>
</html>
