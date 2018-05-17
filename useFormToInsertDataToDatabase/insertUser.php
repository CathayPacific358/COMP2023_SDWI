<?php
$servername = "localhost";
$username = "m730026119";
$password = "abc123xyz";
$dbname = "m730026119";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

	$username=$_POST["un"];
	$password=$_POST["pw"];
$sql = "INSERT INTO user (username, userpwd)
		VALUES ('$username', '$password');";
		echo $username . $password;
$result = $conn->query($sql);

?>