<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./totalStyle.css" rel="stylesheet">
    <link
    <?php
    session_start();
    $servername = "localhost";
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
        <a class="py-2 d-none d-md-inline-block" href="#">Cart</a>
        <?php echo $head; ?>
    </div>
</nav>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div><img src="./img/GPLOGO_WRH.png" style="width:18%;"></div>
    <div class="box-shadow d-none d-md-block"></div>
</div>

<!-- ROW ONE -->
<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="bg-dark mr-md-3 pt-3 pt-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">- mini-FERRERO -</h2>
            <p class="lead f-handstyle">Chocolate in love with chocolate.</p>
            <br/>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Small (x1)</button>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Medium (x2)</button>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Large (x3)</button>
        </div>
        <div class="box-shadow" style="width: auto; height: auto; border-radius: 21px 21px 0 0;">
            <img src="./img/cake1.jpg" class="indeximg"/>
        </div>
    </div>

    <div class="bg-light mr-md-3 pt-3 pt-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">- Lavender Queen -</h2>
            <p class="lead f-handstyle">Great purple, incredible.</p>
            <br/>
            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#cartmes">Small (x1)</button>
            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#cartmes">Medium (x2)</button>
            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#cartmes">Large (x3)</button>
        </div>
        <div class="box-shadow" style="width: auto; height: auto; border-radius: 21px 21px 0 0;">
            <img src="./img/cake2.jpg" class="indeximg"/>
        </div>
    </div>

    <div class="bg-dark mr-md-3 pt-3 pt-md-5 text-center text-white overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">- La Framboise -</h2>
            <p class="lead f-handstyle">Raspberry, a sweet story.</p>
            <br/>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Small (x1)</button>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Medium (x2)</button>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Large (x3)</button>
        </div>
        <div class="box-shadow" style="width: auto; height: auto; border-radius: 21px 21px 0 0;">
            <img src="./img/cake3.jpg" class="indeximg"/>
        </div>
    </div>
</div>

<!-- ROW TWO -->
<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="bg-light mr-md-3 pt-3 pt-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">- Bruja mágica -</h2>
            <p class="lead f-handstyle">Vanished, leaving a hat.</p>
            <br/>
            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#cartmes">Small (x1)</button>
            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#cartmes">Medium (x2)</button>
            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#cartmes">Large (x3)</button>
        </div>
        <div class="box-shadow" style="width: auto; height: auto; border-radius: 21px 21px 0 0;">
            <img src="./img/cake9.jpg" class="indeximg"/>
        </div>
    </div>
    <div class="bg-dark mr-md-3 pt-3 pt-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">- 北海道の深い冬。 -</h2>
            <p class="lead f-handstyle">Snowflake & pearl, you & me.</p>
            <br/>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Small (x1)</button>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Medium (x2)</button>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Large (x3)</button>
        </div>
        <div class="box-shadow" style="width: auto; height: auto; border-radius: 21px 21px 0 0;">
            <img src="./img/cake6.jpg" class="indeximg"/>
        </div>
    </div>
    <div class="bg-light mr-md-3 pt-3 pt-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">- Dreaming Cream -</h2>
            <p class="lead f-handstyle">And an even wittier subheading.</p>
            <br/>
            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#cartmes">Small (x1)</button>
            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#cartmes">Medium (x2)</button>
            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#cartmes">Large (x3)</button>
        </div>
        <div class="box-shadow" style="width: auto; height: auto; border-radius: 21px 21px 0 0;">
            <img src="./img/cake5.jpg" class="indeximg"/>
        </div>
    </div>
</div>

<!-- ROW THREE -->
<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">

    <div class="bg-dark mr-md-3 pt-3 pt-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">- Soul of Chocolate -</h2>
            <p class="lead f-handstyle">His soul - Ms.Marshmallow.</p>
            <br/>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Small (x1)</button>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Medium (x2)</button>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Large (x3)</button>
        </div>
        <div class="box-shadow" style="width: auto; height: auto; border-radius: 21px 21px 0 0;">
            <img src="./img/cake4.jpg" class="indeximg"/>
        </div>
    </div>
    <div class="bg-light mr-md-3 pt-3 pt-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">- 雪のお姫様 -</h2>
            <p class="lead f-handstyle">Loving deeply like snows.</p>
            <br/>
            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#cartmes">Small (x1)</button>
            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#cartmes">Medium (x2)</button>
            <button class="btn btn-sm btn-outline-dark" data-toggle="modal" data-target="#cartmes">Large (x3)</button>
        </div>
        <div class="box-shadow" style="width: auto; height: auto; border-radius: 21px 21px 0 0;">
            <img src="./img/cake7.jpg" class="indeximg"/>
        </div>
    </div>
    <div class="bg-dark mr-md-3 pt-3 pt-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">- Merry Christmas! -</h2>
            <p class="lead f-handstyle">Everyday is new year.</p>
            <br/>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Small (x1)</button>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Medium (x2)</button>
            <button class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#cartmes">Large (x3)</button>
        </div>
        <div class="box-shadow" style="width: auto; height: auto; border-radius: 21px 21px 0 0;">
            <img src="./img/cake8.jpg" class="indeximg"/>
        </div>
    </div>
</div>

<!-- MODAL of upper buttons -->
<div class="modal fade" id="cartmes" tabindex="-1" role="dialog" aria-labelledby="cartmesLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title f-handstyle" id="cartmesLabel">Please confirm</h4>
            </div>
            <div class="modal-body f-compstyle">Adding "cake name and number" into cart?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline-info">Confirm</button>
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
