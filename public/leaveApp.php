
<!DOCTYPE html>
<html>
<head>
	<title>Leave Application</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title">
	<link rel="stylesheet" href="css/styles.css" type="text/css" />
	<style media="screen">
		p, 	.form-control {
			font-size: 16px;
			line-height: 20px;
		}
		.lapp {
			margin-top: 70px;
		}
	</style>
</head>

<body>

	<?php include 'dbcon.php';?>
	<?php include 'functions.php';?>
	<?php $sID = 12; 
				$dt = date("d M, Y");
				$flag = false;
				getInfo($conn, $sID, $dep, $roll, $sess, $name);
	 ?>

	 <?php if(isset($_POST['send'])) {
 					$flag = true;

 					if(!empty($_POST['des']))  {
 						 $des = strip_tags( trim( $_POST['des'] ) );
 					}

 					if ($flag) {
 						addNewApp($sID, $dt, $des, $conn);
 					}
 			}
 	?>

	<div class="container-fluid lapp">
		<div class="container">

			<?php if($flag == false) { ?>
			<p>Date: <?php echo $dt ?></p>
			<p>The Head of Department <br>
			   Department of <?php echo $dep ?> <br>
			   Jessore University of Science and Technology <br>
			   <strong>Subject:</strong> Application for leave of absence. <br> </p>
			<p>Dear Sir,<br>
				<form class="" action="leaveApp.php" method="post">
					<div class="form-group">
				    <textarea name="des" class="form-control" id="exampleTextarea" rows="4" >I have the honor to state that I am a regular student of this university. I couldn’t attend in my classes from 30th September 20.. to 17th October 20.. due to my sickness. I am attaching doctor’s advice papers photocopy herewith.&#13;I, therefore, pray and hope that you will be kind enough to consider my problem & grant my application for the said classes and oblige thereby.
				    </textarea>
				  </div>

					<p>Yours sincerely, <br>
					Name:  <?php echo $name; ?><br>
					Roll No:  <?php echo $roll; ?><br>
					Session: <?php echo $sess; ?></p>
					<br>
					<div class="form-group">
						<div class="col-md-12" style="text-align: left; padding: 0">
							<input style="" class="btn  btn-secondary" type="submit" name="send" value="Send">
						</div>
					</div>
				</form>

			<?php } else { ?>
				<div class="container text-center">
					<h1 class="text-center">Request confirmed!!</h1>
					<a class="btn btn-primary" style="margin-top: 50px;" href="/student_home">Go Back</a>
				</div>
			<?php } ?>
		</div>
	</div>



<!-- javascript -->
	<script src="https://use.fontawesome.com/af2ef8a49b.js"></script>
	<script src="js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="js/myScript.js"></script>
</body>
</html>
