<head>
	<!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="style/addcolor.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		

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
					<li><a href="">Add IncoExp</a></li>
					<li class="active"><a href="">Add Category</a></li>
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
    <br>
    <div class="row">
        <div class="col-md-6">
			<div class="panel panel-primary">
            <div class="panel-heading">
                  Incomes
            </div>
				<div class="panel-body">
                    <form action="subcat.php?type=income" method="post">
                        <div class="col-md-8">
                            <input class="form-control" placeholder="Enter the Income Category"  id="category" name="category" type="text" value="">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Add Sub Category" class="btn btn-primary" >
                        </div>
                    </form>
                    <div style="margin-top:40px">
                    <br>
                    </div>
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Type</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php
                            include('database.php');
                            $myquery = "SELECT * FROM `category` WHERE `type`='income'"; 
                            $connect = mysqli_query($dbconnect, $myquery);
                            while($fetchdata = mysqli_fetch_array($connect)){
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $fetchdata['type'];?></td>
                            <td><?php echo $fetchdata['categoryname'];?></td>
                            <td><a href="deletecat.php?type=<?php echo $fetchdata['type'];?>&category=<?php echo $fetchdata['categoryname'];?>">Delete</a></td>
                        </tr>
                        </tbody>
                        <?php
                            }
                        ?>
                    </table>
				</div>
			</div>
		</div>
        <div class="col-md-6">
			<div class="panel panel-primary">
            <div class="panel-heading">
                  Expense
            </div>
				<div class="panel-body">
                    <form action="subcat.php?type=expense" method="post">
                        <div class="col-md-8">
                            <input class="form-control" placeholder="Enter the Expense Category"  id="category" name="category" type="text" value="">
                        </div>
                        <div class="col-md-4">
                            <input type="submit" value="Add Sub Category" class="btn btn-primary">
                        </div>
                    </form>
                    <div style="margin-top:40px">
                    <br>
                    </div>
                    <table class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Type</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php
                            include('database.php');
                            $myquery = "SELECT * FROM `category` WHERE `type`='expense'"; 
                            $connect = mysqli_query($dbconnect, $myquery);
                            while($fetchdata = mysqli_fetch_array($connect)){
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $fetchdata['type'];?></td>
                            <td><?php echo $fetchdata['categoryname'];?></td>
                            <td><a href="deletecat.php?type=<?php echo $fetchdata['type'];?>&category=<?php echo $fetchdata['categoryname'];?>">Delete</a></td>
                        </tr>
                        </tbody>
                        <?php
                            }
                        ?>
                    </table> 
				</div>
			</div>
		</div>
	</div>
</div>
