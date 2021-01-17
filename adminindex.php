<?php
	include("includes/connection.inc.php");
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
		<div style="background-image: url('img/hostel-2.jpg');height:560px;">
			<div id="header">
				<div id="logo">
					<h1><font color="black">Admin Panel</font></h1>
				</div>
				<div id="nav">
					<ul>
						<li><a href="index.php"><font color="black">Home</font></a></li>
						<li><a href="#"><font color="black">About</font></a></li>
					</ul>
				</div>
			</div>
			<div id="banner"><br><br><br><br><br><br><br><br>
				<center><div style="background:rgba(255,255,255,.9);width:60%;">
					<form action="ahome.php" method="post">
						<table>
							<tr>
								<td width="50%" height="50px"><b>Username</b></td>
								<td><input type="text" name="un" placeholder="Enter Username" title="Enter Username" required></td>
							</tr>
							<tr>
								<td width="50%" height="50px"><b>Password</b></td>
								<td><input type="password" name="ps" placeholder="Enter Password" title="Enter Password" required></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="sub" value="Login" style="width:100px;border-radius:30px; height:50px;opacity:0.8"></td>
							</tr>
						</table>
					</form>
					<?php
					if(isset($_POST['sub'])){
						$un=$_POST['un'];
						$ps=$_POST['ps'];
						$q1="select * from admin1";
						$run=mysqli_query($a,$q1);
						$row=mysqli_fetch_array($run);
						$u=$row['un'];
						$p=$row['ps'];
						if($un==$u && $ps==$p){
							header("Location:ahome.php");
						}
						else{
							header("Location:index.php?wrong user/pass");
						}
					}
					?>
			</div>
		</div>
	</div>

</body>
</html>