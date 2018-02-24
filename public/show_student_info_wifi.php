<?php 
    require_once('../include/initialize.php');
    if(isset($_GET['sid'])){
        $std = Student::find_by_id($_GET['sid']);
        $wifi = Wifi::find_by_sid($_GET['sid']);
    }
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet/style.css">

    <title>Student Home</title>
  </head>
  <body>
    <div class="cng-bg">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3 text-center">Student Section</h1>
                <p class="lead text-center">Welcome to student section</p>
            </div>
        </div>

        
    </div>
    

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img alt="student_image" src="image/<?php echo $std->img_name; ?>" alt="..." class="img-thumbnail float-left">
            </div>

            <div class="col-md-9">
                <h4>Name           : <?php echo $std->first_name." ".$std->last_name; ?> </h4>
                <h5>Roll           : <?php echo $std->roll; ?> </h5>
                <h5>Department     : <?php echo $std->dept; ?> </h5>
                <h5>Date-of_birth  : <?php echo $std->roll; ?> </h5>
                <h5>Blood Group    : <?php echo $std->b_group; ?> </h5>
                <h5>Email          : <?php echo $std->email; ?> </h5>
                <h5>Session        : <?php echo $std->session; ?> </h5>
                <h5>Present Address  : <?php echo $std->pre_add; ?> </h5>
                <h5>Permanent Address: <?php echo $std->par_add; ?> </h5>
                <h5>Father name      : <?php echo $std->f_name; ?> </h5>
                <h5>Mother name      : <?php echo $std->m_name; ?> </h5>
                <h5>Mac_Address      : <?php echo $wifi->pc_mac_add; ?> </h5>
                <h5>Mobile_Mac Address      : <?php echo $wifi->mob_mac_add; ?> </h5>
                Signature:  <img height="50" width="200" alt="signature" src="image/<?php echo $std->sig_name;?>" >
            </div>
        </div>
        <?php echo output_message($message); ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>