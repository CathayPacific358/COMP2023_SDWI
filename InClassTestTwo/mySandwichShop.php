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

    function getFillings()
    {
        $fillings = "";
        foreach ($_POST["fillings"] as $value) {
            $fillings .= "$value ";
        }

        echo $fillings;
        return $fillings;
    }


    function calculateCost($sandwich, $bread, $fillings)
    {
        // add code here to calculate the cost
        $sandwichCost = 0;
        switch ($sandwich) {
            case "melt": {
                    $sandwich = "Subway Melt";
                    $sandwichCost = 42;
                    break;
                }

            case "veggie": {
                    $sandwich = "Veggie";
                    $sandwichCost = 28.0;
                    break;
                }

            case "club": {
                    $sandwich = "Club Sandwich";
                    $sandwichCost = 33.0;
                    break;
                }

            case "fishy": {
                    $sandwich = "Fishy wrap";
                    $sandwichCost = 28.0;
                    break;
                }

            case "burger": {
                    $sandwich = "Burger";
                    $sandwichCost = 48.0;
                }
        }

        $breadCost = 0;
        switch ($bread) {
            case "white": {
                    $bread = "White";
                    $breadCost = 8.0;
                    break;
                }

            case "brown": {
                    $bread = "Brown";
                    $breadCost = 9.0;
                    break;
                }

            case "baguette": {
                    $bread = "Baguette";
                    $breadCost = 10.0;
                    break;
                }
            case "panini" : {
                    $bread = "Panini";
                    $breadCost = 12.0;
                }
        }

        $fillCost = 0;
        foreach($_POST["fillings"] as $value){
            if($value == "Cucumber"){
                $fillCost += 2.5;
            }
            if($value == "Onions"){
                $fillCost += 1.0;
            }
            if($value == "Tomatoes"){
                $fillCost = 3.0;
            }
            if($value == "Cheese"){
                $fillCost = 5.0;
            }
        }

        $ingridients = "";
        $ingridients .= "Sandwich: $sandwich <br/>";
        $ingridients .= "Bread Type: $bread <br/>";
        $ingridients .= "Fillings: " . getFillings($fillings) . "<br/>";
        $totalCost = $breadCost + $sandwichCost + $fillCost;
        $ingridients .= "Total cost: " . $totalCost;

        return $ingridients;
    }


    // If form submitted -
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $formSandwichType = $_POST['sandwichType'];
        $formBreadType = $_POST['breadType'];
        $formFillings = $_POST['fillings'];
        $formUsername = $_POST['username'];
        $formMobileNo = "";
        $formDormAddr = "";


        // check username exist and matches mobile number

        $sql = "SELECT dormAddr, mobileNo  FROM myCustomers WHERE username = '$formUsername'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($formMobileNo == $row['mobileNo']) { // replace the TRUE with your expression between the brackets
                $messages = "Dear " . $formUsername . ", your order will be delivered to " . $row['dormAddr'] . ", we will call you on " . $row['mobileNo'];
            } else {
                $messages = "Dear " . $formUsername . ", your mobile " . $row['mobileNo'] . " does not match";
            }
            // Calculate sandwich cost
            $myList = calculateCost($formSandwichType, $formBreadType, $formFillings);

        } else {
            $messages = "Sorry, you are not a member - please <a href='#'>register</a> if you wish to order a sandwich";

        }
    }


    $conn->close();

?>

<!DOCTYPE html>
<html>
	<head>
		<style> 
			#messages{color:red;} 
			td{
				vertical-align: top;
				padding:15px;
			}
			table{margin: 50px auto;
				  border: 1px solid black;
			}
			div{text-align: center;
				
			}
		</style>
	</head>

	<body>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="Post">
		<table>
			<tr>
				<th colspan="3"><h2>My Sandwich - My Way</h2></th>
			</tr>
			<tr>
				<td>
			  		Username:<input type="text" name="username" id="username" />
			  	</td>
				<td>
					MobileNo:<input type="text" name="mobileno" id="mobileno" />
				</td>
				<td>
					Dorm Address:<input type="text" name="dorm" id="dorm" />
				</td>
			</tr>
			<tr>
				<td><h4>Sandwich</h4>
				  	<input type="radio" name="sandwichType" id="melt" value="melt" />Subway Melt(42) <br/>
					<input type="radio" name="sandwichType" id="veggie" value="veggie" />Veggie(28) <br/>
					<input type="radio" name="sandwichType" id="club" value="club" />Club Sandwich(33)<br/>
					<input type="radio" name="sandwichType" id="Fishy" value="Fishy" />Fishy wrap(28) <br/>
					<input type="radio" name="sandwichType" id="burger" value="burger" />Burger(48) <br/>
				</td>
				<td><h4>Bread type</h4>
					<input type="radio" name="breadType" id="white" value="white" />White Slice(8) <br/>
					<input type="radio" name="breadType" id="brown" value="brown" />Brown Slice(9)<br/>
					<input type="radio" name="breadType" id="baguette" value="baguette" />Baguette(10) <br/>
					<input type="radio" name="breadType" id="panini" value="panini" />Panini(12)<br/>
				</td>
				<td><h4>filling</h4>
				    <input type="checkbox" name="fillings[]" value="Cucumber" />Cumcumber (2.5) <br/>
				 	<input type="checkbox" name="fillings[]" value="Onions" />Onions(1.0) <br/>
				  	<input type="checkbox" name="fillings[]" value="Tomatoes" />Tomatoes(3.0) <br/>
				    <input type="checkbox" name="fillings[]" value="Cheese" />Cheese(5.0) <br/>
				</td>
			</tr>
			<tr>
				<th colspan="3"><input type="submit" name="button" id="button" value="Order" /></td>
			</tr>
		</table>
		</form>

        <div>
			<p id="messages"><?php echo $messages; ?></p>
			<p id="myList"><?php echo $myList; ?></p>
		</div>
	</body>
</html>
