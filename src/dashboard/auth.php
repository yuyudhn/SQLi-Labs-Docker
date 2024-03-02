<?php
require_once "../db.php";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM Users WHERE Email='$email' AND Password='$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        session_start();
        $_SESSION['authenticated'] = true;
        $_SESSION['email'] = $email;
        header("Location: index.php");
        exit();
    } else {
        $error = $conn->error ? $conn->error : "Invalid Credentials";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body, html {
        height: 100%;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Arial, sans-serif;
    }
    .login-container {
        max-width: 800px;
        width: 90%;
        padding: 20px;
        border: 1px solid #ccc;
        margin: 0 auto;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="email"],
    input[type="password"],
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        border-radius: 3px;
        border: 1px solid #ccc;
        box-sizing: border-box; /* Ensures padding and border are included in width */
    }
    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        border: none;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
    .error-message {
        color: red;
        margin-bottom: 10px;
    }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Welcome to Login Area</h2>
        <?php if (!empty($error)) : ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
</body>
</html>