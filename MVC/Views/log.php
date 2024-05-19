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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="icons/EduNext_Logo.ico">
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet" >
    <title>ASP Login Form</title>
  </head>
  <body>
        <div class="container-fluid">
            <form class="mx-auto" method="post" action="../Controllers/logCheckController.php" action=" ../Controllers/StudentController.php">
                <li class="text-center">
                    <a href="../../Index.php"><img src="images/EduNext_Logo.svg" alt="logo"></a>
                </li>
                <hr> 
                <h4 class="text-center responsive-element">LOGIN</h4>
                   
                <div class="mb-3 mt-5">
                  <label class="form-label responsive-element">USER NAME</label>
                  <input type="text" class="form-control" name="id">
                </div>
                <div class="mb-3">
                <label class="form-label responsive-element">PASSWORD</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                </div>
                <button type="submit" class="btn btn-outline-primary" name="login"><b>LOGIN</b></button>
                <?php
                    if(!empty($AuthError)){
                      ?>
                      <h5 class="text-center"><?php echo $AuthError?></h5>
                      <?php
                    }
                  ?>
                
              </form>
        </div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>