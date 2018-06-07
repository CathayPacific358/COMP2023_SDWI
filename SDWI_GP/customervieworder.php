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
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "planecup";
    $mes = $password = $username = "";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_SESSION['user'])) {
        $username = $_SESSION['user'];
        $head = "<a class=\"py-2 d-none d-md-inline-block\" href=\"#\">Hello, " . $username . "</a>
            <a class=\"py-2 d-none d-md-inline-block\" href=\"logout.php\">Sign out</a>
            ";


    }
    else {
        $head = "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"dropdown01\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Sign in</a>
        <div class=\"dropdown-menu\" aria-labelledby=\"dropdown01\">
            <a class=\"dropdown-item\" href=\"./loginAdmin.php\">Sign in as Admin</a>
            <a class=\"dropdown-item\" href=\"./login.php\">Sign in as Customer</a>
        </div>
        <a class=\"py-2 d-none d-md-inline-block\" href=\"./registration.php\">Sign up</a>
        ";
    }


    $previousOrders = "";

    $sql = "SELECT * FROM userbook WHERE username = '$username' ORDER BY ordertime desc";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $previousOrders .=
            "<table class='table f-handstyle'>
			<thead class='thead-dark' style='font-size: 16px;'>
			<tr>
			    <th scope='col'>Order Time</th>
				<th scope='col'>Username</th>
				<th scope='col'>Cake Type</th>
				<th scope='col' style='font-size: 13px;'>Size (In amount)</th>
				<th scope='col' style='font-size: 13px;'>Gift Card</th>
				<th scope='col'>Comment</th>
				<th scope='col'>Toppings</th>
			</thead><tbody>";
        while($row = $result->fetch_assoc()) {
            $previousOrders .= "<tr><td>" . $row["ordertime"]. "</td><td>" . $row["username"]. "</td><td>" . $row["cake"]. "</td><td>" .$row["amount"]. "</td><td>" . $row["giftcard"] . "</td><td>". $row["comment"] . "</td><td>". $row["toppings"]. "</td></tr>";
        }
        $previousOrders .= "</tbody></table>";
    } else {
        $previousOrders = "<p class='f-handstyle'>No order in your account. <a class='text-dark'href='./index.php'>Order your favourite now!</a></p>";
    }


    $conn->close();
    ?>
</head>
<body>

<nav class="sticky-top py-1 site-header f-handstyle">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="homepage.php">
            <img src="./img/GPLOGO_NW.png" width="28px" onmouseover="this.src='./img/GPLOGO_NWH.png'"
                 onmouseout="this.src='./img/GPLOGO_NW.png'"/>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="homepage.php">About us</a>
        <a class="py-2 d-none d-md-inline-block" href="index.php">Product</a>
        <a class="py-2 d-none d-md-inline-block" href="cart.php">Cart</a>
        <?php echo $head; ?>
    </div>
</nav>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div><img src="./img/GPLOGO_WRH.png" style="width:18%;"></div>
    <div class="box-shadow d-none d-md-block"></div>
</div>


<div class="contentbg">
    <div class="container">
        <h1 class="f-handstyle" style="font-size: 30px;">Your previous orders :)</h1>
        <br/>
        <?php echo $previousOrders?>
    </div>
</div>
<!--- FOOTER --->
<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <a class="py-2" href="#">
                <img src="./img/GPLOGO_NW.png" width="80px" onmouseover="this.src='./img/GPLOGO_NWH.png'"
                     onmouseout="this.src='./img/GPLOGO_NW.png'"/>
            </a>
            <small class="d-block mb-3 text-muted" style="font-size:7.5px"><b>&copy; 2018 SDWI Group 15 All Rights
                    Reserved</b></small>
        </div>
        <div class="col-6 col-md">
            <h5>Quick Portal</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="homepage.php">About us</a></li>
                <li><a class="text-muted" href="index.php">Product</a></li>
                <li><a class="text-muted" href="#">Cart</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Friendly Links</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="http://www.21cake.com/" target="_blank">21 Cakes</a></li>
                <li><a class="text-muted" href="http://www.xfxb.net/" target="_blank">Bliss Cake</a></li>
                <li><a class="text-muted" href="http://www.cakeking.cn/" target="_blank">Cake King</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Contact us</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="contacts.php">Co-founders</a></li>
            </ul>
        </div>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="./bootstrap-4.0.0/assets/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="./bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
<script src="./bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
<script src="./bootstrap-4.0.0/js/dist/popover.js"></script>
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