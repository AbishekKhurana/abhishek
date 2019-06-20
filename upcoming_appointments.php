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
						<link rel="stylesheet" type="text/css" href="css/upcoming_appointments.css">

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
									<div class="col-lg-1 col-md-1"></div>
									<?php
										$i=0;
										$sql1="SELECT * FROM appointments WHERE status = 'unconfirmed'";
										$result1=mysqli_query($connect,$sql1);
										while ($rows1=mysqli_fetch_array($result1)) {
											if (($i%2)==0) {
												$i++;
												?>
												<div class="col-lg-3 col-md-3 col-sm-5 col-xs-11 form-container-orange">
													<div class="pull-right id">
													<?php
														echo ($rows1['id']);	?></div><?php
														echo "Firstname : ".($rows1['firstname']);	?><br><?php
														echo "Lastname : ".($rows1['lastname']);	?><br><?php
														echo "Email : ".($rows1['email']);	?><br><?php
														echo "Phone no : ".($rows1['number']);	?><br><?php
														echo "Description : ".($rows1['description']);	?><br><?php
														echo "Time : ".($rows1['time']);	?><br><?php
														echo "Date : ".($rows1['date']);	?><br><?php
														echo "Status : ".($rows1['status']);	?><br><?php
													?>
													<form method="POST">
														<div class="pull-right done">
															<input type="hidden" name="hidden_id" value="<?php echo ($rows1['id']); ?>">
															<button name="confirmed" class="btn-info done">Done</button>
														</div>
													</form>
												</div>
												<?php
											}
											else{
												$i++;
												?>
												<div class="col-lg-3 col-md-3 col-sm-5 col-xs-11 form-container-green">
													<div class="pull-right id">
													<?php
														echo ($rows1['id']);	?></div><?php
														echo "Firstname : ".($rows1['firstname']);	?><br><?php
														echo "Lastname : ".($rows1['lastname']);	?><br><?php
														echo "Email : ".($rows1['email']);	?><br><?php
														echo "Phone no : ".($rows1['number']);	?><br><?php
														echo "Description : ".($rows1['description']);	?><br><?php
														echo "Time : ".($rows1['time']);	?><br><?php
														echo "Date : ".($rows1['date']);	?><br><?php
														echo "Status : ".($rows1['status']);	?><br><?php
													?>
													<form method="POST">
														<div class="pull-right done">
															<input type="hidden" name="hidden_id" value="<?php echo ($rows1['id']); ?>">
															<button name="confirmed" class="btn-info done">Done</button>
														</div>
													</form>
												</div>
												<?php
											}
											if (($i%3)==0) {
												?>
												</div>
												<div class="row">
													<div class="col-lg-1 col-md-1"></div>
												<?php
											}
										}
									?>
								</div>
							</div>
							<?php
								if (isset($_POST['sign_out'])) {
									?>
									<meta http-equiv="refresh" content="0; logout.php">
									<?php
								}
								if (isset($_POST['confirmed'])) {
									$hidden_id=($_POST['hidden_id']);
									$sql = "UPDATE appointments SET status='confirmed' WHERE id='$hidden_id'";
									$status=mysqli_query($connect,$sql);
									if ($status) {
										echo "<script>alert('your database updated');</script>";
										?>
										<meta http-equiv="refresh" content="0; upcoming_appointments.php">
										<?php
									}
									else{
										echo "<script>alert('something wrong....');</script>";
									}
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