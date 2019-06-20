<?php
	require_once('connection.php');
	if ($connect) {
		session_start();
		if (isset($_SESSION['username'])) {
			session_destroy();
		}
		if (isset($_POST['submit'])) {
			$username=$_POST['username'];
			$password=$_POST['password'];
			$sql="SELECT * FROM admin WHERE username='$username'";
			$result=mysqli_query($connect, $sql);
			$rows=mysqli_fetch_array($result);
			if ($rows) {
				if ($rows['password']==$password) {
					$_SESSION['username']=$username;
					$_SESSION['password']=$password;
					?>
					<meta http-equiv="refresh" content="0; home.php">
					<?php
					//echo "<script>alert('login successfully');</script>";
				}
				else {
					echo "<script>alert('wrong password');</script>";
				}
			}
			else {
				echo "<script>alert('you are not admin');</script>";
			}
		}
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Admin Login</title>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
			<link rel="stylesheet" type="text/css" href="css/admin.css">

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function () {
		   			$('html').bind('cut copy paste', function (e) {
		 					e.preventDefault();
					});
		  			$("html").on("contextmenu",function(e){
		     			return false;
		   			});
				});
			</script>

		</head>
		<body>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<form class="form-container" method="POST">
							<h1 class="text-center">Admin Login</h1>
							<div class="form-group">
						    	<label>Username</label>
						    	<input type="text" class="form-control" name="username" placeholder="Enter Username">
						  	</div>
							<div class="form-group">
								<label>Password</label>
						    	<input type="password" class="form-control" name="password" placeholder="••••••••••">
							</div>
							<button name="submit" class="btn btn-success btn-block submit">Sign In</button>
						</form>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
				</div>	
			</div>
		</body>
		</html>
		<?php
	}
?>