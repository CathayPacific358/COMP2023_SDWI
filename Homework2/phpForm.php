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

    body{
        font-family:"Calibri Light";
    }
</style>
</head>

<body>
<?php

$nameErr = $DoBErr = $UIDErr = $DPErr = $genderErr = $FTErr = "";
$name = $DoB = $UID = $DP = $gender = $fav = "";
$progTitle = $DPoutput = $fruitiac = $DoBoutput = "";
$dd = $mm = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $nameErr = "*Name is required";
    }
    else{
        //set pattern for name input
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
        $DoB = $_POST["DoB"];

        //assign value to mm and dd in forms of month and day respectively
        $mm = date("m", strtotime($_POST["DoB"]));
        $dd = date("d", strtotime($_POST["DoB"]));

        $DoBoutput = date("d F Y", strtotime($_POST["DoB"]));
        $fruitiac = fruitiac($mm,$dd);
    }

    if(empty($_POST["UID"])){
        $UIDErr = "*UIC ID is required";
    }
    else{
    //set pattern for uic id input
        if(!preg_match("/^[a-z]{1}[0-9]{9}$/", $_POST["UID"])){
            $UIDErr = "*UIC ID is required";
        }
        else {
            $UID = outputTable($_POST["UID"]);
        }
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
    //set pattern for programme input
        if(!preg_match("/^[A-Z]{2,4}$/", $_POST["DP"])){
            $DPErr = "*DST Programme is required";
        }
        else {

            $fullname = prog($_POST["DP"]);
            if ($fullname == "0") {
                $DPErr = "*DST Programme is required";
            }
            else {
                $DP = outputTable($_POST["DP"]);
                $DPoutput = $fullname . "(" . $DP . ")";
            }
        }



    }


function fruitiac($mm, $dd) {
//allocate friut depending on the date of birth

    switch($mm){
        case 1: {
            if($dd >= 14){
                $fruitiac = "Cherry";
                break;
            }
            if($dd <= 5){
                $fruitiac = "Lychees";
                break;
            }
        }
        case 2: {$fruitiac = "Cherry";
        break;
        }
        case 3: {
            if($dd <= 2){
                $fruitiac = "Cherry";
                break;
            }
            elseif($dd >= 10){
                $fruitiac = "Durian";
                break;
            }
        }
        case 4: {
            if($dd <= 27){
                $fruitiac = "Durian";
                break;
            }
        }
        case 6: {
            if($dd >= 5 && $dd <= 29){
                $fruitiac = "Starfruit";
                break;
            }
        }
        case 7: {
            if($dd >= 11){
                $fruitiac = "Orange";
                break;
            }
        }
        case 8: {
            if($dd <= 27){
                $fruitiac = "Orange";
                break;
            }
        }
        case 9: {
            if($dd >= 17){
                $fruitiac = "Banana";
                break;
            }
        }
        case 10: {
            if($dd <= 21){
                $fruitiac = "Lychees";
                break;
            }
        }
        case 11: {
            if($dd >= 3){
                $fruitiac = "Lychees";
                break;
            }
        }
        case 12: {
            $fruitiac = "Lychees";
            break;
        }
        default: {
            $fruitiac = "You only like vegetables";
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
            break;
        case "FST":
            $progTitle = "Food Science and Technology";
            break;
        case "ENVS":
            $progTitle = "Environmental Science";
            break;
        default:
            $progTitle = 0;
    }


    return $progTitle;
}

/* Function for outputting the table */
function outputTable($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!-- Start of the form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> ">

    <!-- Name -->
    Name: <input type="text" name="name" value="<?php echo $name;?>">

    <br/>
    <br/>

    <!-- DoB -->
    Date of Birth: <input type="date" name="DoB" value="<?php echo date("d m Y", strtotime($DoB))?>">

    <br/>
    <br/>

    <!-- UICID -->
    UIC ID: <input type="text" name="UID" value="<?php echo $UID?>">

    <br/>
    <br/>

    <!-- DSTP -->
    DST Programme: <input type="text" name="DP" value="<?php echo $DP?>">

    <br/>
    <br/>

    <!-- Gender -->
    Gender:
    <input type="radio" name="gender" <?php if(isset($gender) && $gender=="female") echo "checked";?> value="Female">Female
    <input type="radio" name="gender" <?php if(isset($gender) && $gender=="male") echo "checked";?> value="Male">Male
    <input type="radio" name="gender" <?php if(isset($gender) && $gender=="other") echo "checked";?> value="Other">Other

    <br/>
    <br/>

    <!-- Favourite things -->
    Favourite things:<br/>

        <input type="checkbox" name="fav[]" value="Watching Movies">Watching Movies<br/>
        <input type="checkbox" name="fav[]" value="Collecting Stamps">Collecting Stamps<br/>
        <input type="checkbox" name="fav[]" value="Eating Out">Eating Out<br/>
        <input type="checkbox" name="fav[]" value="Badminton">Badminton<br/>
        <input type="checkbox" name="fav[]" value="Table Tennis">Table Tennis<br/>
        <input type="checkbox" name="fav[]" value="Playing the Guitar">Playing the Guitar<br/>
        <input type="checkbox" name="fav[]" value="Coffee with Friend">Coffee with Friend<br/>
        <input type="checkbox" name="fav[]" value="Playing on My Phone">Playing on My Phone<br/>

    <br/>

    <!-- Submit button -->
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


<!-- Start of the table -->
<?php

echo "<table border=1><tr><th>Name</th><td>" . $name . "</td></tr>";
echo "<tr><th>UIC ID</th><td>" . $UID . "</td></tr>";
echo "<tr><th>Gender</th><td>" . $gender . "</td></tr>";
echo "<tr><th>Programme</th><td>" . $DPoutput . "</td><tr/>";
echo "<tr><th>DOB</th><td>" . $DoBoutput . "</td></tr>";
echo "<tr><th>Fruitiac</th><td>" . $fruitiac . "</td></tr>";
echo "<tr><th>List of favourites</th><td>";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fav"])) {
        $FTErr = "*No favourites were selected";
    } else {
        foreach ($_POST["fav"] as $value) {
            echo "$value <br/>";
        }
    }
}
"</td></tr></table>";

?>

</body>
</html>
