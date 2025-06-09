<?php
require_once "../db.php"; 
session_start();
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header("Location: auth.php");
    exit();
}

$email = $_SESSION['email'];
$sql = "SELECT Name, Bio, Img FROM Users WHERE Email = '$email'";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['Name'];
    $bio = $row['Bio'];
    $img = $row['Img'];
} else {
    $name = "Authenticated User";
    $bio = "No bio available.";
    $img = "default.png";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="page-wrapper">
        <header>
            <h1>NERV Dashboard</h1>
        </header>

        <div class="dashboard-container">
            <p class="welcome-message">Access Granted. Welcome, **<?php echo htmlspecialchars($name); ?>**.</p>
            
            <table class="profile-table">
                <tr>
                    <th>Image</th>
                    <td><img src="<?php echo htmlspecialchars($img); ?>" alt="Profile Image" class="profile-image"></td>
                </tr>
                <tr>
                    <th>Bio</th>
                    <td><?php echo nl2br(htmlspecialchars($bio)); ?></td>
                </tr>
            </table>

            <div class="logout-form">
                <form action="logout.php" method="post">
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            </div>
        </div>

        <footer>
            <p>&copy; 2024 LinuxSec</p>
        </footer>
    </div>
</body>
</html>