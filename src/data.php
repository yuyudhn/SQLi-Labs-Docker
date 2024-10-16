<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evangelion</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #e63946;
            font-size: 2.5em;
        }

        table {
            max-width: 900px; /* Match the dashboard width */
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin: 0 auto; /* Center the table */
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #e63946;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        tr:hover {
            background-color: #f9c74f;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #555;
        }

        a {
            text-decoration: none;
            color: #0077b6;
        }

        a:hover {
            text-decoration: underline;
        }

        .sql-query {
            max-width: 900px; /* Match the dashboard width */
            margin: 20px auto; /* Center the SQL query output */
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-family: monospace; /* Use monospace font for SQL */
            color: #333;
            overflow-x: auto; /* Allow horizontal scrolling for long queries */
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2em;
            }
            td, th {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
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
        echo "<header><h1>Pilot Profile</h1></header>";
        echo "<div class='sql-query'>SQL Query: " . htmlspecialchars($sql) . "</div><br>";
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
        echo "<header><h1>Evangelion Pilots</h1></header>";
        echo "<table>";
        echo "<tr><th>Name</th><th>Unit</th></tr>";
        $sql = "SELECT id, Name, Unit FROM Users";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            while($row = mysqli_fetch_assoc($result)) {
                table_user_lists($row['id'], $row['Name'], $row['Unit']);
            }
        } else {
            echo "<tr><td colspan='2'>No drivers found.</td></tr>";
        }
    
        echo "</table>";
    }

    mysqli_close($conn);
    ?>
    <footer>
        <p>EVANGELION @ 1995</p>
    </footer>
</body>
</html>
