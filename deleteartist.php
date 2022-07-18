<?php

$server = 'localhost';
$user = 'root';
$passwd = "";
$db = "art_gallery";

$con = mysqli_connect($server,$user,$passwd,$db);
$artemail = $_GET['artemail'];

$deleteartistQuerry = mysqli_query($con,"DELETE FROM `signup` WHERE `email`='$artemail'");

if($deleteartistQuerry>0)
{
    echo "<script>alert(Successfully deleted)</script>";
    header("location: admin.php");
}
?>