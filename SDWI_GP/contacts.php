<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./totalStyle.css" rel="stylesheet">
    <link href="./bootstrap-4.0.0/dist/css/gallery.css" rel="stylesheet">
    <link href="./bootstrap-4.0.0/dist/css/baguetteBox.min.css" rel="stylesheet">

</head>
<body>

<nav class="sticky-top py-1 site-header f-handstyle">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="#">
            <img src="./img/GPLOGO_NW.png" width="28px" onmouseover="this.src='./img/GPLOGO_NWH.png'" onmouseout="this.src='./img/GPLOGO_NW.png'"/>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="#">About us</a>
        <a class="py-2 d-none d-md-inline-block" href="./index.html">Product</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Cart</a>
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign in</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="#">Sign in as Admin</a>
            <a class="dropdown-item" href="./registration.php">Sign in as Customer</a>
            <a class="dropdown-item" href="#">Sign in as VIP</a>
        </div>
        <a class="py-2 d-none d-md-inline-block" href="./login.php">Sign up</a>
    </div>
</nav>

<div class="contentbg">
<div class="container gallery-container f-handstyle">
    <h2>CO-FOUNDERS</h2>
    <div class="tz-gallery">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="thumbnail"> <a class="lightbox" href="./img/ljj.jpg"> <img src="./img/ljj.jpg" class="contactimg"></a>
                    <div class="f-contacts">
                        <h3>Sputnik Lee</h3>
                        <p class="f-compstyle">Indescribable</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="thumbnail"> <a class="lightbox" href="./img/wsy.png"> <img src="./img/wsy.png" class="contactimg"> </a>
                    <div class="f-contacts">
                        <h3>Frank Ng</h3>
                        <p class="f-compstyle">Indescribable</p>
                    </div>
                </div>
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
                <img src="./img/GPLOGO_NW.png" width="80px" onmouseover="this.src='./img/GPLOGO_NWH.png'" onmouseout="this.src='./img/GPLOGO_NW.png'"/>
            </a>
            <small class="d-block mb-3 text-muted" style="font-size:7.5px"><b>&copy; 2018 SDWI Group 15 All Rights Reserved</b></small>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="./bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="./bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
<script src="./bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
<script src="./bootstrap-4.0.0/assets/js/vendor/holder.min.js"></script>
<script src="./bootstrap-4.0.0/dist/js/baguetteBox.min.js"></script>
<script>
    Holder.addTheme('thumb', {
        bg: '#55595c',
        fg: '#eceeef',
        text: 'Thumbnail'
    });
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>