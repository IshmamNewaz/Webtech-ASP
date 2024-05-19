<?php 
session_start();
require('../Models/ViewAllusers.php');
if(empty($_SESSION['id'])){
header("location:index.php");
}
else if(isset($_GET['out']))
{
	session_destroy();
	header("location:index.php");

}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="icons/EduNext_Logo.ico">
    
	<title></title>
</head>
<body>	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="images/EduNext_Logo.svg" alt="" width="200" height="50"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <li class="nav-item" style="list-style-type: none; "  style="width: 100px">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin.php"><b>HOME</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="notice.php"><b>NOTICE SECTION</b></a>
        </li>
        <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <b ><?php echo $_SESSION['name']?></b>	
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profile Manager</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
				<form>
					<button class="btn" style= "width: 100%;" name="out">LOG OUT</button>
				</form>
			</li>
          </ul>
        </li>
      </ul>

    </div>
    </li>
  </div>
</nav>
	 
	<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h2 class="mb-4 text-center">------USER LIST------</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">TYPE</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    $result = view_users();
                                    foreach($result as $fields){?>
                                    <tr>
                                      <td><?php echo $fields['ID']?></td>
                                      <td><?php echo $fields['NAME']?></td>
                                      <td><?php echo $fields['TYPE']?></td>
                                      <form method="POST" action="../Controllers/deleteUsers.php">
                                        <td><div class="text-center"><button class="btn btn-primary" value="<?php echo $fields['ID']?>" name="ud" >Delete</button></div></td>
                                      </form>
                                      
                                    </tr>

                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
  </div>
  
  <div class="container-fluid pt-4 px-4">
    <h2 class="mb-4 text-center">------STUDENT ENTRY------</h2>
    <div class="row g-4">
      <form action="../Controllers/inputStudent.php" method="POST" class="row g-4">
        <div class="col-sm-12 col-xl-3">
            <div class="bg-light rounded h-100 p-4">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ID</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="st-id">
              </div>        
            </div>
        </div>
        <div class="col-sm-12 col-xl-3">
          <div class="bg-light rounded h-100 p-4">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">NAME</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="st-name">
            </div>                                    
          </div>
        </div>
        <div class="col-sm-12 col-xl-3">
          <div class="bg-light rounded h-100 p-4">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="st-pass">
            </div>                                    
          </div>
        </div>
        <div class="col-sm-12 col-xl-3">
          <div class="bg-light rounded h-100 p-4">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Class</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="st-class">
            </div>                                    
          </div>
        </div>
        <div class="col-sm-12 col-xl-3">
          <div class="bg-light rounded h-100 p-4">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Section</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="st-sec">
            </div>                                    
          </div>
        </div>
        <div class="col-sm-12 col-xl-3">
          <div class="bg-light rounded h-100 p-4">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Email</label>
              <input type="email" class="form-control" id="exampleInputPassword1" name="st-email">
            </div>                                    
          </div>
        </div>
        <div class="col-sm-12 col-xl-3">
          <div class="bg-light rounded h-100 p-4">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Mobile</label>
              <input type="number" class="form-control" id="exampleInputPassword1" name="st-number">
            </div>                                    
          </div>
        </div>
        <div class="text-center"><button class="btn btn-primary" style="width: 100px" >Submit</button></div>
      </form>                
    </div>
  </div>

  <div class="container-fluid pt-4 px-4">
    <h2 class="mb-4 text-center">------TEACHERS ENTRY------</h2>
    <div class="row g-4">
      <form action="../Controllers/inputTeachersController.php" method="POST" class="row g-4">
        <div class="col-sm-12 col-xl-3">
            <div class="bg-light rounded h-100 p-4">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">ID</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="t-id">
              </div>        
            </div>
        </div>
        <div class="col-sm-12 col-xl-3">
          <div class="bg-light rounded h-100 p-4">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">NAME</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="t-name">
            </div>                                    
          </div>
        </div>
        <div class="col-sm-12 col-xl-3">
          <div class="bg-light rounded h-100 p-4">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="t-pass">
            </div>                                    
          </div>
        </div>
       
        <div class="col-sm-12 col-xl-3">
          <div class="bg-light rounded h-100 p-4">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Email</label>
              <input type="email" class="form-control" id="exampleInputPassword1" name="t-email">
            </div>                                    
          </div>
        </div>
        <div class="col-sm-12 col-xl-3">
          <div class="bg-light rounded h-100 p-4">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Mobile</label>
              <input type="number" class="form-control" id="exampleInputPassword1" name="t-number">
            </div>                                    
          </div>
        </div>
        <div class="text-center"><button class="btn btn-primary" style="width: 100px" >Submit</button></div>
      </form>                
    </div>
  </div>
	
	
	<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
		

</body>
</html>

