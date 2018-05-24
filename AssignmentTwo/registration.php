<html>

<head>
    <style>
        .regform {
            margin: 100px 25%;
            font-family: "Calibri Light";
        }

        .error {
            color: red;
        }
		
		.success {
			color: green;
		}
    </style>
</head>

<body>

<?php
$run = $rpw = $rcpw = $familyn = $firstn = $idcn = $prov = $provsel = $loan = $gender = "";
$runErr = $rpwErr = $rcpwErr = $familynErr = $firstnErr = $idcnErr = $genderErr = $provinceErr = $loansErr = $regSuccess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $run = $rpw = $rcpw = $familyn = $firstn = $idcn = $prov = $loan = $gender = "";
    $runErr = $rpwErr = $rcpwErr = $familynErr = $firstnErr = $idcnErr = $genderErr = $provinceErr = $loansErr = $regSuccess = "";
    $ageCredit = $genderCredit = $provCredit = $loanCredit = "";
    $errCheck = 0;

    //Connect SQL for existence check
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
    $nameinp = $_POST["run"];
    $namecheck = "SELECT * FROM usertable WHERE username = '$nameinp'";
    $result = $conn->query($namecheck);

    $conn->close();

    //Registration Username
    if (empty($_POST["run"])) {
        $runErr = "Username is required";
        $errCheck = 1;
    }
    elseif($result->num_rows > 0){
        $runErr = "Username already exist";
        $errCheck = 1;
    }

    else {
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $run)) {
            $runErr = "Only letters and white space allowed";
            $errCheck = 1;
        }
        $run = $_POST["run"];
    }

    //Password
    if (empty($_POST["rpw"])) {
        $rpwErr = "Password is required";
        $errCheck = 1;
    }
    if (empty($_POST["rcpw"])) {
        $rcpwErr = "Please confirm your password";
        $errCheck = 1;
    }
    elseif ($_POST["rpw"] != $_POST["rcpw"]) {
        $rcpwErr = "Password does not match";
        $rpwErr = "Password does not match";
        $errCheck = 1;
    }
    if(!preg_match("/^[A-Z]((?![\d]{2,}+$)(?![a-z]{2,}+$)(?![\W]{2,}+$)[a-zA-Z\d\W]).{8,}[A-Z]+$/", $_POST["rpw"])) {
        $rpwErr = "<br/>Required:<br/>
                        <ul>
                        <li>10+ characters</li>
                        <li>Start and end with uppercase</li>
                        <li>2 non-alphanumeric</li>
                        <li>Minimum of 2 numerical characters</li>
                        <li>Minimum of 2 lowercase</li></ul>";
        $errCheck = 1;
    }

    //Family Name
    if (empty($_POST["familyn"])) {
        $familynErr = "Please input your family name";
        $errCheck = 1;
    }
    else
        $familyn = $_POST["familyn"];

    //First Name
    if (empty($_POST["firstn"])) {
        $firstnErr = "Please input your family name";
        $errCheck = 1;
    }
    else
        $firstn = $_POST["firstn"];

    //ID Card Number
    if (empty($_POST["idcn"])) {
        $idcnErr = "ID card number is required";
        $errCheck = 1;
    }
    elseif(!preg_match("/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/", $_POST["idcn"])){
        $idcnErr = "Please input correct mainland China ID number";
    }
    else
        $idcn = $_POST["idcn"];

    //Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Please select your gender";
        $errCheck = 1;
    }
    else
        $gender = $_POST["gender"];

    //Province
    if (empty($_POST["provsel"])) {
        $provinceErr = "Please select your province";
        $errCheck = 1;
    }

    //Loan
    if (empty($_POST["loan"])) {
        $loansErr = "Please choose your loans payment method";
        $errCheck = 1;
    }

    //Age Limitation
    $ageCheck = countAge();
    if($ageCheck < 18){
        $idcnErr = "Too young too simple! Naive! ( <18 )";
        $errCheck = 1;
    }

    if($errCheck == 0){
		$regSuccess = "Registered Successfully!";
        insertNewMember();
    }
}

function countAge()
{

    $born = $_POST["idcn"];
    $bornToNumYear = substr($born, 6, 4);
    $bornToNumMonth = substr($born, 10, 2);
    $nowyear = date("Y");
    $nowmonth = date("m");

    if ($nowmonth >= $bornToNumMonth) {
        $age = $nowyear - $bornToNumYear;
    } else
        $age = $nowyear - $bornToNumYear - 1;

    return $age;
}

//Function for credit score calculation of age gender and province
function creditScoreCalc()
{
    $age = countAge();
    $maleCredit = $femaleCredit = $provCredit = 0;

    if ($_POST["gender"] == "M") {
        if ($age <= 24) {
            $maleCredit = -50;
        } elseif ($age <= 40 && $age >= 25) {
            $maleCredit = 25;
        } elseif ($age <= 60 && $age >= 41) {
            $maleCredit = 40;
        } else
            $maleCredit = 11;
    }

    if ($_POST["gender"] == "F") {
        if ($age <= 24) {
            $femaleCredit = 25;
        } elseif ($age <= 40 && $age >= 25) {
            $femaleCredit = 50;
        } elseif ($age <= 60 && $age >= 41) {
            $femaleCredit = 40;
        } else
            $femaleCredit = 1;
    }

    if ($_POST["provsel"] == "Municipalities") {
        $provCredit = 100;
    } elseif ($_POST["provsel"] == "Province") {
        $provCredit = 60;
    } elseif ($_POST["provsel"] == "Autonomous") {
        $provCredit = 72;
    } else
        $provCredit = 123;

    $creditscore = $maleCredit + $femaleCredit + $provCredit;

    return $creditscore;


}

//Function for insert member
function insertNewMember()
{
    //Connect SQL for existence check
    $servername = "localhost";
    $username = "m730026119";
    $password = "abc123xyz";
    $dbname = "m730026119";


    //Calculate the credit of loan method
    $houseloan = $mastercard = $visacard = $storecard = $otherloan = "N";
    $loanCredit = 0;
    if (is_array($_POST["loan"])) {
        foreach ($_POST["loan"] as $value) {
            if ($value == 1) {
                $houseloan = "Y";
                $loanCredit += 200;
            }

            if ($value == 2) {
                $mastercard = "Y";
                $loanCredit += 55;
            }

            if ($value == 3) {
                $visacard = "Y";
                $loanCredit += 50;
            }

            if ($value == 4) {
                $storecard = "Y";
                $loanCredit += -25;
            }

            if ($value == 5) {
                $otherloan = "Y";
                $loanCredit += -100;
            }
        }
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $usern = $_POST["run"];
    $pw = $_POST["rpw"];
    $id_number = $_POST["idcn"];
    $firstname = $_POST["firstn"];
    $familyname = $_POST["familyn"];
    $gender = $_POST["gender"];
    $creditscore = creditScoreCalc();
    $totalCredit = $creditscore + $loanCredit;
    $age = countAge();

        $sql = "INSERT INTO `usertable` 
        (`cutomernumber`, `username`, `password`, `id_number`, `firstname`, `familyname`, `age`, `gender`, `houseloan`, `mastercard`, `visacard`, `storecard`, `otherloan`, `creditscore`)
        VALUES (NULL, '$usern', '$pw', '$id_number', '$firstname', '$familyname', '$age', '$gender', '$houseloan', '$mastercard', '$visacard', '$storecard', '$otherloan', '$totalCredit');";

    $result = $conn->query($sql);

    $conn->close();
}

?>
<div class="regform">
    <h1>Register Now</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> ">
        Username:<br/>
        <input type="text" name="run" value="<?php echo $run ?>"/>
        <span class="error">* <?php echo $runErr ?></span><br/><br/>

        Password:<br/>
        <input type="password" name="rpw" value="<?php echo $rpw ?>"/>
        <span class="error">* <?php echo $rpwErr ?></span><br/><br/>

        Confirm Password:<br/>
        <input type="password" name="rcpw" value="<?php echo $rcpw ?>"/>
        <span class="error">* <?php echo $rcpwErr ?></span><br/><br/>

        Family Name:<br/>
        <input type="text" name="familyn" value="<?php echo $familyn ?>"/>
        <span class="error">* <?php echo $familynErr ?></span><br/><br/>

        First Name:<br/>
        <input type="text" name="firstn" value="<?php echo $firstn ?>"/>
        <span class="error">* <?php echo $firstnErr ?></span><br/><br/>

        ID Card Number:<br/>
        <input type="text" name="idcn" value="<?php echo $idcn ?>"/>
        <span class="error">* <?php echo $idcnErr ?></span><br/><br/>

        Gender:<br/>
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "F") echo "checked"; ?>
               value="F">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "M") echo "checked"; ?>
               value="M">Male
        <span class="error">* <?php echo $genderErr ?></span>
        <br/><br/>

        Province:<br/>
        <select name="provsel">
            <option name="prov" value="0">Please Select Province</option>
            <option name="prov" value="Municipalities">Municipalities</option>
            <option name="prov" value="Province">Province</option>
            <option name="prov" value="Autonomous">Autonomous</option>
            <option name="prov" value="SAR">SAR</option>
        </select>
        <span class="error">* <?php echo $provinceErr ?></span>
        <br/><br/>

        Loans:<span class="error">* <?php echo $loansErr ?></span><br/>
        <input type="checkbox" name="loan[]" value="1">Loan for the house<br/>
        <input type="checkbox" name="loan[]" value="2">Master Card<br/>
        <input type="checkbox" name="loan[]" value="3">Visa<br/>
        <input type="checkbox" name="loan[]" value="4">Store Card<br/>
        <input type="checkbox" name="loan[]" value="5">Other Loan<br/><br/>

        <input type="submit" value="Register"/><br/>
		<span class="success"><?php echo $regSuccess?></span><br/>

        <a href="./login.php">Already have an account?</a>
    </form>
</body>

</html>