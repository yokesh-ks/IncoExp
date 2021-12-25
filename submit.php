<?php
$date =$_POST['date'];
$amount =$_POST['amount'];
$catid =$_POST['category'];
$description = $_GET['description'];
include('database.php');
$myquery ="INSERT INTO `transcations`(`date`, `catid`, `amount`, `description`) VALUES ('$date', '$catid', '$amount', '$description')";
$connect = mysqli_query($dbconnect, $myquery);

header('location:index.php');
?>