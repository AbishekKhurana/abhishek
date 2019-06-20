<?php
	require_once('connection.php');
	if ($connect) {
		session_start();
		if (isset($_SESSION['username'])&&isset($_SESSION['password'])) {
			$username=$_SESSION['username'];
			$password=$_SESSION['password'];
		
			$sql="SELECT * FROM admin WHERE username='$username'";
			$result=mysqli_query($connect, $sql);
			$rows=mysqli_fetch_array($result);
			if ($rows) {
				if ($rows['password']==$password) {
					?>
					<!DOCTYPE html>
					<html>
					<head>
						<meta charset="utf-8">
						<meta name="viewport" content="width=device-width, initial-scale=1.0">
						<title>Admin Panel</title>

						<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
						<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
						<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
						<link rel="stylesheet" type="text/css" href="css/home.css">

					</head>
					<body>
						<div class="container-fluid">
							<div class="navbar-fixed-top">
									<div class="jumbotron text-center top_bar ">
									<a href="home.php"><img src="images/admin_icon.png" alt="adminLogo" id="adminLogo"></a>
									<br>
									Welcome to Admin Panel
								</div>
								<form method="POST">
									<button name="sign_out" class="btn btn-danger sign_out pull-right">Sign Out</button>
								</form>
							</div>
							<div class="container-fluid data">
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<form class="form-container" method="POST">
											<div class="row">
												<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
													<button name="all_appointments" class="btn btn-success btn-block all_appointments">All<br>Appointments</button>
												</div>
												<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
													<button name="upcoming_appointments" class="btn btn-danger btn-block upcoming_appointments">Upcoming<br>Appointments</button>
												</div>
											</div>
										</form>
									</div>
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
								</div>
							</div>
							<?php
								if (isset($_POST['all_appointments'])) {
									?>
									<meta http-equiv="refresh" content="0; all_appointments.php">
									<?php
								}
								if (isset($_POST['upcoming_appointments'])) {
									?>
									<meta http-equiv="refresh" content="0; upcoming_appointments.php">
									<?php
								}
								if (isset($_POST['sign_out'])) {
									?>
									<meta http-equiv="refresh" content="0; logout.php">
									<?php
								}
							?>
						</div>
					</body>
					</html>
					<?php
				}
			}	
		}
		else{
			echo "<h1>please login to continue!</h1>";
			?>
			<meta http-equiv="refresh" content="2; admin.php">
			<?php
		}
	}
?>