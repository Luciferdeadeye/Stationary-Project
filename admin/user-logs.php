<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ART | Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="assets/images/fav.jpg" />

    </head>

    <body>
        <div class="container-scroller">
            <!-- SIDEBAR -->
            <?php
            include './includes/sidebar.php'
            ?>
            <div class="container-fluid page-body-wrapper">
                <!-- NAVBAR -->

                <?php
                include 'includes/navbar.php';
                ?>
                
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">User Logs</h4>


                                        <div class="table-responsive">

                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th> User Email</th>
                                                        <th>User IP </th>
                                                        <th>Login Time</th>
                                                        <th>Logout Time </th>
                                                        <th>Status </th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php $query = mysqli_query($con, "select * from userlog");
                                                    $cnt = 1;
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($row['userEmail']); ?></td>
                                                            <td><?php echo htmlentities($row['userip']); ?></td>
                                                            <td> <?php echo htmlentities($row['loginTime']); ?></td>
                                                            <td><?php echo htmlentities($row['logout']); ?></td>
                                                            <td><?php $st = $row['status'];

                                                                if ($st == 1) {
                                                                    echo "Successfull";
                                                                } else {
                                                                    echo "Failed";
                                                                }
                                                                ?></td>


                                                        <?php $cnt = $cnt + 1;
                                                    } ?>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>










        <!-- plugins:js -->
        <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="assets/vendors/chart.js/Chart.min.js"></script>
        <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
        <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/hoverable-collapse.js"></script>
        <script src="assets/js/misc.js"></script>
        <script src="assets/js/settings.js"></script>
        <script src="assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->
    </body>
<?php } ?>

    </html>