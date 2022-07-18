<?php

$server ="localhost";
$user = "root";
$passwd = "";
$db = "art_gallery";

$con = mysqli_connect($server,$user,$passwd,$db);

$art_id = $_GET['artid'];

$deleteQuery = "DELETE FROM `art` WHERE `art_id`='$art_id'";
$delete = mysqli_query($con,$deleteQuery);
echo "<script>alert('Deleted successfully')</script>";
header("location: admin.php");

?>