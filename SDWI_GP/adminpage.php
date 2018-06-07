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
            <a class=\"py-2 d-none d-md-inline-block\" href=\"./adminvieworder.php\">Hello, " . $_SESSION['user'] . " [ admin ]</a>
            <a class=\"py-2 d-none d-md-inline-block\" href=\"logout.php\">Sign out</a>
            ";
    }
    else {
        header("Location:homepage.php");
        die;
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
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manage</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="./adminvieworder.php">Search Orders</a>
            <a class="dropdown-item" href="./changeorder.php">Change Orders</a>
        </div>
        <?php echo $head; ?>
    </div>
</nav>

<!--- FOOTER --->
<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <img src="./img/GPLOGO_NW.png" width="80px" onmouseover="this.src='./img/GPLOGO_NWH.png'" onmouseout="this.src='./img/GPLOGO_NW.png'"/>
            <small class="d-block mb-3 text-muted" style="font-size:7.5px"><b>&copy; 2018 SDWI Group 15 All Rights Reserved</b></small>
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
