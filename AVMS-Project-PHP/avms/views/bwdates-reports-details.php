<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../includes/dbconnection.php');
include('../controller/visitorController.php');


// Ensure the user is logged in
if (strlen($_SESSION['avmsaid']) == 0) {
    header('location:logout.php');
} else {
    $fromDate = $_POST['fromdate'];
    $toDate = $_POST['todate'];

    $controller = new visitorController();
    $visitors = $controller->getVisitorsBetweenDates($fromDate, $toDate);
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
    <title>AVMS</title>
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
                                <div class="table-responsive table--no-card m-b-30">
                                    <h4 class="m-t-0 header-title">Between Dates Reports</h4>
                                    <h5 align="center" style="color:blue">Report from <?php echo $fromDate ?> to <?php echo $toDate; ?></h5>
                                    <hr />
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Visitor Name</th>
                                                <th>Category</th>
                                                <th>Contact Number</th>
                                                <th>Whom to Meet</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cnt = 1;
                                            while ($row = $visitors->fetch_assoc()) {
                                                echo "<tr>
                                                    <td>{$cnt}</td>
                                                    <td>{$row['VisitorName']}</td>
                                                    <td>{$row['categoryName']}</td>
                                                    <td>{$row['MobileNumber']}</td>
                                                    <td>{$row['WhomtoMeet']}</td>
                                                    <td><a href='visitor-detail.php?editid={$row['ID']}' title='View Full Details' class='btn btn-primary'>View</a></td>
                                                </tr>";
                                                $cnt++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php include_once('../includes/footer.php'); ?>
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
