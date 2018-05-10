<?php
$servername = "localhost";
$username = "sdw1User";
$password = "sdw1pwd";
$dbname = "sdw1DB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM Customers WHERE Country = 'Mexico'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo "<table border=2>
			<tr>
				<th colspan=3>Mexico Contacts</th>
			</tr>
			<tr>
				<td>Customer ID</td>
				<td>Customer</td>
				<td>Contact Name</td>
			</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["CustomerID"]. "</td><td>" . $row["CustomerName"]. "</td><td>" . $row["ContactName"]. "</td></tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
$conn->close();

?>