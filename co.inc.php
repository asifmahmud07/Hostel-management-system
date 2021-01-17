<?php
include("connection.inc.php");
$rno=$_GET['rno'];
if(mysqli_query($a,"update room set status='Vacant' where rno=$rno")){
	header("Location:../rd.php");
}
?>