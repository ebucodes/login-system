<?php
	//ob_start();
	include ("config.php");
	session_start(); 
	
	if(!isset($_SESSION["id"])){
		header("location:index.php");
	}else{
		$session_id=$_SESSION["id"];
		$query = "SELECT * FROM user WHERE id = '$session_id'" or die(mysqli_errno($conn));
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
	}
?>
