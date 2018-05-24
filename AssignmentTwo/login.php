<html>

<head>
    <style>
        .loginform{
            padding:100px 30%;
            font-family: "Calibri Light";
        }
        .error{
            color:red;
        }
        table{
            font-family: "Calibri Light";
            border-collapse: collapse;
            padding: 100px 32%;
        }
    </style>
</head>

<body>
<?php
$unErr = $pwErr = "";
$un = $pw = $uninp = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {


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

    $uninp = $_POST["un"];
    $pwinp = $_POST["pw"];
    $sql = "SELECT firstname, familyname, age, creditscore FROM usertable WHERE username = '$uninp' AND password = '$pwinp'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
        // output data of each row
        $tableoupt = 
			"<table border=1>
			<tr>
				<th>Name</th>
				<td>" . $row["firstname"] . " " . $row["familyname"] . "</td>
			</tr>
			<tr>
				<th>Age</th>
				<td>" . $row["age"] . "</td>
			</tr>
			<tr>
			    <th>Credit Score</th>
			    <td>" . $row["creditscore"] . "</td>
            </tr></table>";
    }
    else {
        $unErr = "User not found or password incorrect <br/><a href='./registration.php'>Register?</a> or <a href='#'>Forgot Password?</a>";
    }
    $conn->close();

}
?>

<div class="loginform">
    <h1>Login</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">
Username:<br/>
<input type="text" name="un" value="<?php echo $un?>"/>
    <span class="error">* <?php echo $unErr?></span><br/><br/>

Password:<br/>
<input type="password" name="pw" value="<?php echo $pw?>"/>
    <span class="error">* <?php echo $pwErr?></span><br/><br/>

<input type="submit" value="Login" name="login"/><br/><br/>

<a href="./registration.php">Do not have an account?</a>
<span><?php echo $tableoupt?></span>
</form>
</div>
</body>
</html>
