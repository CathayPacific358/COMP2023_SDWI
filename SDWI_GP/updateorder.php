<?php
session_start();
$cake = array("mini-FERRERO", "Lavender Queen", "La Framboise", "Bruja mágica", "北海道の深い冬。", "Dreaming Cream", "Soul of Chocolate", "雪のお姫様", "Merry Christmas!");
if(empty($_SESSION['user']))
{
    header('Location:loginAdmin.php');
    die;
}
else if(empty($_POST['username'])||$_POST['cake']=='x'||$_POST['size']=='0'||$_POST['topping']=='x'||$_POST['giftcard']=='0'){
    $_SESSION['warn'] = "<div id='myAlert' class='alert alert-info'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;</a><p class='f-handstyle text-center'>Please fill in all blanks.</p></div>";
}
else{
    $username = $_POST['username'];
    $time = date("Y-m-d ").date("H:i");
    $amount = $_POST['amount'];
    if(isset($_POST['comment']))
    $comment = $_POST['comment'];
    else $comment = "No message.";
    $topping = $_POST['topping'];
    $addcake = $cake[$_POST['cake']];
    $giftcard = $_POST['giftcard'];
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "planecup";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    $sql = "INSERT INTO userbook (username, cake, comment, ordertime, toppings, giftcard,amount) VALUES 
                ('$username','$addcake','$comment','$time','$topping','$giftcard','$amount')";
    $result = $conn -> query($sql);
    $_SESSION['warn'] = "<div id='myAlert' class='alert alert-info'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;</a><p class='f-handstyle text-center'>Successfully adding order.</p></div>";

}
header("Location:changeorder.php");
?>