<?php
session_start();
$cake = array("mini-FERRERO", "Lavender Queen", "La Framboise", "Bruja mágica", "北海道の深い冬。", "Dreaming Cream", "Soul of Chocolate", "雪のお姫様", "Merry Christmas!");
if(empty($_SESSION['user']))
{
    header('Location:loginAdmin.php');
    die;
}
else if(empty($_POST['username'])||empty($_POST['ordertime'])||$_POST['cake']=='x'){
    $_SESSION['warn'] = "<div id='myAlert' class='alert alert-info'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;</a><p class='f-handstyle text-center'>Please fill in all blanks.</p></div>";

}
else{
    $username = $_POST['username'];
    $time = $_POST['ordertime'];
    $delcake = $_POST['cake'];
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "planecup";
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    $sql = "SELECT * FROM userbook WHERE username = '$username' AND ordertime = '$time' AND cake = '$cake[$delcake]'";
    $result = $conn -> query($sql);
    if($result->num_rows > 0){
        $sql = "DELETE FROM userbook WHERE username = '$username' AND ordertime = '$time' AND cake = '$cake[$delcake]'";
        $result = $conn -> query($sql);
        $_SESSION['warn'] = "<div id='myAlert' class='alert alert-info'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;</a><p class='f-handstyle text-center'>Successfully deleted.</p></div>";
    }
    else $_SESSION['warn'] = "<div id='myAlert' class='alert alert-info'><a href='#' class='close' width='auto' data-dismiss='alert'>&times;</a><p class='f-handstyle text-center'>Object not found.</p></div>";

}
header("Location:changeorder.php");
?>