<?php
    include(__DIR__ . '/../Db/Connection.php');
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Simulator</title>
    <link rel="stylesheet" href="/Assets/css/style.css"> 
</head>
<body>
    <table class="table-p">
        <tr>
            <th colspan='4'>
                <h2>Current First Team</h2>
            </th>
        </tr>
        <tr>
            <th>POSITION</th>
            <th>NAME</th>
            <th>JERSEY NUMBER</th>
            <th>VALUE</th>
        </tr>
        <?php
            try {
                // Query to fetch players from the database
                $stmt = $connection->query("SELECT position, name, jersey, value FROM Players");
                
                // Loop through each row and populate the table
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>{$row['position']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['jersey']}</td>";
                    echo "<td>{$row['value']}</td>";
                    echo "</tr>";
                }
            } catch (PDOException $err) {
                echo "<tr><td colspan='4'>Failed to load data: " . $err->getMessage() . "</td></tr>";
            }
        ?>
    </table>
</body>