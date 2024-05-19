<?php 
session_start();
$AuthError = [];
if(isset($_SESSION['AuthError'])){
  $AuthError= $_SESSION['AuthError'];
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="./styles/log.style.css" rel="stylesheet" >
    <link rel="icon" type="image/x-icon" href="icons/EduNext_Logo.ico">
    <title>Login</title>
  </head>
  <body>
        <div class="container-fluid">
            <form class="mx-auto" method="post" action="../Controllers/logCheckController.php" action=" ../Controllers/StudentController.php">
                <h4 class="text-center">Login</h4>
                <div class="mb-3 mt-5">
                  <label for="exampleInputEmail1" class="form-label">User Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                  <div id="emailHelp" class="form-text mt-3">Forget password ?</div>
                </div>
              
                <button type="submit" class="btn btn-primary mt-5" name="login">Login</button>
              </form>
        </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>