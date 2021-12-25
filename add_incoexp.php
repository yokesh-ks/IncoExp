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

</head>
<div class="container">
	<div class="row">
        <nav class="navbar navbar-default">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	<ul class="nav navbar-nav">
                    <h3>IncoExp</h3>
                </ul>
                <ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li class="active"><a href="">Add IncoExp</a></li>
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
        <div class="col-md-4 col-md-offset-4">
					<br>
				<div class="panel panel-primary">
            <div class="panel-heading">
                  Incomes
            </div>
				<div class="panel-body">
		         <form role="form" method="post" action="submit.php">
		               <fieldset>
							<div class="form-group col-lg-12">
								<label class="control-label">Type</label>
						 			<div class="form-check">
										<div class="radiodes">
											<input class="form-check-input" type="radio" name="type" id="radio1" value="income"> Income
										</div>
										<div class="radiodes">
											<input class="form-check-input" type="radio" name="type" id="radio2" value="expense"> Expense
										</div>
									</div>
							</div>
							<div class="form-group col-lg-12" id="income">
                        		<label for="date">Date</label>
                        		<div class="input-group date">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									<input name="date" class="form-control" type="text"  value="<?php echo date("Y-m-d");?>">
								</div>
                    		</div>
							<div class="form-group col-lg-12">
								<label for="amount" class="control-label">Amount</label>
								<div class="input-group">
									<span class="input-group-addon">₹</span>
									<input class="form-control" placeholder="Enter the amount"  id="amount" name="amount" type="text" value="">
								</div>
                     		</div>
							<div class="form-group col-lg-12">
                        		<label for="category">Category</label>
                        		<select name="category" id="category" class="form-control">
									<option selected>Open this select menu</option>
										<?php
											include('database.php');
											$myquery ="SELECT * FROM `category`";
											$connect = mysqli_query($dbconnect, $myquery);
											while($fetchdata = mysqli_fetch_array($connect)){
										?>
											<option value="<?php echo $fetchdata['catid']?>"><?php echo $fetchdata['categoryname']?></option>
										<?php } ?>
                        		</select>
                    		</div>
							<div class="form-group col-lg-12 clearbothh">
                        		<label for="description">Description</label>
                        		<textarea type="text" name="description" class="form-control"></textarea>
                    		</div>
                  		</fieldset>
						<div class="text-center">
							<button type="submit" name="expense" class="btn"><span class="glyphicon glyphicon-log-in"> Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
