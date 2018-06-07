<?php
session_start();
$caketype = $_GET['cake'];
$size = $_POST["submit"];
$cake = array("mini-FERRERO", "Lavender Queen", "La Framboise", "Bruja mágica", "北海道の深い冬。", "Dreaming Cream", "Soul of Chocolate", "雪のお姫様", "Merry Christmas!");

if (isset($_SESSION['user']))
{
    switch ($size) {
        case "Small (x1)":
            $_SESSION["cake" . $caketype] += 1;
            break;
        case "Medium (x2)":
            $_SESSION["cake" . $caketype] += 2;
            break;
        case "Large (x3)":
            $_SESSION["cake" . $caketype] += 3;
            break;
    }

    $_SESSION['warn'] = "<div id='myAlert' class='alert alert-info'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;</a><p class='f-handstyle text-center'>Success adding to cart " . $cake[$caketype] . " " . $size . "</p></div>";

}
else {
    $_SESSION['warn'] = "<div id='myAlert' class='alert alert-info'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;</a><h1 class='f-handstyle text-center'>Please sign in first.</h1></div>";

}
header("Location:index.php");
?>