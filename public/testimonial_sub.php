<?php 
	require_once('../include/initialize.php');
	if(isset($_GET['sid'])){
		$sid = $_GET['sid'];
		$req = new Request();
		$req->request_for_testimonial($sid);
		redirect_to("testimonial.php");
	}
	
?>