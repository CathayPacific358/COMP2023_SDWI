<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./totalStyle.css" rel="stylesheet">
    <?php
    session_start();

    if (isset($_SESSION['user'])) {
        $head = "
            <a class=\"py-2 d-none d-md-inline-block\" href=\"#\">Hello, " . $_SESSION['user'] . " [ admin ]</a>
            <a class=\"py-2 d-none d-md-inline-block\" href=\"logout.php\">Sign out</a>
            ";
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "planecup";
        $mes = "";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        $sql = "SELECT *FROM userbook";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $mes .= "<table class='table f-handstyle'>
			<thead class='thead-dark' style='font-size: 16px;'>
			<tr>
			    <th scope='col'>Order no.</th>
			    <th scope='col'>Order Time</th>
				<th scope='col'>Username</th>
				<th scope='col'>Cake Type</th>
				<th scope='col' style='font-size: 13px;'>Size (In amount)</th>
				<th scope='col' style='font-size: 13px;'>Gift Card</th>
				<th scope='col'>Comment</th>
				<th scope='col'>Toppings</th>
			</thead><tbody>";
            while ($row = $result->fetch_assoc()) {
                $mes .= "<tr><td>" . $row['OrderNum'] . "</td><td>" . $row["ordertime"] . "</td><td>" . $row["username"] . "</td><td>" . $row["cake"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["giftcard"] . "</td><td>" . $row["comment"] . "</td><td>" . $row["toppings"] . "</td></tr>";
            }
            $mes .= "</tbody></table>";
        }
        else $mes = "<p class='f-handstyle'>No order in your shop.</p>";
    }
    else {
        header("Location:homepage.php");
        die;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST['object'] == '1') {
            $username = $_POST['input'];
            $sql = "SELECT *FROM userbook WHERE username='$username'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $mes = "<table class='table f-handstyle'>
			<thead class='thead-dark' style='font-size: 16px;'>
			<tr>
			    <th scope='col'>Order no.</th>
			    <th scope='col'>Order Time</th>
				<th scope='col'>Username</th>
				<th scope='col'>Cake Type</th>
				<th scope='col' style='font-size: 13px;'>Size (In amount)</th>
				<th scope='col' style='font-size: 13px;'>Gift Card</th>
				<th scope='col'>Comment</th>
				<th scope='col'>Toppings</th>
			    </thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    $mes .= "<tr><td>" . $row['OrderNum'] . "</td><td>" . $row["ordertime"] . "</td><td>" . $row["username"] . "</td><td>" . $row["cake"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["giftcard"] . "</td><td>" . $row["comment"] . "</td><td>" . $row["toppings"] . "</td></tr>";
                }
                $mes .= "</tbody></table>";
            }
            else $mes = "<p class='f-handstyle'>No order from this user.</p>";

        }
        else {
            $city = $_POST['input'];
            $sql = "SELECT *FROM user WHERE city='$city'";
            $result = $conn->query($sql);
            $user = array();
            $i = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $user[$i] = $row['username'];
                }
            }
            else $mes = "<p class='f-handstyle'>No user from this city.</p>";

            for ($i = 0; $i < count($user); $i++) {
                $sql = "SELECT *FROM userbook WHERE username='$user[$i]'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $mes = "<table class='table f-handstyle'>
                    <thead class='thead-dark' style='font-size: 16px;'>
                    <tr>
                    <th scope='col'>Order no.</th>
                    <th scope='col'>Order Time</th>
                    <th scope='col'>Username</th>
                    <th scope='col'>Cake Type</th>
                    <th scope='col' style='font-size: 13px;'>Size (In amount)</th>
                    <th scope='col' style='font-size: 13px;'>Gift Card</th>
                    <th scope='col'>Comment</th>
                    <th scope='col'>Toppings</th>
                    </thead><tbody>";
                    while ($row = $result->fetch_assoc()) {
                        $mes .= "<tr><td>" . $row['OrderNum'] . "</td><td>" . $row["ordertime"] . "</td><td>" . $row["username"] . "</td><td>" . $row["cake"] . "</td><td>" . $row["amount"] . "</td><td>" . $row["giftcard"] . "</td><td>" . $row["comment"] . "</td><td>" . $row["toppings"] . "</td></tr>";
                    }
                    $mes .= "</tbody></table>";
                }
            }
            if (empty($mes)) $mes = "<p class='f-handstyle'>No order from this city.</p>";

        }
    }
    ?>
</head>
<body>

<nav class="sticky-top py-1 site-header f-handstyle">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="homepage.php">
            <img src="./img/GPLOGO_NW.png" width="28px" onmouseover="this.src='./img/GPLOGO_NWH.png'"
                 onmouseout="this.src='./img/GPLOGO_NW.png'"/>
        </a>
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">Manage</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="./adminvieworder.php">Search Orders</a>
            <a class="dropdown-item" href="./changeorder.php">Change Orders</a>
        </div>
        <?php echo $head; ?>
    </div>
</nav>

<!-- Main Content -->
<div class="contentbg">
    <div class="container">
        <h2 class="f-compstyle" style="font-size: 50px">Search Order</h2>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="Post">
            <div class="form-row">
                <div class="col-2">
                    <select type="text" class="form-control" name="object">
                        <option value="1">Username</option>
                        <option value="2">City</option>
                    </select>
                </div>
                <div class="col-2">
                    <input class="form-control" type="text" name="input">
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <input type="submit" class="btn btn-outline-info" value="Search">
                </div>
            </div>
        </form>
    </div>
</div>
</div>

<div class="contentbg">
    <div class="container">
        <h1 class="f-handstyle" style="font-size: 30px;">Here are your orders :)</h1>
        <br/>
        <?php echo $mes ?>
    </div>
</div>
<!--- FOOTER --->
<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <img src="./img/GPLOGO_NW.png" width="80px" onmouseover="this.src='./img/GPLOGO_NWH.png'"
                 onmouseout="this.src='./img/GPLOGO_NW.png'"/>
            <small class="d-block mb-3 text-muted" style="font-size:7.5px"><b>&copy; 2018 SDWI Group 15 All Rights
                    Reserved</b></small>
        </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="./bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="./bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
<script src="./bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
<script src="./bootstrap-4.0.0/assets/js/vendor/holder.min.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
</script>
</body>
</html>
