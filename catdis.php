<?php
    include('database.php');
	$type=$_GET['mytype'];
	$myquery = "SELECT * FROM `transcations`INNER JOIN `category` ON transcations.catid = category.catid WHERE `type` = '$type'";	
	$connect = mysqli_query($dbconnect, $myquery);
?>

<table id="output"class="table table-bordered table-hover table-responsive">
    <thead>
	<tr>
        <th scope="col">Date</th>
        <th scope="col">Type</th>
        <th scope="col">Category</th>
		<th scope="col">Description</th>
        <th scope="col">Amount</th>
		<th scope="col">Action</th>
    </tr>
	</thead>
    
<?php
    while($fetchdata = mysqli_fetch_array($connect)){
?>
    
    <tbody>
    <tr>
        <td><?php echo $fetchdata['date'];?></td>
        <td><?php echo $fetchdata['type'];?></td>
        <td><?php echo $fetchdata['categoryname'];?></td>
		<td><?php echo $fetchdata['description'];?></td>
        <td><?php echo $fetchdata['amount'];?></td>
		<td><a href="deletetrans.php?sno=<?php echo $fetchdata['sno'];?>">Delete</a></td>
    </tr>
	</tbody>
<?php
}
?>
    
</table>