<html>
<head>
<style>
    table{
        border-collapse: collapse;
        font-family: "Calibri Light";
    }
    </style>
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "customerdata";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM usertable";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo "<table border=2>
			<tr>
				<th colspan=5>User Info.</th>
			</tr>
			<tr>
			    <td>Family Name</td>
				<td>ID_Number</td>
				<td>Age</td>
			    <td>Gender</td>
			    <td>Creditscore</td>
			</tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["familyname"]. "</td>
                <td>" . $row["id_number"]. "</td>
                <td>" . $row["age"]. "</td>
                <td>" . $row["gender"] . "</td>
                <td>" . $row["creditscore"] . "</td>
                </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
</body>

</html>
