<?php 
session_start();
require_once('../Controllers/financeController.php');
if(empty($_SESSION['id'])){
header("location:log.php");
}
else if(isset($_POST['lg-out']))
{
	session_destroy();
	header("location:log.php");

} 
global $right;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Financials</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="icons/EduNext_Logo.ico" rel="icon">

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
       <!-- SIDEBAR START -->
       <div class="sidebar pe-4 pb-3">
        <nav class="navbar nv-left bg-dark navbar-light ">
            <a href="student.php" class="navbar-brand mx-4 mb-3">
                <img src="images/EduNext_Logo.svg" class="d-inline-block align-top logo-svg" alt="logo">
            </a>
            <hr class="section-title-hr text-center">
                <div class="navbar-nav w-100">
                    <a href="student.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="assignments.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Assignment</a>
                    <a href="financial.php" class="nav-item nav-link active"><i class="fa fa-chart-bar me-2"></i>Financials</a>
                    <a href="mail.php" class="nav-item nav-link"><i class="fa fa-book-open me-2"></i>Help Section</a>
                    
                </div>
            </nav>
        </div>
        <!-- SIDEBAR END -->


        <!-- FULL CONTENT PAGE START -->
        <div class="content">
            <!-- NAV Start -->
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
                        <h1 class="mb-4 text-center">School Fees</h1>
                        <h6 class="mb-4 ">Please select a Bank for payment:</h6>
                        <form method="POST" action="../../MVC/Views/generate.php">
                            <select class="form-select" aria-label="Default select example" name="bank-option">
                                <option value = "NULL" selected>Select Back</option>
                                <option value="Dhaka Bank">Dhaka Bank</option>
                                <option value="UCB Branch">United Commercial Bank</option>
                                <option value="City Bank">City Bank</option>
                            </select>
                            <hr>
                            <div class="text-center"><button class="btn btn-primary">Download Slip</button></div>
                        </form>
                        <div class="text-center"><?php if($right==false){ echo "Please Select Bank!";} ?></div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Month Name</th>
                                    <th scope="col">Fees</th>
                                    <th scope="col">Others</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                 <?php $i =0;
                                    while($i<12){ ?>
                                        <tr>
                                            <td><?php echo month_print()[$i]?></td>
                                            <td><?php echo financial_status($_SESSION['id'])[$i+2]?></td>
                                            <td><?php echo financial_other_status($_SESSION['id'])[$i+2]?></td>
                                            <?php if((financial_status($_SESSION['id'])[$i+2]+financial_other_status($_SESSION['id'])[$i+2])==0){ ?>
                                                <td>Paid</td>
                                            <?php } 
                                            else { ?>
                                                <td>Unpaid</td>
                                            <?php } ?>
                                                
                                        </tr>
                                        
                                <?php $i=$i+1; } ?>
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
                            <b>Project Link:</b> <a href="https://github.com/IshmamNewaz/Webtech-ASP">Github</a>
                       
                        </div>
                    </div>
                </div>
            </div>
            <!-- FOOTER END-->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/moment-timezone.min.js"></script>
    <script src="js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>