<?php
$type = $_GET['type'];
$category = $_GET['category'];
include('database.php');
$myquery = "DELETE FROM `category` WHERE `type`='$type' AND `categoryname`='$category'";
$connect = mysqli_query($dbconnect, $myquery);

header('location:category.php');

?>