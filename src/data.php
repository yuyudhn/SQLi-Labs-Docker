<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evangelion</title>
    <style>
html {
    margin:    0 auto;
    max-width: 900px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
footer { 
	text-align: center; 
}
</style>
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once "db.php";
function table_user_lists($id, $name, $unit) {
        echo "<tr><td><a href='/data.php?id=$id'>$name</a></td><td>$unit</td></tr>";
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT Name, Age, Rank FROM Users WHERE id='" . $id . "'";
        $result = mysqli_query($conn, $sql);
        echo "<center><h1>Driver Data</h1></center>";
        echo "SQL Query: " . htmlspecialchars($sql) . "<br><br>";
        if (!$result) {
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
        echo "<center><h1>EVA Driver</h1></center>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Unit</th></tr>";
	table_user_lists(1, 'Rei Ayanami', 'EVA-00');
        table_user_lists(2, 'Asuka Soryu', 'EVA-02');
        table_user_lists(3, 'Ikari Shinji', 'EVA-01');
        echo "</table>";    }

    mysqli_close($conn);
    ?>
<footer>
        <p>Evangelion @ 1995</p>
</footer>
</html>