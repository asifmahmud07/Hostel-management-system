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
		<div id="bg" style="background-image: url('img/hostel-1.jpg'); height:565px;">
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
								header("Location: ../index.php");
							}
						?>
					</ul>
				</div>
			</div>
			<div id="banner"><br><br><br><br><br><br><br>
				<center><div id="form" style="background-color:rgba(255,255,255,0.9);width:60%;"><br>
					<form action="r1.php" method="post" style="width:80%;">
						<center><table>
							<?php
								$q1="select * from room where status='vacant'";
								$run=mysqli_query($a,$q1);
								$row=mysqli_fetch_array($run);
								$rno=$row['rno'];

								$q="select * from room where status='vacant'";
								$run=mysqli_query($a,$q);
								$num=mysqli_num_rows($run);
								if($num>0){
									echo '<center><h2>Number of available rooms: ',$num,'</h2></center>';
									echo '<center><h3>Next available Room No. ',$rno,'</h3></center>';
									?>
							<tr>
								<td><b>Join On</b></td>
								<td><input type="date" name="coin" title="Check in" required></td>
								<td><b>Leave On</b></td>
								<td><input type="date" name="coout" title="Check out" required></td>
							</tr>
							<td>
								<input style="height:30px; width:120px; border-radius:20px; opacity:0.7;" type="submit" name="submit" value="Book">
							</td>

							<?php	}
							else{
								echo "Room not available";
							}
							?>						
						</table></center>
					</form>
					<?php
					
					if(isset($_POST['submit'])){
						$sid=$_SESSION['userId'];
						$coin=$_POST['coin'];
						$coout=$_POST['coout'];

						if(mysqli_query($a,"insert into form(id,rno,cidate,codate) value('$sid','$rno','$coin','$coout')"))
						{
							mysqli_query($a,"update room set status='Booked' where rno=$rno");
							echo "Room Booked";
						}
						else{
							echo "Room Booking Failed";
						}
					}

					?>
				</div></center>
			</div>
		</div>
	</div>
</body>
</html>