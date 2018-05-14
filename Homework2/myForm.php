<!DOCTYPE html>
<html>
<head>
<style>
    .error{
        color:red;
    }

    table{
        border-collapse: collapse;;
    }
</style>
</head>

<body>
<?php

$nameErr = $DoBErr = $UIDErr = $DPErr = $genderErr = $FTErr = "";
$name = $DoB = $UID = $DP = $gender = $FT = "";
$progTitle = $DPoutput = $fruitiac = $DoBoutput = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $nameErr = "Name is required";
    }
    else{
        if(!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])){
            $nameErr = "*Only letters and white space allowed";
            }
            else{
            $name = outputTable($_POST["name"]);
            }
        }
    }

    if(empty($_POST["DoB"])){
        $DoBErr = "*Date of birth is required";
    }
    else{
        $DoBoutput = date("d F Y", strtotime($DoB));
    }

    if(empty($_POST["UID"])){
        $UIDErr = "*UIC ID is required";
    }
    else{
        $UID = outputTable($_POST["UID"]);
    }


    if(empty($_POST["gender"])){
        $genderErr = "*Gender is required";
    }
    else{
        $gender = outputTable($_POST["gender"]);
    }

    if(empty($_POST["DP"])){
        $DPErr = "*DST Programme is required";
    }
    else{
        $DP = outputTable($_POST["DP"]);
        $fullname = prog($DP);
        $DPoutput = $fullname . "(" . $DP . ")";
    }

    if(empty($_POST["FT"])){
        $FTErr = "*No favourites were selected";
    }
    else {
        $FT += outputTable($_POST["FT"]);
    }

function fruitiac($mm, $dd) {
//allocate friut depending on the date of birth
    if($mm >= 1 && $mm <= 3){
        if($mm == 1) {
            if ($dd >= 14) {
            }
        }
        else if($mm == 2){

        }
        else{
            if($dd <= 2){

            }
        }
    }
    return $fruitiac;

}

function prog($DP) {
//use PHP switch statement
    $progTitle = "";
    switch($DP){
        case "CDS":
            $progTitle = "Computer Data Science";
            break;
        case "CST":
            $progTitle = "Computer Science and Technology";
            break;
        case "STAT":
            $progTitle = "Statistics";
            break;
        case "APSY":
            $progTitle = "Applied Psychology";
            break;
        case "FM":
            $progTitle = "Financial Mathematics";
            break;
        case "DS":
            $progTitle = "Data Science";
            }

    return $progTitle;
}

function outputTable($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">
    Name: <input type="text" name="name" value="<?php echo $name;?>">

    <br/>
    <br/>

    Date of Birth: <input type="date" name="DoB" value="<?php echo date("d-m-Y", strtotime(DoB))?>">

    <br/>
    <br/>

    UIC ID: <input type="text" name="UID" value="<?php echo $UID?>">

    <br/>
    <br/>

    DST Programme: <input type="text" name="DP" value="<?php echo $DP?>">

    <br/>
    <br/>

    Gender:
    <input type="radio" name="gender" <?php if(isset($gender) && $gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if(isset($gender) && $gender=="male") echo "checked";?> value="female">Male
    <input type="radio" name="gender" <?php if(isset($gender) && $gender=="other") echo "checked";?> value="female">Other

    <br/>
    <br/>

    Favourite things:<br/>

        <input type="checkbox" value="<?php echo $FT?>">Watching Movies<br/>
        <input type="checkbox" value="<?php echo $FT?>">Collecting Stamps<br/>
        <input type="checkbox" value="<?php echo $FT?>">Eating Out<br/>
        <input type="checkbox" value="<?php echo $FT?>">Badminton<br/>
        <input type="checkbox" value="<?php echo $FT?>">Table Tennis<br/>
        <input type="checkbox" value="<?php echo $FT?>">Playing the Guitar<br/>
        <input type="checkbox" value="<?php echo $FT?>">Coffee with Friend<br/>
        <input type="checkbox" value="<?php echo $FT?>">Playing on My Phone<br/>

    <br/>

    <input type="submit" name="submit" value="submit">

    <br/>
    <br/>

    <span class="error"><?php echo $nameErr;?></span><br/>
    <span class="error"><?php echo $DoBErr?></span><br/>
    <span class="error"><?php echo $UIDErr?></span><br/>
    <span class="error"><?php echo $DPErr?></span><br/>
    <span class="error"><?php echo $genderErr;?></span><br/>
    <span class="error"><?php echo $FTErr;?></span><br/>
</form>

<?php

echo "<table border=1><tr><th>Name</th><td>" . $name . "</td></tr>
    <tr><th>UIC ID</th><td>" . $UID . "</td></tr>
    <tr><th>Gender</th><td>" . $gender . "</td></tr>
    <tr><th>Programme</th><td>" . $DPoutput . "</td><tr/>
    <tr><th>DOB</th><td>" . $DoBoutput . "</td></tr>
    <tr><th>Fruitiac</th><td>" . $fruitiac . "</td></tr>
    <tr><th>List of favourites</th><td>" . $FT . "</td></tr></table>";

?>

</body>
</html>
