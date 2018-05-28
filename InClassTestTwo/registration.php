<?php

//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "test";
$servername = "localhost";
$username = "m730026119";
$password = "abc123xyz";
$dbname = "m730026119";
$myList = ""; // Output sandwich ingridients
$messages = ""; //
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$regUsername = $regMobileNo = $regDormAddr = "";
$unErr = $pnErr = $daErr = "";
$errCheck = 0;


$regUsername = $_POST["regUsername"];
$namecheck = "SELECT * FROM mycustomers WHERE username = '$regUsername'";
$result = $conn->query($namecheck);


if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["regUsername"])){
        $unErr = "Username is required";
        $errCheck = 1;
    }
    elseif($result->num_rows >0){
        $unErr = "Username already exist <a href='./mySandwichShop.php'>Order directly?</a>";
        $errCheck = 1;
    }
    else{
        if(!preg_match("/^[i-m]{1}[0-9]{9}$/", $regUsername)){
            $unErr = "Letter from i-m and 9 digits should be contained";
            $errCheck = 1;
        }
        $regUsername = $_POST["regUsername"];
    }

    if(empty($_POST["regMobileNo"])){
        $pnErr = "Phone number is required";
        $errCheck = 1;
    }
    elseif($result->num_rows >0){
        $pnErr = "Phone number already exist <a href='./mySandwichShop.php'>Order directly?</a>";
        $errCheck = 1;
    }
    else{
        if(!preg_match("/^[0-9]{11}$/", $regMobileNo)){
            $pnErr = "Plz input valid phone number";
            $errCheck = 1;
        }
        $regMobileNo = $_POST["regMobileNo"];
    }

    if(empty($_POST["regDormAddr"])){
        $daErr = "Dorm address is required";
        $errCheck = 1;
    }
    else{
        if(!preg_match("/^[V]{1}[0-9]{2}$/", $regDormAddr)){
            $daErr = "Plz input valid dorm address";
            $errCheck = 1;
        }
        $regDormAddr = $_POST["regDormAddr"];
    }
}

//if($errCheck == 0) {
    $sql = "INSERT INTO `mycustomers` 
        (`username`, `mobileNo`, `dormAddr`)
        VALUES (NULL, '$regUsername', '$regMobileNo', '$regDormAddr');";
//}

$conn->close();
?>

<html>

<head>

    <style>
        body{
            font-family: "Calibri Light";
        }
        .error{
            color:red;
        }
    </style>
</head>

<body>

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="Post">

    <h1>Register</h1>

    Username:<br/>
    <input type="text" name="regUsername" value="<?php echo $regUsername?>"/>
    <span class="error"><?php echo $unErr?></span><br/><br/>

    Mobile Number:<br/>
    <input type="text" name="regMobileNo" value="<?php echo $regMobileNo?>"/>
    <span class="error"><?php echo $pnErr?></span><br/><br/>

    Dorm Address:<br/>
    <input type="text" name="regDormAddr" value="<?php echo $regDormAddr?>"/>
    <span class="error"><?php echo $daErr?></span><br/><br/>

    <input type="submit" name="regSubmit" value="Register"/>

</form>

</body>
</html>
