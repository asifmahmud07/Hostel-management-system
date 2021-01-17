<?php
include("connection.inc.php");
$rno=$_GET['rno'];
if(mysqli_query($a,"DELETE FROM room where rno='$rno'")){
	header("Location:../rd.php");
}
?>