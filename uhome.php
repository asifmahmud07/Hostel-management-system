<?php
	session_start();
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
		<div style="background-image: url('img/hostel-1.jpg');height:430px;">
			<div id="header">
				<div id="logo">
					<h1><font color="white">NSU Hostels</font></h1>
				</div>
				<div id="nav">
					<ul>
						<li><a href="uhome.php">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Contact Us</a></li>
						<?php
						if(isset($_SESSION['userId'])){
							echo '<form action="includes/logout.inc.php" method="post">
							<li><a href="r1.php">Book Rooms</a></li>
									<br><button type="submit" name="logout-submit" style="width:60px;border-radius:20px; height:25px;opacity:0.8">Logout</button>
								</form>';
						}
						else{
							echo '<form action="includes/login.inc.php" method="post">
							<input type="text" name="sid" placeholder="Student ID..." required>
							<input type="password" name="pwd" placeholder="Password..." required>
							<button type="submit" name="login-submit">Login</button>
							<a href="signup.php">Sign Up</a>
							</form>';
						}
					?>
					</ul>
				</div>
			</div>
			<div id="banner"><br><br><br><br><br><br>
				<center><div style="background-color:rgba(255,255,255,0.9);width:50%;">
					<?php
						echo '<h1><font color="blue">Welcome '.$_SESSION['userId'].'</font></h1>';
					?>
				</div></center>
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