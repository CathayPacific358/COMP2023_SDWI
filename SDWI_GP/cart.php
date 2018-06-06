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
    $applicate = $mes = "";
    if (isset($_SESSION['user'])) {

        $username = $_SESSION['user'];
        $head = "<a class=\"py-2 d-none d-md-inline-block\" href=\"#\">Hello, " . $username . "</a>
            <a class=\"py-2 d-none d-md-inline-block\" href=\"logout.php\">Sign out</a>
            ";
        $cake = array("mini-FERRERO", "Lavender Queen", "La Framboise", "Bruja mágica", "北海道の深い冬。", "Dreaming Cream", "Soul of Chocolate", "雪のお姫様", "Merry Christmas!");
        $price = array(12, 9, 10, 15, 12, 8, 13, 12, 16);
        $_SESSION['cake1'] = 2;
        $_SESSION['cake8'] = 2;
        $application = "<tr><th>Type of cake</th><th>Amount</th><th>Price per cake</th></tr>
            <tr><td><div></div></td><td><div></div></td><td><div></div></td><td><div></div></td></tr>";
        for ($i = 0; $i < 9; ++$i) {
            if ($_SESSION["cake" . $i] > 0) {
                $num = $_SESSION["cake" . $i];
                $application .= "<tr><td>" . $cake[$i] . "</td><td>
                <input type='number' class=' btn btn-outline-danger btn-sm p-2 col-md-3' name='cake" . $i . "'  value='" . $num . "' min='0'></td>
                <td>" . $price[$i] . "</td><tr>";
            }


        }
        $application .= "</tr>";
    }
    else {
        if (isset($_SERVER["HTTP_REFERER"])) header("Location:" . $_SERVER["HTTP_REFERER"]);
        else header("Location:homepage.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $totalprice = 0;
        for ($i = 0; $i < 9; ++$i) {
            if ($_POST['cake'.$i] > 0)
                $totalprice += $_POST['cake'.$i] * $price[$i];
        }
        $mes = "<table class=\"table invoice-total\">
        <tr>
            <td><strong>Total Price</strong>
            </td>
            <td>".$totalprice."</td>
        </tr>
        </table>
        </form>
        <div class=\"text-right\">
            <button class=\"btn btn-outline-info\"><i class=\"fa fa-dollar\"></i>Order & Purchase</button>
        </div>";
    }
    ?>
</head>


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

<div class="contentbg">
    <div class="container table-responsive">
        <table class="table invoice-table">
            <?php echo $application; ?>
        </table>

        <form class="was-validated " action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="Post">
            <span class="f-compstyle">Free extra topping: </span><br/>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="fruit">
                <label class="custom-control-label" for="fruit">Fruits</label>
            </div>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="chocolate">
                <label class="custom-control-label" for="chocolate">Chocolate</label>
            </div>
            <span class="f-compstyle">Free gift card: </span>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="giftcard">
                <label class="custom-control-label" for="giftcard">Order giftcard</label>
            </div>
            <span class="f-compstyle">Leave your gift message or comment: </span>
            <div class="custom-control custom-checkbox" mb-3>
                <textarea class="form-control col-md-5" id="giftmes" rows="2"></textarea>
            </div>
            <br>
            <br>
            <button class="btn btn-lg btn-outline-danger btn-block f-handstyle" type="submit">check</button>

            <br/>


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

<script>
    var i, total, name, price, totalname;
    for (i = 0; i < 9; ++i) {
        name = "cake" + i;
        price = "price" + i;
        totalname = "total" + i;
        if (document.getElementById(name).value > 0)
            total = document.getElementById(name).value * document.getElementById(price).value;
        document.getElementById(totalname).innerText = total;
    }
</script>

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
