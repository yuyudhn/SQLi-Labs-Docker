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
    <style>
        body, html {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            color: #e63946;
        }
        .dashboard-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #e63946;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f1f1f1;
        }
        img {
            max-width: 150px;
            border-radius: 8px;
        }
        .logout-button {
            margin-top: 20px;
            background-color: #e63946;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        .logout-button:hover {
            background-color: #d62839;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome to the Dashboard</h1>
        <p>You are: <?php echo $name; ?></p>
        
        <table>
            <tr>
                <th>Image</th>
                <th>Profile Data</th>
            </tr>
            <tr>
                <td><img src="<?php echo htmlspecialchars($img); ?>" alt="Profile Image"></td>
                <td><?php echo htmlspecialchars($bio); ?></td>
            </tr>
        </table>

        <form action="logout.php" method="post">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
</body>
</html>
