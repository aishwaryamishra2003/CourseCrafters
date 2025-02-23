<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'online_learning');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Registration</title>
    <link rel="stylesheet" href="display_registration.css">
    </style>
</head>
<body>
    <h1>Submitted Registration</h1>
    <table>
        <tr>
            
            <th>Name</th>
            <th>Email</th>
            <th>Subcode</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
               /* echo "<td>" .htmlspecialchars($row['id']) . "</td>";*/
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['subcode'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No registration submitted.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>