<?php
if(isset($_POST['signup-submit'])){

	require 'dbh.inc.php';

	$userid = $_POST['uid'];
	$username = $_POST['uname'];
	$contact =  $_POST['contact'];
	$department = $_POST['dept'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];

	if($password !== $passwordRepeat){
		header("Location: ../signup.php?error=passwordcheck&uid=".$userid."&mail=".$email);
		exit();
	}
	else{
		$sql = "SELECT idUsers FROM users WHERE idUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $userid);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0){
				header("Location: ../signup.php?error=idtaken");
				exit();
			}
			else{
				$sql = "INSERT INTO users (idUsers, nameUsers, contact,deptUsers, mailUsers, pwdUsers) VALUES (?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);

				if (!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../signup.php?error=sqlerror");
					exit();
				}
				else{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ssssss", $userid, $username, $contact, $department, $email, $hashedPwd);
					mysqli_stmt_execute($stmt);
					header("Location: ../signup.php?signup=success");
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../signup.php");
	exit();
}