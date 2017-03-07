<?php
	session_start();
	if(isset($_SESSION['email'])){
		header('location:home.php?module=homeuser');
	} else{
		header('location:home.php?module=home');
		die();
	}
?>