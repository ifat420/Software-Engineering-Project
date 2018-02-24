<?php
	require_once('../include/initialize.php'); 
	
	if(isset($_GET['sid'])){
		echo $_GET['sid'];
	}
	$sid = $_GET['sid'];
	$req = new Request();
	if($req->chairman_app_idcard($sid)){
		redirect_to("teacher_home.php");
	}
	

?>