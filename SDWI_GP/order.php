<?php
session_start();
date_default_timezone_set("Asia/Shanghai");
$cake = array("mini-FERRERO", "Lavender Queen", "La Framboise", "Bruja mágica", "北海道の深い冬。", "Dreaming Cream", "Soul of Chocolate", "雪のお姫様", "Merry Christmas!");
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "planecup";
$username = $_SESSION['user'];

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

$time = date("Y-m-d ").date("H:i");
for ($i = 0; $i < 9; ++$i) {
    if ($_SESSION['cake' . $i] > 0) {
        if (!empty($_SESSION['fruit' . $i]) || !empty($_SESSION['chocolate' . $i])) {
            $topping = "";
            if (!empty($_SESSION['custmes']))
                $comment = $_SESSION['custmes'];
            else $comment = "No";
            if (!empty($_SESSION['fruit' . $i])) {
                $topping .= "fruit ";
                if (!empty($_SESSION['chocolate' . $i])) {
                    $topping .= "& chocolate";
                }
            }
            else if (!empty($_SESSION['chocolate' . $i])) $topping .= "chocolate";
        }
        else $topping = "No topping";
        if (!empty($_SESSION['giftcard'])) $giftcard = "Y";
        else $giftcard = "N";
        $sql = "INSERT INTO userbook (username, cake, comment, ordertime, toppings, giftcard) VALUES 
                ('$username','$cake[$i]','$comment','$time','$topping','$giftcard')";
        $result = $conn->query($sql);

    }
}
$conn->close();
$_SESSION = array();
session_destroy();
session_start();
$_SESSION['user'] = $username;
$_SESSION['warn'] = "<div id='myAlert' class='alert alert-info'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;</a><p class='f-handstyle text-center'>Success ordring.</p></div>";
for ($i = 0; $i < 9; ++$i) $_SESSION['cake' . $i] = 0;
header("Location:index.php");

?>

