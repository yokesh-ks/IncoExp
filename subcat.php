<?php
$type = $_GET['type'];
$category = $_POST['category'];
include('database.php');
$myquery = "INSERT INTO `category`(`type`, `categoryname`) VALUES ('$type', '$category')"; 
$connect = mysqli_query($dbconnect, $myquery);

header('location:category.php');

?>