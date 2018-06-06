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

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "planecup";
    $mes = $password = $username = "";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if (!empty($_GET['user']) && !empty($_GET['psw'])) {
        $username = $_GET['user'];
        $sql = "SELECT password FROM user WHERE username = '$username'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $password = $row['password'];
        if (hash("md5", $password) == $_GET['psw']) {
            $head = "
            <a class=\"py-2 d-none d-md-inline-block\" href=\"adminpage.php\">Manage</a>
            <a class=\"py-2 d-none d-md-inline-block\" href=\"#\">Hello, " . $_GET['user'] . "</a>
            <a class=\"py-2 d-none d-md-inline-block\" href=\"index.php\">Sign out</a>
            ";
            $password = $_GET['psw'];
            $index = "index.php?user=" . $username . "&psw=" . $password;
            $contacts = "contacts.php?user=" . $username . "&psw=" . $password;
            $homepage = "homepage.php?user=" . $username . "&psw=" . $password;
            $adminpage = "adminpage.php?user=" . $username . "&psw=" . $password;
        }
        else {
            $head = "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"dropdown01\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Sign in</a>
            <div class=\"dropdown-menu\" aria-labelledby=\"dropdown01\">
                <a class=\"dropdown-item\" href=\"./loginAdmin.php\">Sign in as Admin</a>
                <a class=\"dropdown-item\" href=\"./login.php\">Sign in as Customer</a>
                <a class=\"dropdown-item\" href=\"#\">Sign in as VIP</a>
            </div>
            <a class=\"py-2 d-none d-md-inline-block\" href=\"./registration.php\">Sign up</a>
            ";
            $index = "index.php";
            $contacts = "contacts.php";
            $homepage = "homepage.php";
            $adminpage = "adminpage.php";
        }
    }
    else {
        $head = "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"dropdown01\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Sign in</a>
        <div class=\"dropdown-menu\" aria-labelledby=\"dropdown01\">
            <a class=\"dropdown-item\" href=\"#\">Sign in as Admin</a>
            <a class=\"dropdown-item\" href=\"./login.php\">Sign in as Customer</a>
            <a class=\"dropdown-item\" href=\"#\">Sign in as VIP</a>
        </div>
        <a class=\"py-2 d-none d-md-inline-block\" href=\"./registration.php\">Sign up</a>
        ";
        $index = "index.php";
        $contacts = "contacts.php";
        $homepage = "homepage.php";
        $adminpage= "adminpage.php";
    }
    ?>
</head>
<body>

<nav class="sticky-top py-1 site-header f-handstyle">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="<?php echo $homepage;?>">
            <img src="./img/GPLOGO_NW.png" width="28px" onmouseover="this.src='./img/GPLOGO_NWH.png'"
                 onmouseout="this.src='./img/GPLOGO_NW.png'"/>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="<?php echo $homepage;?>">About us</a>
        <a class="py-2 d-none d-md-inline-block" href="<?php echo $index;?>">Product</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Cart</a>
        <?php echo $head; ?>


    </div>
</nav>

<div class="contentbg">
    <div class="container">
        <div>
            <div class="bg-dark img-thumbnail">
                <img class="img-thumbnail" src="./img/cake1.jpg" width="20%">
                <span class="text-white f-compstyle" style="font-size: 30px;">mini-FERRERO</span>
                <span class="text-white f-handstyle" style="font-size: 20px;"><input type="checkbox" name="fruit" class="text-white">Fruit</span>
                <span class="text-white f-handstyle" style="font-size: 20px;"><input type="checkbox" name="chocolate" class="text-white">Chocolate</span>
            </div>
        </div>
    </div>
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
                <li><a class="text-muted" href="<?php echo $homepage?>">About us</a></li>
                <li><a class="text-muted" href="<?php echo $index?>">Product</a></li>
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
                <li><a class="text-muted" href="<?php echo $contacts;?>">Co-founders</a></li>
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
