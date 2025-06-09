<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilot Database</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div class="page-wrapper">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        require_once "db.php";
        
        function table_user_lists($id, $name, $unit) {
            echo "<div class='pilot-card'>";
            echo "  <a href='/data.php?id=$id'>";
            echo "      <p class='pilot-name'>$name</p>";
            echo "      <p class='pilot-unit'>Unit: $unit</p>";
            echo "  </a>";
            echo "</div>";
        }

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT Name, Age, Rank FROM Users WHERE id='" . $id . "'";
            $result = mysqli_query($conn, $sql);

            echo "<header><h1>Pilot Profile</h1></header>";
            echo "<div class='sql-query'>SQL Query: " . htmlspecialchars($sql) . "</div>";
            
            if (!$result) {
                echo($conn->error);
            }

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='profile-container'>";
                echo "<table class='profile-table'>";
                echo "<thead>";
                echo "<tr><th>Name</th><th>Age</th><th>Rank</th></tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row["Name"]."</td>";
                    echo "<td>".$row["Age"]."</td>";
                    echo "<td>".$row["Rank"]."</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p style='text-align:center;'>No profile data found.</p>";
            }
        } else {
            echo "<header><h1>Evangelion Pilots</h1></header>";
            echo "<div class='pilot-grid'>";
            $sql = "SELECT id, Name, Unit FROM Users";
            $result = mysqli_query($conn, $sql);
        
            if ($result) {
                while($row = mysqli_fetch_assoc($result)) {
                    table_user_lists($row['id'], $row['Name'], $row['Unit']);
                }
            } else {
                echo "<p>No pilots found.</p>";
            }
            echo "</div>";
        }

        mysqli_close($conn);
        ?>
        <footer>
            <p>&copy; 2024 LinuxSec</p>
        </footer>
    </div>
</body>
</html>
