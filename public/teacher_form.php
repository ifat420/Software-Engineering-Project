
<?php 
  require_once('../include/initialize.php');
  if(isset($_POST['submit'])){
  	 $teacher = new Teacher();

     $teacher->name = $_POST['name'];
     $teacher->position = $_POST['position'];

     if($teacher->save()){
     	
     }else{

     }
  }

?>
<?php echo $message ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      span{
        position: absolute;
      }
    </style>
    <title>Teacher Form</title>
  </head>
  <body>
    <div class="container">
        <h3 class="text-center display-4">Teacher Information Form</h3>
        <form action="teacher_form.php" enctype="multipart/form-data" method="POST">
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label text-center">Name:</label>
            <div class="col-sm-10 ">
              <input type="text" name="name"  id="staticEmail" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-center">Position:</label>
            <div class="col-sm-10">
              <input type="text" name="position" class="form-control" id="inputPassword">
            </div>
          </div>

          <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label text-center"></label>
            <div class="col-sm-10">
              <div class="custom-file">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Submit" />
              </div>
            </div>
          </div>
        </form>
        

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>