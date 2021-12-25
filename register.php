<?php
include("database.php");
if (isset($_POST['signupemail']) and isset($_POST['password'])){

    $email = mysqli_real_escape_string($dbconnect, $_POST['signupemail']);
    $password = mysqli_real_escape_string($dbconnect, $_POST['password']);

    $query = "SELECT * FROM `iemusers` WHERE email='$email' and password='$password'";
    $result = mysqli_query($dbconnect, $query) or die(mysqli_error($dbconnect));
    $count = mysqli_num_rows($result);

    if ($count == 1){

    }
    else{
        $username = $_POST['username'];
		$email = $_POST['signupemail'];
		$password = $_POST['password'];
		$myquery = "INSERT INTO `iemusers`(`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
		$myconnect = mysqli_query($dbconnect, $myquery);
        header("location:index.php");
    }

}
?>




<head>
	<!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<link rel="stylesheet" href="style/addcolor.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
					<br>
				<div class="panel panel-primary">
            <div class="panel-heading text-center">
                  Register
            </div>
				<div class="panel-body">
		         <form role="form" method="post" action="">
		               <fieldset>
							
							
							<div class="form-group col-lg-12">
								<label for="username" class="control-label">Username</label>
								<div class="input-group">
                                <input type="username" class="form-control username" id="username" placeholder="UserName..." name="username">
								</div>
                     		</div>
                             <div class="form-group col-lg-12">
								<label for="signupemail" class="control-label">Email</label>
								<div class="input-group">
                                <input type="mail" class="form-control signupemail" id="signupemail" placeholder="Email..." name="signupemail">
								</div>
                     		</div>
                             <div class="form-group col-lg-12">
								<label for="password" class="control-label">Password</label>
								<div class="input-group">
                                <input type="password" class="form-control password" id="password" placeholder="Password..." name="password">
								</div>
                     		</div>
							
							
						<div class="text-center">
							<button type="submit" name="submit" class="btn"><span class="glyphicon glyphicon-log-in"> Register</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>