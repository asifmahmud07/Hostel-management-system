<?php
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
			<div id="banner"><br><br><br><br>
				<center><div style="background-color:rgba(255,255,255,0.9);width:90%;">
					<table>
						<tr>
							<th>Room No.</th>
							<th>Room Type</th>
							<th>Price</th>
							<th>Status</th>
							<th>Delete</th>
							<th>Vacate</th>
						</tr>
						<?php
							$q1="select * from room";
							$run=mysqli_query($a,$q1);
							while($row=mysqli_fetch_array($run)){
								$rno=$row['rno'];
								$type=$row['type'];
								$price=$row['price'];
								$status=$row['status'];
						?>
						<tr>
							<td><center><?php echo $rno; ?></center></td>
							<td><center><?php echo $type; ?></center></td>
							<td><center><?php echo $price; ?></center></td>
							<td><center><?php echo $status; ?></center></td>
							<td><center><a style="color:blue" href="includes/delete.inc.php? rno=<?php echo $rno; ?>" onclick='return checkdelete()'>Delete</a></center></td>
							<td><center><a style="color:blue" href="includes/co.inc.php? rno=<?php echo $rno; ?>">Vacate</a></center></td>
						</tr>
						<?php
					}
						?>
					</table>
				</div></center>
			</div>
		</div>
	</div>
<script>
	function checkdelete(){
		return Confirm('Are you sure you want to delete this record?');
	}
</script>
</body>
</html>