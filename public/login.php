<?php 
    require_once('../include/initialize.php');


    if($session->is_logged_in()){
        redirect_to("student_home.php");
    }

    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $found_student = Student::authenticate($username, $password);
        if($found_student){
            $session->login($found_student);
            $session->message("Log in Successfully");
            redirect_to("student_home.php");
        }
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

    <title>logged in</title>
  </head>
  <body>
        <div class="jumbotron">
            <h3 class="display-3 text-center">Please Sign In</h3>
        </div>
        <form action="login.php" method="POST">
           <div class="form-group row justify-content-md-center">
                <label for="inputPassword" class="col-sm-1 col-form-label text-center text-center">Username:</label>
                <div class="col-sm-3">
                <input type="text" name="username" class="form-control">
                </div>
           </div>

           <div class="form-group row justify-content-md-center">
                <label for="inputPassword" class="col-sm-1 col-form-label text-center text-center">Password:</label>
                <div class="col-sm-3">
                <input type="password" name="password" class="form-control">
                </div>
           </div>

           <div class="form-group row justify-content-md-center">
                <label for="inputPassword" class="col-sm-1 col-form-label text-center text-center"></label>
                <div class="col-sm-3">
                    <input type="submit" name="submit" class="btn btn-primary" value="LogIn" >
                    or <a href="student_form.php">Sign Up</a>
                </div>
           </div>

           <?php  echo output_message($message); ?>
        </form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>