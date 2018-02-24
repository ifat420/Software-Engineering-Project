<?php
	require_once('../include/initialize.php'); 
	
	if(isset($_GET['sid'])){
		echo $_GET['sid'];
	}
	$sid = $_GET['sid'];
	$req = new Request();
	if($req->librarian_app($sid)){
		redirect_to("librarian_section.php");
	}
	

?>