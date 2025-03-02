<?php
// Database connection details
$servername = "localhost";
$username = "root";  // Change if using a different user
$password = "12345";      // Change if you have a password
$dbname = "user_lists"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data
$sql = "SELECT id, username FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Users Table</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
    </tr>

    <?php
    // Display data in table format
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No records found</td></tr>";
    }
    ?>

</table>

</body>
</html>

<?php
// Close connection
$conn->close();
?>

