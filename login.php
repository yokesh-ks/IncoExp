<?php
 include("database.php");
 if(isset($_POST['loginsubmit'])){
	 $error="";
 	$myemail=$_POST['loginemail'];
 	$mypassword=$_POST['password'];
 	$myquery="select * from iemusers";
 	$execute=mysqli_query($dbconnect,$myquery);
 	while($result=mysqli_fetch_array($execute)){
 		if(($myemail==$result['email']) AND ($mypassword==$result['password'])){
 		   
 		    session_start();
 		    $_SESSION['sessionid'] = $result['id'];
 		    $_SESSION['sessiontype'] = $result['usertype'];
 		    $_SESSION['profile'] = $result['profileimage'];
 		    $_SESSION['name'] = $result['name'];
			header("location:success.php");
			
		}
		else{
		    header("location:failure.php");
		}
		
	}

}
else{
	$error = "User does not exist create a account";
	   }
?>
<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="d-flex justify-content-center align-items-center container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="loginform">
					<form method="post" action="login.php">
						<h2 class="text-center" style="color:cf0000;">Login</h2>
						<label class="text-center" style="color:e93b81; padding:7px;"><?php  echo $error; ?></label>
						<div class="row mb-3">
							<label for="email" class="col-sm-3 col-form-label" style="color:03256c; padding-top:15px;">Email</label>
							<div class="col-sm-9">
							  <input type="email" class="form-control" id="loginemail" name="loginemail">
							</div>
						</div>
						<div class="row mb-3">
							<label for="password" class="col-sm-3 col-form-label" style="color:03256c; padding-top:15px;">Password</label>
							<div class="col-sm-9">
							  <input type="password" class="form-control" id="password" name="password">
							</div>
						</div>
						<div class="text-center">
							<button type ="submit" name="loginsubmit" value="loginsubmit" class="btn" style="background-color:fc5404; color:white">Login</button>
						</div>
						
					</form>
					<div class="row mb-3">
						<div class="col-sm-12 text-center">
							<a href="register.php" style="color:cf0000;">Create new account</a>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>