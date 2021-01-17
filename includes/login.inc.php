<?php
if(isset($_POST['login-submit'])){
	require 'dbh.inc.php';

	$uid = $_POST['sid'];
	$password = $_POST['pwd'];

	$sql = "SELECT * FROM users WHERE idUsers=?";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)){
		header("Location: ../index.php?error=sqlerror");
		exit();
	}
	else{
		mysqli_stmt_bind_param($stmt, "s", $uid);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);
		if($row = mysqli_fetch_assoc($result)){
			$pwdCheck = password_verify($password, $row['pwdUsers']);
			if($pwdCheck==false){
				header("Location: ../index.php?error=wrongpwd");
				exit();
			}
			else if($pwdCheck==true){
				session_start();
				$_SESSION['userId'] = $row['idUsers'];

				header("Location: ../uhome.php?login=success");
				exit();
			}
		}
		else{
			header("Location: ../index.php?error=nouser");
			exit();
		}
	}

}
else{
	header("Location: ../login.php");
	exit();
}