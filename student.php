<?php 
require_once('../Controllers/StudentController.php');
require('../Controllers/noticeCheckController.php');
if(empty($_SESSION['id'])){
header("location:log.php");
}
if(isset($_POST['lg-out']))
{
	session_destroy();
	header("location:log.php");

}
call_for_marks($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard Student</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="icons/EduNext_Logo.ico" rel="icon">

    
    <!-- Icon Font Stylesheet REMEBER TO CONNECT TO INTERNET-->
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
                    <a href="student.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="assignments.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Assignment</a>
                    <a href="financial.php" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Financials</a>
                    <a href="mail.php" class="nav-item nav-link"><i class="fa fa-book-open me-2"></i>Help Section</a>
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


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
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" >
                            See The latest Notice
                        </a>

                        <ul class="dropdown-menu bg-light" aria-labelledby="dropdownMenuLink" >
                            <?php 
                                $notice= notice_view();
                                foreach($notice as $notice_result){ ?>
                                    <h6 class="fw-normal mb-0"><li style="width: 200px"><a class="dropdown-item no-overflow-text" href="#"><?php echo $notice_result['DESCRIPTION'] ?></a></li></h6>
                                    <hr class="dropdown-divider">
                            <?php } ?>
                                
                        </ul>
                    </div>
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



            <!-- SUBJECT WISE MARKING START -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Subject Wise Marking</h6>
                            </div>
                            <canvas id="SubjectWiseMarking"></canvas>
                        </div>
                    </div>
                    
                </div>
            </div>      
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Week Class Schedule</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Day</th>
                                    <th scope="col">Bangla 1st</th>
                                    <th scope="col">Bangla 2nd</th>
                                    <th scope="col">English 1st</th>
                                    <th scope="col">English 2nd</th>
                                    <th scope="col">G.Math</th>
                                    <th scope="col">Physics</th>
                                    <th scope="col">H.Math</th>
                                    <th scope="col">Religion</th>
                                    <th scope="col">ICT</th>
                                    <th scope="col">BGS</th>
                                    <th scope="col">Chemistry</th>
                                    <th scope="col">Biology</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
								<?php 
									$i=0;
									while($res=mysqli_fetch_assoc($schedule)){
								?>
									<tr>
										<td> <?php echo $res['DAY']?> </td>
										<td><?php echo $res['BAGNLA_1ST'] ?></td>
										<td><?php echo $res['BAGNLA_2ND'] ?></td>
										<td><?php echo $res['ENGLISH_1ST'] ?></td>
										<td><?php echo $res['ENGLISH_2ND'] ?></td>
										<td><?php echo $res['G_MATH'] ?></td>
										<td><?php echo $res['PHYSICS'] ?></td>
										<td><?php echo $res['H_MATH'] ?></td>
										<td><?php echo $res['RELIGION'] ?></td>
										<td><?php echo $res['ICT'] ?></td>
										<td><?php echo $res['BGS'] ?></td>
										<td><?php echo $res['CHEMISTRY'] ?></td>
										<td><?php echo $res['BIOLOGY']?></td>
									</tr>

								<?php $i=$i+1;} ?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- SUBJECT WISE MARKING END -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                
                </div>
            </div>
            <!-- Widgets End -->
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
        <!-- FULL CONTENT PAGE END -->


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

    <!-- CHART FOR MARKING -->
    
    <script>
        var ctx1 = $("#SubjectWiseMarking").get(0).getContext("2d");
    var myChart1 = new Chart(ctx1, {
        type: "bar",
        data: {
            labels: ["Bangla 1st", "Bangla 2nd", "English 1st", "English 2nd", "G.Math", "Religion", "H.Math", "Chemsitry", "Physics", "Biology", "ICT", "BGS"],
            datasets: [{
                    label: "Pre-Test",
                    data: [<?php echo $resutl_Pre_test[0]?>, <?php echo $resutl_Pre_test[1]?>, <?php echo $resutl_Pre_test[2]?>, <?php echo $resutl_Pre_test[3]?>, <?php echo $resutl_Pre_test[4]?>, <?php echo $resutl_Pre_test[5]?>, <?php echo $resutl_Pre_test[6]?>, <?php echo $resutl_Pre_test[7]?>, <?php echo $resutl_Pre_test[8]?>, <?php echo $resutl_Pre_test[9]?>, <?php echo $resutl_Pre_test[10]?>, <?php echo $resutl_Pre_test[11]?>,],
                    backgroundColor: "#b970ab"
                },
                {
                    label: "Test",
                    data: [<?php echo $resutl_test_test[0]?>, <?php echo $resutl_test_test[1]?>, <?php echo $resutl_test_test[2]?>, <?php echo $resutl_test_test[3]?>, <?php echo $resutl_test_test[4]?>, <?php echo $resutl_test_test[5]?>, <?php echo $resutl_test_test[6]?>, <?php echo $resutl_test_test[7]?>, <?php echo $resutl_test_test[8]?>, <?php echo $resutl_test_test[9]?>, <?php echo $resutl_test_test[10]?>, <?php echo $resutl_test_test[11]?>,],
                    backgroundColor: "#3d2a74"
                },
                {
                    label: "Final Term",
                    data: [<?php echo $resutl_final_test[0]?>, <?php echo $resutl_final_test[1]?>, <?php echo $resutl_final_test[2]?>, <?php echo $resutl_final_test[3]?>, <?php echo $resutl_final_test[4]?>, <?php echo $resutl_final_test[5]?>, <?php echo $resutl_final_test[6]?>, <?php echo $resutl_final_test[7]?>, <?php echo $resutl_final_test[8]?>, <?php echo $resutl_final_test[9]?>, <?php echo $resutl_final_test[10]?>, <?php echo $resutl_final_test[11]?>,],
                    backgroundColor: "#50346b"
                }
            ]
            },
        options: {
            responsive: true
        }
    });
    </script>
    <script>
        
    </script>
</body>

</html>