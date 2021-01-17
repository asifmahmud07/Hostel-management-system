<?php
	session_start();
	include("includes/connection.inc.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hostel Management</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="img/logo.png" type="img/icon" rel="icon">
</head>
<body>
	<div id="full">
		<div style="background-image: url('img/hostel-1.jpg');">
			<div id="header">
				<div id="logo">
					<h1><font color="white">NSU Hostels</font></h1>
				</div>
				<div id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact Us</a></li>
						<?php
						if(isset($_SESSION['userId'])){
							header("Location: ../uhome.php");
						}
						else{
							echo '<form action="includes/login.inc.php" method="post">
							<input type="text" name="sid" placeholder="Student ID..." required>
							<input type="password" name="pwd" placeholder="Password..." required>
							<button type="submit" name="login-submit" style="width:50px;border-radius:20px; height:25px;opacity:0.8">Login</button>
							</form>';
						}
					?>
					</ul>
				</div>
			</div>
			<div id="banner">
				<center><div style="background:rgba(255,255,255,.9);width:75%;"><br>
					<h2>Sign Up</h2>
					<?php
						if(isset($_GET["error"])){
							if($_GET["error"] == "passwordcheck"){
								echo '<p class="signuperror">Your passwords do not match</p>';
							}
							else if($_GET["error"] == "idtaken"){
								echo '<p class="signuperror">User already exists</p>';
							}
						}
					?>
					<form action="includes/signup.inc.php" method='post' style="width:80%;">
						<table>
							<tr>
								<td ><b>Student Name</b></td>
								<td><input type="text" name="uname" placeholder="Student Name..." required></td>
							</tr>
							<tr>
								<td><b>Student ID</b></td>
								<td><input type="text" name="uid" placeholder="Student ID..." required></td>
								<td><b>Department</b></td>
								<td><input type="text" name="dept" placeholder="Depratment..." required></td>
							</tr>
							<tr>
								<td><b>Email</b></td>
								<td><input type="text" name="mail" placeholder="Email..." required></td>
								<td><b>Contact No.</b></td>
								<td><input type="text" name="contact" placeholder="Contact No..." required></td>
							</tr>
							<tr>
								<td><b>Password</b></td>
								<td><input type="password" name="pwd" placeholder="Password..." required></td>
								<td><b>Confirm Password</b></td>
								<td><input type="password" name="pwd-repeat" placeholder="Confirm Password..." required></td>
							</tr>
							<tr>
								<td><input type="submit" name="signup-submit" value="Sign Up" style="width:90px;border-radius:30px; height:35px;opacity:0.8"></td>
							</tr>
						</table>
					</form>
				</div></center>
			</div>
		</div>
	</div>
	<div id="welcome">
			<h1 align="center"><font color="red">North South University</h1>
			<center><font size="4">
				Center of Excellence in Higher Education
			</font></center>
		</div>
	</div>
</body>
</html>