<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evangelion</title>
    <link rel="stylesheet" href="/static/style.css">
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "db.php";
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT Name, Age, Rank FROM Users WHERE id='" . $id . "'";
        $result = mysqli_query($conn, $sql);
        echo "<h1>Driver Data</h1>";
        if (!$result) {
        echo "<pre> $sql </pre><br>";
    	echo($conn->error);
	}
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Name</th><th>Age</th><th>Rank</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row["Name"]."</td><td>".$row["Age"]."</td><td>".$row["Rank"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

    } else {
        echo "<h1>EVA Driver</h1>";
        echo "<ul>";
        echo "<li><a href='/index.php?id=1'>Rei Ayanami</a></li>";
        echo "<li><a href='/index.php?id=2'>Asuka Soryu</a></li>";
        echo "<li><a href='/index.php?id=3'>Ikari Shinji</a></li>";
        echo "</ul>";
        echo "<h2>References:</h2>";
        echo "<ul><li><a href='https://www.linuxsec.org/2014/03/tutorial-basic-sql-injection.html'>Tutorial Basic SQL Injection Manual Lengkap</a></li></ul>";
    }

    mysqli_close($conn);
    ?>
<footer>
	<p>Evangelion @ 1995</p>
</footer>
</html>
