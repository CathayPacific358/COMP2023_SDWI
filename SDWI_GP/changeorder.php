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
            <a class="dropdown-item" href="./loginAdmin.php">Search Orders</a>
            <a class="dropdown-item" href="./login.php">Change Orders</a>
        </div>
        <?php echo $head; ?>
    </div>
</nav>

<!-- Main Content -->
<div class="contentbg">
    <div class="container">
        <h2 class="f-compstyle" style="font-size: 50px">Change Order</h2>
        <br/>
        <br/>
        <h4 class="f-compstyle" style="font-size: 30px;">Delete Order</h4>
            <div class="form-row">
                <div class="col-2">
                    <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" placeholder="Order Time">
                </div>
                <div class="col-6">
                    <input type="text" class="form-control" placeholder="Address">
                </div>
                <div>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#delwarning">Delete</button>
                </div>
            </div>

        <br/>
        <br/>
        <h4 class="f-compstyle" style="font-size: 30px">Update Order</h4>
        <div class="form-row">
            <div class="col-2">
                <input type="text" class="form-control" placeholder="Username">
            </div>
            <div class="col-2">
                <input type="text" class="form-control" placeholder="City">
            </div>
            <div class="col-2">
                <input type="text" class="form-control" placeholder="Cake Type">
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="col-2">
                <input type="text" class="form-control" placeholder="Size">
            </div>
            <div class="col-2">
                <input type="text" class="form-control" placeholder="Amount">
            </div>
            <div class="col-2">
                <input type="text" class="form-control" placeholder="Topping">
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="col-2">
                <input type="text" class="form-control" placeholder="Gift Card">
            </div>
        </div>
        <br/>
        <div class="form-row">
            <div class="col-6">
                <textarea type="text" class="form-control" rows="3" placeholder="Gift message or comment"></textarea>
            </div>
        </div>
        <br/>
            <div class="form-row">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Address">
            </div>
            <div>
                <button class="btn btn-success" data-toggle="modal" data-target="#addwarning">Add</button>
            </div>
            </div>
        <br/>
        <br/>
    </div>
</div>


<!-- MODAL of DELETE warning -->
<div class="modal fade" id="delwarning" tabindex="-1" role="dialog" aria-labelledby="delwarningLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title f-compstyle" id="delwarningLabel"><span style="color:red;">CAUTION</span></h4>
            </div>
            <div class="modal-body f-compstyle">Are you sure to <span style="color: red"> DELETE</span> this order?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline-danger">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL of ADD warning -->
<div class="modal fade" id="addwarning" tabindex="-1" role="dialog" aria-labelledby="addwarningLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title f-compstyle" id="addwarningLabel"><span class="text-success">TIPS</span></h4>
            </div>
            <div class="modal-body f-compstyle">Are you sure to <span class="text-success"> ADD</span> this order?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-outline-success">Confirm</button>
            </div>
        </div>
    </div>
</div>


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
