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
						<link rel="stylesheet" type="text/css" href="css/all_appointments.css">

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
								<div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
												<th>ID</th>
												<th>Firstname</th>
												<th>Lastname</th>
												<th>Email</th>
												<th>Phone_no.</th>
												<th>Description</th>
												<th>Time</th>
												<th>Date</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=1;
											$sql1="SELECT * FROM appointments";
											$result1=mysqli_query($connect,$sql1);
											while ($rows1=mysqli_fetch_array($result1)) {
												echo "<tr>"."<th>".($rows1[('id')])."</th>"."</td>"."<td>".($rows1['firstname'])."</td>"."<td>".($rows1[('lastname')])."</td>"."<td>".($rows1[('email')])."</td>"."<td>".($rows1['number'])."</td>"."<td>".($rows1['description'])."</td>"."<td>".($rows1['time'])."</td>"."<td>".($rows1['date'])."</td>"."<td>".($rows1['status'])."</td>";
														
												$i++;
											}
											?>
										</tbody>
									</table>
								</div>	
							</div>
							<?php
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