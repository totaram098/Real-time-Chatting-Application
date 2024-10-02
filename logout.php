<?php 
	session_start();
	extract($_SESSION['user_data']);
	require_once('require/database.php');
	$query = "UPDATE users SET is_online = false WHERE user_id = '{$user_id}'";
	$database->execute_query($query);
	session_destroy();
	header("location:index.php?msg=Logout Successfully..!&color=orangered");
?>