<?php

$ser = "localhost";
$user = "root";
$passwd = "";
$db = "art_gallery";

$con = mysqli_connect($ser,$user,$passwd,$db);

$custemail = $_GET['custemail'];

$select = "SELECT * FROM `customer` where `email` = '$custemail'";

mysqli_query($con,"DELETE FROM `signup` WHERE `email`='$custemail'");

header("location: admin.php");

?>