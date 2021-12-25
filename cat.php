
<?php
	include('database.php');
	$type=$_GET['mytype'];
	$myquery ="SELECT * FROM `category` WHERE `type` = '$type'";
	$connect = mysqli_query($dbconnect, $myquery);
?>

		<select class="form-select" aria-label="Default select example" name="category" id="category">
		<option selected>Open this select menu</option>
				<?php
					while($fetchdata = mysqli_fetch_array($connect)){ ?>
						<option value="<?php echo $fetchdata['catid'];?>"><?php echo $fetchdata['categoryname']?></option>
					<?php
					}
					?>
		</select>
