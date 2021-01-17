<?php
include("connection.php");
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
		<div id="bg" style="background-image: url('img/hostel.jpg');height:800px;">
			<div id="header">
				<div id="logo">
					<h1><font color="white">Admin Panel</font></h1>
				</div>
				<div id="nav">
					<ul>
						<li><a href="ahome.php"><font color="black">Home</font></a></li>
						<li><a href="room.php"><font color="black">Room Update</font></a></li>
						<li><a href="rd.php"><font color="black">Room Details</font></a></li>
						<li><a href="booking.php"><font color="black">Room Booking</font></a></li>
					</ul>
				</div>
			</div>
			<div id="banner">
				<center><div id="form">
					<form action="room.php" method="post">
						<table>
							<tr>
								<td><b><font color="aqua">Room No.</font></b></td>
								<td><input type="text" name="rno" placeholder="Enter Room No." title="ID" required></td>
							</tr>
							<tr>
								<td><b><font color="aqua">Room Type</font></b></td>
								<td><input type="text" name="type" placeholder="Enter Room Type" title="Name" required></td>
							</tr>
							<tr>
								<td><b><font color="aqua">Room Price</font></b></td>
								<td><input type="text" name="price" placeholder="Enter Price" title="E-mail" required></td>
							</tr>
							<td>
								<input style="height:30px; width:120px; border-radius:20px; opacity:0.7;" type="submit" name="submit" value="Submit">
							</td>
						</table>
					</form>
					<?php
					if(isset($_POST['submit'])){
						$rno=$_POST['rno'];
						$type=$_POST['type'];
						$p=$_POST['price'];
						if(mysqli_query($a,"insert into room(rno,type,price) value('$rno','$type','$p')")){
							echo "Data inserted";
						}
						else{
							echo "Data insertion failed";
						}
					}
					?>
				</div></center>
			</div>
		</div>
	</div>
</body>
</html>