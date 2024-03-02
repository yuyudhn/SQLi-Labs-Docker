<?php
require_once "../db.php"; 
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: auth.php");
    exit();
}
$email = $_SESSION['email'];
$sql = "SELECT Name FROM Users WHERE Email = '$email'";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['Name'];
    echo "<h1>Welcome to the Dashboard</h1>";
    echo "You are: $name";
} else {
    echo "<h1>Welcome to the Dashboard</h1>";
    echo "You are: Authenticated User";
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <br>
    <form action="logout.php" method="post">
        <button type="submit">Logout</button>
    </form>
</body>
</html>