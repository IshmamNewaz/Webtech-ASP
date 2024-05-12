<?php 
session_start();
require_once('../Controllers/assignmentController.php');
require_once('../Controllers/noticeCheckController.php');
if(empty($_SESSION['id'])){
header("location:log.php");
}
else if(isset($_POST['lg-out']))
{
	session_destroy();
	header("location:log.php");

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/user.jpg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar nv-left bg-dark navbar-light ">
                <a href="student.php" class="navbar-brand mx-4 mb-3">
                    <img src="images/EduNext_Logo.svg" class="d-inline-block align-top logo-svg" alt="logo">
                </a>
                <hr class="section-title-hr text-center">
                <div class="navbar-nav w-100">
                    <a href="student.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <a href="assignments.php" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Assignments</a>
                    <a href="financial.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Financials</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- FULL CONENT PAGE -->
        <div class="content">
            <!-- NAV START -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                 <!-- COLLAPSABLE NAVBAR-->
                 <a href="student.php" class="navbar-brand d-flex d-lg-none me-4">
                    <img src="images/EduNext_Logo.svg" class="d-inline-block align-top logo-svg-nav" alt="logo">
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0" style="color: black;">
                    <i class="fa fa-bars"></i>
                </a>
                <!-- COLLAPSABLE NAVBAR END-->
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notice!</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            
                            </div>
                    </div>
                    <!-- NOTIFICATION END-->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['name']?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <form method="POST">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary" name="lg-out">Logut</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- NAV End -->


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Subject wise Assignments</h6>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Assignment Info</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Upload</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                        $assignments = assignment_view($_SESSION['id']);
                                        foreach ($assignments as $res) { ?>
                                            <tr>
                                                <?php if($res['STATUS']=="N"){ ?>
                                                    
                                                    <td><?php echo $res['SUBJECT']?></td>
                                                    <td><?php echo $res['DESCRIPTION']?></td>
                                                    <td><?php echo $res['STATUS']?></td>
                                                    <td><?php echo $res['DEADLINE']?></td>
                                                    <td>
                                                        <form action="../Controllers/uploadController.php" method="POST" enctype="multipart/form-data">
                                                            <input type="file" class="form-control" name="file" id = "file">
                                                            <div class="text-center"><button class="btn btn-primary" value=" <?php echo $res['AID']?>" name="submitAssignment">Submit Assignment</button></div>
                                                            
                                                        </form>    
                                                    </td>
                                                <?php } 
                                                else if ($res['STATUS']=="P"){ ?>
                                                    <td><?php echo $res['SUBJECT']?></td>
                                                    <td><?php echo $res['DESCRIPTION']?></td>
                                                    <td><?php echo $res['STATUS']?></td>
                                                    <td><?php echo $res['DEADLINE']?></td>
                                                    <td>
                                                        <form action="../Controllers/uploadController.php" method="POST" enctype="multipart/form-data">
                                                            <input type="file" class="btn btn-primary" name="file" id = "file" disabled>
                                                            <div class="text-center"><button class="btn btn-primary" value=" <?php echo $res['AID']?>" name="submitAssignment" disabled>Submit Assignment</button></div>
                                                            
                                                        </form>    
                                                    </td>
                                                
                                                <?php } ?>
                                                    
                                            </tr>
                                            
                                    <?php } ?>
                                
                            </tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


             <!-- FOOTER START -->
             <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#" style="color: #be8bb5;">EduNext</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <b>Project Link::</b> <a href="https://github.com/IshmamNewaz/Webtech-ASP">Github</a>
                       
                        </div>
                    </div>
                </div>
            </div>
            <!-- FOOTER END-->
        </div>
        <!-- FULL CONENT PAGE END -->


       <!-- TOP BUTTON RIGHT HAND BOTTOM -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/moment-timezone.min.js"></script>
    <script src="js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>