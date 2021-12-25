


<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="style/addcolor.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
		<script type="text/javascript">
			$(document).ready(function(){
				$("#radio1,#radio2").click(function(){
				var income = $('input[type="radio"]:checked').val();
					$.ajax({
						type : "GET",
						url : "cat.php",
						data : "mytype="+income,
						dataType : "html",
						success : function(response){
							$("#category").html(response);
						}
					});
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#radio1,#radio2").click(function(){
				var income = $('input[type="radio"]:checked').val();
					$.ajax({
						type : "GET",
						url : "catdis.php",
						data : "mytype="+income,
						dataType : "html",
						success : function(response){
							$("#output").html(response);
						}
					});
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#category").click(function(){
				var cat = $('#category option:selected').val();
					$.ajax({
						type : "GET",
						url : "cattable.php",
						data : "mycategory="+cat,
						dataType : "html",
						success : function(response){
							$("#output").html(response);
						}
					});
				});
			});
		</script>
</head>
<div class="container">
	<div class="row">
        <nav class="navbar navbar-default">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	<ul class="nav navbar-nav">
                    <h3>IncoExp</h3>
                </ul>
                <ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="">Home</a></li>
					<li><a href="add_incoexp.php">Add IncoExp</a></li>
					<li><a href="category.php">Add Category</a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" 
                        aria-expanded="false">User Name <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="">Edit Profile</a></li>
                        <li><a href="">Logout</a></li>
                    </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

    <div class="row">
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Type</div>
				<div class="form-check panel-body">
					<div class="radiodes">
						<input class="form-check-input" type="radio" name="type" id="radio1" value="income"> Income
					</div>
					<div class="radiodes">
						<input class="form-check-input" type="radio" name="type" id="radio2" value="expense"> Expense
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Category</div>
				<div class="form-check panel-body">
					<select name="category" id="category" class="form-control">
						<option selected>Open this select menu</option>
							<?php
								include('database.php');
								$myquery ="SELECT * FROM `category`";
								$connect = mysqli_query($dbconnect, $myquery);
								while($fetchdata = mysqli_fetch_array($connect)){
							?>
							<option value="<?php echo $fetchdata['categoryname']?>"><?php echo $fetchdata['categoryname']?></option>
							<?php } ?>
					</select>
				</div>
			</div>
		</div>
		<?php
			include('database.php');
			$myquery = "SELECT SUM(amount) as total FROM `transcations`JOIN `category` ON transcations.catid = category.catid WHERE `type`='income'";
			$connect = mysqli_query($dbconnect, $myquery);
			$fetchdata = mysqli_fetch_array($connect);
			$finaltotal = $fetchdata['total'];
		?>
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Income</div>
				<div class="form-check panel-body">
					<?php echo $finaltotal;?>
				</div>
			</div>
		</div>
		<?php
			include('database.php');
			$myquery = "SELECT SUM(amount) as total FROM `transcations`JOIN `category` ON transcations.catid = category.catid WHERE `type`='expense'";
			$connect = mysqli_query($dbconnect, $myquery);
			$fetchdata = mysqli_fetch_array($connect);
			$finaltotal = $fetchdata['total'];
		?>
		<div class="col-sm-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Expense</div>
				<div class="form-check panel-body">
					<?php echo $finaltotal;?>
				</div>
			</div>
		</div>		
	</div>


<table id="output" class="table table-bordered table-hover table-responsive">
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
    include('database.php');
    $myquery = "SELECT * FROM `transcations`INNER JOIN `category` ON transcations.catid = category.catid"; 
    $connect = mysqli_query($dbconnect, $myquery);
    while($fetchdata = mysqli_fetch_array($connect)){
?>
    <tbody>
    <tr>
        <td><?php echo $fetchdata['date'];?></td>
        <td><?php echo $fetchdata['type'];?></td>
        <td><?php echo $fetchdata['categoryname'];?></td>
		<td><?php echo $fetchdata['description'];?></td>
        <td><?php echo $fetchdata['amount'];?></td>
		<td>
			<a href="deletetrans.php?sno=<?php echo $fetchdata['sno'];?>">Delete</a>
		</td>
    </tr>
	</tbody>
<?php
}
?>
    
</table>
<br>

<button onclick =document.location='add_incoexp.php' >Add new Expense/Income</button>

</div>
