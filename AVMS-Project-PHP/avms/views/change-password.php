<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
include('../controller/adminController.php');


error_reporting(0);
if (strlen($_SESSION['avmsaid']==0)) {
  header('location:logout.php');
  } else{


    if (isset($_POST['submit'])) {
        $adminid = $_SESSION['avmsaid'];
        $cpassword = md5($_POST['currentpassword']);
        $newpassword = md5($_POST['newpassword']);
    
        $controller = new AdminController();
        $checkCurrentPassword = $controller->checkCurrentPassword($adminid, $cpassword);
    
        if ($checkCurrentPassword->num_rows > 0) {
            $controller->updateAdminPassword($adminid, $newpassword);
            $msg = "Your password successfully changed";
        } else {
            $msg = "Your current password is wrong";
        }
    }

}

  
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <title>AVSM Change Password</title>
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="../css/theme.css" rel="stylesheet" media="all">
    <script type="text/javascript">
        function checkpass() {
            if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
                alert('New Password and Confirm Password field does not match');
                document.changepassword.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <?php include_once('../includes/sidebar.php'); ?>
        <div class="page-container">
            <?php include_once('../includes/header.php'); ?>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Change</strong> Admin Password
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="changepassword" onsubmit="return checkpass();">
                                            <p style="font-size:16px; color:red" align="center">
                                                <?php if (isset($msg)) {
                                                    echo $msg;
                                                } ?>
                                            </p>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="currentpassword" class="form-control-label">Current Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="currentpassword" name="currentpassword" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="newpassword" class="form-control-label">New Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="newpassword" name="newpassword" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="confirmpassword" class="form-control-label">Confirm Password</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <p style="text-align: center;">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Change</button>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php include_once('../includes/footer.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <script src="../vendor/slick/slick.min.js"></script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>

