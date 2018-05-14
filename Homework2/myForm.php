<!DOCTYPE html>
<html>
<head>
<style>
    .error{
        color:red;
    }
</style>
</head>

<body>
<?php

$nameErr = $DoBErr = $UIDErr = $DPErr = $genderErr = $FTErr = "";
$name = $DoB = $UID = $DP = $gender = $FT = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
        $nameErr = "Name is required";
    }
    else{
        $name =
    }
}

function fruitiac($mm, $dd) {
//allocate friut depending on the date of birth

    if()
  return $fruitiac;
}

function prog($data) {
//use PHP switch statement

  return $progTitle;
}
?>

<form method="post" action="<?php echo htmlspecialchars()$_SERVER["PHP_SELF"]);?> ">
    Name: <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error"> * <?php echo $nameErr;?></span>

    <br/>
    <br/>

    Date of Birth: <input type="date" name="DoB" value="<?php echo $mm, $dd?>">
    <span class="error"> * <?php echo $DoBErr?></span>

    UIC ID: <input type="text" name="UID" value="<?php echo $UID?>">
    <span class="error"> * <?php echo $UIDErr?></span>

    DST Programme: <input type="text" name="DP" value="<?php echo $DP?>">
    <span class="error"> * <?php echo $DPErr?></span>

    Gender:
    <input type="radio" name="gender" <?php if(isset($gender) && $gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if(isset($gender) && $gender=="male") echo "checked";?> value="female">Male
    <input type="radio" name="gender" <?php if(isset($gender) && $gender=="other") echo "checked";?> value="female">Other
    <span class="error"> * <?php echo $genderErr;?></span>

    Favourite things:
    <select>
        <option value="<?php echo $FT?>">Watching Movies</option>
        <option value="<?php echo $FT?>">Collecting Stamps</option>
        <option value="<?php echo $FT?>">Eating Out</option>
        <option value="<?php echo $FT?>">Badminton</option>
        <option value="<?php echo $FT?>">Table Tennis</option>
        <option value="<?php echo $FT?>">Playing the Guitar</option>
        <option value="<?php echo $FT?>">Coffee with Friend</option>
        <option value="<?php echo $FT?>">Playing on My Phone</option>
    </select>
    <span class="error"> * <?php echo $FTErr;?></span>

    <br/>
    <br/>

    <input type="submit" name="submit" value="submit">
</form>

</body>
