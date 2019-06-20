<?php
	require_once('connection.php');
	if ($connect) {
		if (isset($_POST['submit'])) {
			
			$firstname=($_POST['firstname']);
			$lastname=($_POST['lastname']);
			$time=($_POST['time']);
			$number=($_POST['number']);
			$email=($_POST['email']);
			$description=($_POST['description']);
			$date=($_POST['date']);
			$status='unconfirmed';

			$sql1="SELECT * FROM appointments WHERE date = '$date' AND time = '$time'";
			$result1=mysqli_query($connect,$sql1);
			if ($rows1=mysqli_fetch_array($result1)) {
				echo "<script>alert('ALREADY BOOKED.. please choose another date or time');</script>";
			}
			else{
				$sql="INSERT INTO appointments VALUES (NULL, '$firstname', '$lastname', '$email', '$number', '$description', '$time', '$date','$status')";
				$status=mysqli_query($connect,$sql);
				if ($status) {
					echo "<script>alert('thank you alert upon form submission, we will notify you as soon as possible.... ');</script>";
					?>
					<meta http-equiv="refresh" content="0; index.php">
					<?php
				}
				else{
					echo "<script>alert('something wrong....');</script>";
				}
			}
		}
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Appointment Booking Form</title>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

			<link rel="stylesheet" type="text/css" href="css/index.css">

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
			<div class="container-fluid text-center">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<form class="form-container" method="POST">
							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
							    	<label>Firstname</label>
								</div>
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
						    		<input type="text" class="form-control" name="firstname" placeholder="Firstname" required="">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
						    		<label>Lastname</label>
								</div>
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
						    		<input type="text" class="form-control" name="lastname" placeholder="Lastname" required="">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<label>Email</label>
								</div>
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
							   		<input type="email" class="form-control" name="email" placeholder="Email" required="">
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
						    		<label>Phone no.</label>
								</div>
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<input type="number" class="form-control" name="number" placeholder="Phone no." required="">
								</div>
							</div>
							<div class="form-group text-left">
						    	<label for="description">Description</label>
						    	<textarea id="description" name="description" placeholder="Write something.." style="height:100px; width: 100%;" required="" class="form-control"></textarea>
							</div>
							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<label>Time</label>
								</div>
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
						    		<select name="time" class="form-control time" required="">
										<option selected disabled hidden>-----</option>
										<option value="9:00 - 9:15">9:00 - 9:15</option>;
										<option value="9:15 - 9:30">9:15 - 9:30</option>;
										<option value="9:30 - 9:45">9:30 - 9:45</option>;
										<option value="9:45 - 10:00">9:45 - 10:00</option>;
										<option value="10:00 - 10:15">10:00 - 10:15</option>;
										<option value="10:15 - 10:30">10:15 - 10:30</option>;
										<option value="10:30 - 10:45">10:30 - 10:45</option>;
										<option value="10:45 - 11:00">10:45 - 11:00</option>;
										<option value="11:00 - 11:15">11:00 - 11:15</option>;
										<option value="11:15 - 11:30">11:15 - 11:30</option>;
										<option value="11:30 - 11:45">11:30 - 11:45</option>;
										<option value="11:45 - 12:00">11:45 - 12:00</option>;
										<option value="12:00 - 12:15">12:00 - 12:15</option>;
										<option value="12:15 - 12:30">12:15 - 12:30</option>;
										<option value="12:30 - 12:45">12:30 - 12:45</option>;
										<option value="12:45 - 13:00">12:45 - 13:00</option>;
										<option value="13:00 - 13:15">13:00 - 13:15</option>;
										<option value="13:15 - 13:30">13:15 - 13:30</option>;
										<option value="13:30 - 13:45">13:30 - 13:45</option>;
										<option value="13:45 - 14:00">13:45 - 14:00</option>;
										<option value="14:00 - 14:15">14:00 - 14:15</option>;
										<option value="14:15 - 14:30">14:15 - 14:30</option>;
										<option value="14:30 - 14:45">14:30 - 14:45</option>;
										<option value="14:45 - 15:00">14:45 - 15:00</option>;
										<option value="15:00 - 15:15">15:00 - 15:15</option>;
										<option value="15:15 - 15:30">15:15 - 15:30</option>;
										<option value="15:30 - 15:45">15:30 - 15:45</option>;
										<option value="15:45 - 16:00">15:45 - 16:00</option>;
										<option value="16:00 - 16:15">16:00 - 16:15</option>;
										<option value="16:15 - 16:30">16:15 - 16:30</option>;
										<option value="16:30 - 16:45">16:30 - 16:45</option>;
										<option value="16:45 - 17:00">16:45 - 17:00</option>;
										<option value="17:00 - 17:15">17:00 - 17:15</option>;
										<option value="17:15 - 17:30">17:15 - 17:30</option>;
										<option value="17:30 - 17:45">17:30 - 17:45</option>;
										<option value="17:45 - 18:00">17:45 - 18:00</option>;
										<option value="18:00 - 18:15">18:00 - 18:15</option>;
										<option value="18:15 - 18:30">18:15 - 18:30</option>;
										<option value="18:30 - 18:45">18:30 - 18:45</option>;
										<option value="18:45 - 19:00">18:45 - 19:00</option>;
										<option value="19:00 - 19:15">19:00 - 19:15</option>;
										<option value="19:15 - 19:30">19:15 - 19:30</option>;
										<option value="19:30 - 19:45">19:30 - 19:45</option>;
										<option value="19:45 - 20:00">19:45 - 20:00</option>;
										<option value="20:00 - 20:15">20:00 - 20:15</option>;
										<option value="20:15 - 20:30">20:15 - 20:30</option>;
										<option value="20:30 - 20:45">20:30 - 20:45</option>;
										<option value="20:45 - 21:00">20:45 - 21:00</option>;
									</select>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
							    	<label>Date</label>
								</div>
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
						    		<input type="date" class="form-control date" name="date" required="">
								</div>
							</div>
							<button name="submit" class="btn btn-success btn-block submit">Book an Appointment</button>
						</form>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>	
				</div>
			</div>
			<script>
				var today = new Date().toISOString().split('T')[0];
    			document.getElementsByName("date")[0].setAttribute('min', today);
			</script>
		</body>
		</html>
		<?php
	}
?>