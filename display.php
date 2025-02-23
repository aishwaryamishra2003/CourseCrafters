<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'online_learning');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM queries";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Queries</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<body background="image.png" style="background-size: 100%;" style="background-attachment: fixed;"></body>
    <h1>Submitted Queries</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>User Query</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['User  Query'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No queries submitted.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>