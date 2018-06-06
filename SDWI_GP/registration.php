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
    $username = $password = $comfpsw = $telnum = $email = $city = $address = $mes = "";
    $usernameerr = $passworderr = $comfpswerr = $telnumerr = $emailerr = $cityerr = $addresserr = "";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $err = 0;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $comfpsw = $_POST['comfpsw'];
        $telnum = $_POST['telnum'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $address = $_POST['address'];

        if (!preg_match("/^[a-zA-Z0-9_-]{4,16}$/", $username)) {
            $usernameerr = "<div id='myAlert' class='alert alert-danger'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;
                    </a>Invalid form of username<ul><li>4-16 characters</li><li>only containing alphanumeric<br> 
                    charracters or single hyphens</li></ul></div> ";
            $err++;
        }
        else {
            $sql = "SELECT * FROM user WHERE username = '$username'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $usernameerr = "<div id='myAlert' class='alert alert-danger'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;
                    </a>Username has been taken</div> ";
                $err++;
            }
        }

        if (!preg_match("/^(?=.*[A-Z])[A-Za-z0-9$\@\#\%\!\^\&\*\-\_\?\.\ ]{6,16}$/", $password)) {
            $passworderr = "<div id='myAlert' class='alert alert-danger'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;
                    </a>Invalid form of password<ul><li>6-16 characters</li><li>only containing alphanumeric<br> 
                    charracters or special <br>characters(.!@#$%^&*?_- )</li>
                    <li>At least one capital</li></ul></div> ";
            $err++;
        }
        else if ($comfpsw != $password) {
            $comfpswerr = "<div id='myAlert' class='alert alert-danger'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;
                    </a>Password is not match</div> ";
            $comfpsw = "";
            $err++;
        }

        if (!preg_match("/^[0-9]{11}$/", $telnum)) {
            $telnumerr = "<div id='myAlert' class='alert alert-danger'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;
                    </a>Incorrect telephone No.</div> ";
            $err++;
        }

        if (!preg_match("/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,})$/", $email)) {
            $emailerr = "<div id='myAlert' class='alert alert-danger'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;
                    </a>Incorrect email</div> ";
            $err++;
        }

        if (!preg_match("/^[A-Z]{4,}$/", $city)) {
            $cityerr = "<div id='myAlert' class='alert alert-danger'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;
                    </a>Incorrect city</div> ";
            $err++;
        }

        if (!preg_match("/^[a-zA-Z0-9,\.\ ]{5,}$/", $address)) {
            $addresserr = "<div id='myAlert' class='alert alert-danger'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;
                    </a>Incorrect address</div> ";
            $err++;
        }

        if ($err == 0) {
            $sql = "insert into user (username,password,tel_num,email,address,admin,city)
            values ('$username','$password','$telnum','$email','$address','N','$city')";
            $result = $conn->query($sql);

            $mes = "<div id='myAlert' class='alert alert-success'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;
                    </a>Sign up successful <br><a href='login.php'>click here to login in</a></div> ";
        }
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
        <a class="py-2 d-none d-md-inline-block" href="./homepage.php">About us</a>
        <a class="py-2 d-none d-md-inline-block" href="./index.php">Product</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Cart</a>
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">Sign in</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Sign in as Admin</a>
            <a class="dropdown-item" href="./login.php">Sign in as Customer</a>
            <a class="dropdown-item" href="#">Sign in as VIP</a>
        </div>
        <a class="py-2 d-none d-md-inline-block" href="./registration.php">Sign up</a>
    </div>
</nav>

<!--- SIGN IN FORM --->
<div class="contentbg">
    <form class="form-signin" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="Post">
        <img class="mb-4" src="" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-bold f-handstyle">Sign up</h1>
        <input type="text" class="form-control" placeholder="Username" name="username" style="width: 300px;"
               value="<?php echo $username; ?>" required autofocus><br/>
        <?php echo $usernameerr; ?>
        <input type="password" class="form-control" placeholder="Password" name="password" style="width: 300px;"
               value="<?php echo $password; ?>" required><br/>
        <?php echo $passworderr; ?>
        <input type="password" class="form-control" placeholder="Confirm password" name="comfpsw" style="width: 300px;"
               value="<?php echo $comfpsw; ?>" required><br/>
        <?php echo $comfpswerr; ?>
        <input type="text" class="form-control" placeholder="Tel Number" name="telnum" style="width: 300px;"
               value="<?php echo $telnum; ?>" required><br/>
        <?php echo $telnumerr; ?>
        <input type="text" class="form-control" placeholder="Email" name="email" style="width: 300px;"
               value="<?php echo $email; ?>" required><br/>
        <?php echo $emailerr; ?>
        <input type="text" class="form-control" placeholder="City (In upper case)" name="city" style="width: 300px;"
               value="<?php echo $city; ?>" required><br/>
        <?php echo $cityerr; ?>
        <input type="text" class="form-control" placeholder="Address (English only)" name="address"
               style="width: 300px;"
               value="<?php echo $address; ?>" required><br/>
        <?php echo $addresserr; ?>
        <br/>
        <?php echo $mes; ?>
        <button class="btn btn-lg btn-outline-info btn-block f-handstyle" style="width: 300px;" type="submit"><b>Sign
                up</b></button>
    </form>
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
            <h5>Features</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Cool stuff</a></li>
                <li><a class="text-muted" href="#">Random feature</a></li>
                <li><a class="text-muted" href="#">Team feature</a></li>
                <li><a class="text-muted" href="#">Stuff for developers</a></li>
                <li><a class="text-muted" href="#">Another one</a></li>
                <li><a class="text-muted" href="#">Last time</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Resource</a></li>
                <li><a class="text-muted" href="#">Resource name</a></li>
                <li><a class="text-muted" href="#">Another resource</a></li>
                <li><a class="text-muted" href="#">Final resource</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Business</a></li>
                <li><a class="text-muted" href="#">Education</a></li>
                <li><a class="text-muted" href="#">Government</a></li>
                <li><a class="text-muted" href="#">Gaming</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>Contact us</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="./contacts.php">Co-founders</a></li>
                <li><a class="text-muted" href="#">Locations</a></li>
                <li><a class="text-muted" href="#">Privacy</a></li>
                <li><a class="text-muted" href="#">Terms</a></li>
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