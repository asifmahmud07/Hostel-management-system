<?php
include("includes/connection.inc.php");
$sql="SELECT * FROM users INNER JOIN form ON users.idUsers=form.id";
$result=mysqli_query($a,$sql);
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
						<li><a href="ahome.php"><font color="black">Home</font></a></li>
						<li><a href="room.php"><font color="black">Room Update</font></a></li>
						<li><a href="rd.php"><font color="black">Room Details</font></a></li>
						<li><a href="booking.php"><font color="black">Room Booking</font></a></li>
					</ul>
				</div>
			</div>
			<div id="banner">
				<div style="background-color:rgba(255,255,255,0.9);">
					<table>
						<tr>
							<th width="10%" height="50px">ID</th>
							<th width="10%" height="50px">Name</th>
							<th width="10%" height="50px">Department</th>
							<th width="10%" height="50px">Room No.</th>
							<th width="10%" height="50px">E-mail</th>
							<th width="10%" height="50px">Joined on</th>
							<th width="10%" height="50px">Leaving on</th>
							<th width="10%" height="50px">Contact</th>			
						</tr>
						<?php
							if(mysqli_num_rows($result)>0){
								while($row=mysqli_fetch_array($result)){
						?>
						<tr>
							<td width="10%" height="50px"><center><?php echo $row['id']; ?></center></td>
							<td width="10%" height="50px"><center><?php echo $row['nameUsers']; ?></center></td>
							<td width="10%" height="50px"><center><?php echo $row['deptUsers']; ?></center></td>
							<td width="10%" height="50px"><center><?php echo $row['mailUsers']; ?></center></td>
							<td width="10%" height="50px"><center><?php echo $row['cidate']; ?></center></td>
							<td width="10%" height="50px"><center><?php echo $row['codate']; ?></center></td>
							<td width="10%" height="50px"><center><?php echo $row['contact']; ?></center></td>
						</tr>
						<?php
					}
				}
						?>
					</table>
					<
			</div>
		</div>
	</div>

</body>
</html>