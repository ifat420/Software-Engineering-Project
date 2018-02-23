<?php
	require_once('../include/initialize.php'); 
	
	if(isset($_GET['sid'])){
		echo $_GET['sid'];
	}
	$sid = $_GET['sid'];
	$req = Request::find_by_sid($sid);
	echo $req->id;

?>