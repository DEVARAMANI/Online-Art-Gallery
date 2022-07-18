<?php

$server = "localhost";
$user = "root";
$passwd = "";
$db = "art_gallery";

$con = mysqli_connect($server,$user,$passwd,$db);

$pid = $_GET['pid'];

mysqli_query($con,"DELETE FROM `purchase` WHERE `p_id` ='$pid'");

header("location: admin.php");

?>