<?php 
    require_once('../include/initialize.php');

    $idcard_reqs = Request::req_for_idcard_provost();
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
                <h1 class="display-3 text-center">Chairman Section</h1>
                <p class="lead text-center">Welcome to Chairman section</p>
            </div>
        </div>
    </div>
    

    <div class="container">

        <?php foreach ($idcard_reqs as $id_req): ?>
                   <div class="card">
                      <h5 class="card-header">Idcard Request</h5>
                      <div class="card-body">
                        <h5 class="card-title text-center">Request For Id Card</h5>
                        <a href="idcard_approve_provost.php?sid=<?php echo $id_req->s_id; ?>" class="btn btn-primary">Approve</a>
                        <!-- <div class="text-right"> -->
                            <a href="show_student_info.php?sid=<?php echo $id_req->s_id; ?>" class="btn btn-primary" style="float: right;">Show Info</a>
                       <!--  </div> -->
                        
                      </div>
                    </div>
        <?php endforeach; ?>



        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>