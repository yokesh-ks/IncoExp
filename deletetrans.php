<?php
$sno = $_GET['sno'];
include('database.php');
$myquery = "DELETE FROM `transcations` WHERE `sno` = '$sno'";
$connect = mysqli_query($dbconnect, $myquery);

header('location:index.php');

?>