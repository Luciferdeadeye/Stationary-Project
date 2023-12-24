<?php
session_start();
error_reporting(0);
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Karachi');
    $currentTime = date('d-m-Y h:i:s A', time());


    if (isset($_POST['submit'])) {
        $sql = mysqli_query($con, "SELECT password FROM  admin where password='" . md5($_POST['password']) . "' && username='" . $_SESSION['alogin'] . "'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            $con = mysqli_query($con, "update admin set password='" . md5($_POST['newpassword']) . "', updationDate='$currentTime' where username='" . $_SESSION['alogin'] . "'");
            $_SESSION['msg'] = "Password Changed Successfully !!";
        } else {
            $_SESSION['msg'] = "Old Password not match !!";
        }
    }
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ART | Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">

        <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->


        <!-- Layout styles -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="assets/images/fav.jpg" />

        <script type="text/javascript">
            function valid() {
                if (document.chngpwd.password.value == "") {
                    alert("Current Password Filed is Empty !!");
                    document.chngpwd.password.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value == "") {
                    alert("New Password Filed is Empty !!");
                    document.chngpwd.newpassword.focus();
                    return false;
                } else if (document.chngpwd.confirmpassword.value == "") {
                    alert("Confirm Password Filed is Empty !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.chngpwd.confirmpassword.focus();
                    return false;
                }
                return true;
            }
        </script>

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
                include 'includes/config.php';
                include 'includes/navbar.php';
                ?>

                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card corona-gradient-card">
                                    <div class="card-body py-0 px-0 px-sm-3">
                                        <div class="row align-items-center">
                                            <div class="col-4 col-sm-3 col-xl-2">
                                                <img src="assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                                            </div>
                                            <div class="col-5 col-sm-7 col-xl-8 p-0">
                                                <h4 class="mb-1 mb-sm-0">Want Some Stationary?</h4>
                                                <p class="mb-0 font-weight-normal d-none d-sm-block">Check out our Best Products on Our Store!</p>
                                            </div>
                                            <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                                                <span>
                                                    <a href="../index.php" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Explore Store</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0">$12.34</h3>
                                                    <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Potential growth</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0">$17.34</h3>
                                                    <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Revenue current</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0">$12.34</h3>
                                                    <p class="text-danger ml-2 mb-0 font-weight-medium">-2.4%</p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-danger">
                                                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Daily Income</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="d-flex align-items-center align-self-start">
                                                    <h3 class="mb-0">$31.53</h3>
                                                    <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="icon icon-box-success ">
                                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <h6 class="text-muted font-weight-normal">Expense current</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Order Status</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            <div class="form-check form-check-muted m-0">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input">
                                                                </label>
                                                            </div>
                                                        </th>
                                                        <th> Client Name </th>
                                                        <th> Order No </th>
                                                        <th> Product Cost </th>
                                                        <th> Project </th>
                                                        <th> Payment Mode </th>
                                                        <th> Start Date </th>
                                                        <th> Payment Status </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-muted m-0">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="assets/images/faces/face1.jpg" alt="image" />
                                                            <span class="pl-2">Henry Klein</span>
                                                        </td>
                                                        <td> 02312 </td>
                                                        <td> $14,500 </td>
                                                        <td> Dashboard </td>
                                                        <td> Credit card </td>
                                                        <td> 04 Dec 2019 </td>
                                                        <td>
                                                            <div class="badge badge-outline-success">Approved</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-muted m-0">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="assets/images/faces/face2.jpg" alt="image" />
                                                            <span class="pl-2">Estella Bryan</span>
                                                        </td>
                                                        <td> 02312 </td>
                                                        <td> $14,500 </td>
                                                        <td> Website </td>
                                                        <td> Cash on delivered </td>
                                                        <td> 04 Dec 2019 </td>
                                                        <td>
                                                            <div class="badge badge-outline-warning">Pending</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-muted m-0">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="assets/images/faces/face5.jpg" alt="image" />
                                                            <span class="pl-2">Lucy Abbott</span>
                                                        </td>
                                                        <td> 02312 </td>
                                                        <td> $14,500 </td>
                                                        <td> App design </td>
                                                        <td> Credit card </td>
                                                        <td> 04 Dec 2019 </td>
                                                        <td>
                                                            <div class="badge badge-outline-danger">Rejected</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-muted m-0">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="assets/images/faces/face3.jpg" alt="image" />
                                                            <span class="pl-2">Peter Gill</span>
                                                        </td>
                                                        <td> 02312 </td>
                                                        <td> $14,500 </td>
                                                        <td> Development </td>
                                                        <td> Online Payment </td>
                                                        <td> 04 Dec 2019 </td>
                                                        <td>
                                                            <div class="badge badge-outline-success">Approved</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-muted m-0">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="form-check-input">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <img src="assets/images/faces/face4.jpg" alt="image" />
                                                            <span class="pl-2">Sallie Reyes</span>
                                                        </td>
                                                        <td> 02312 </td>
                                                        <td> $14,500 </td>
                                                        <td> Website </td>
                                                        <td> Credit card </td>
                                                        <td> 04 Dec 2019 </td>
                                                        <td>
                                                            <div class="badge badge-outline-success">Approved</div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Revenue</h5>
                                        <div class="row">
                                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                    <h2 class="mb-0">$32123</h2>
                                                    <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                                                </div>
                                                <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                                            </div>
                                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                                <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Sales</h5>
                                        <div class="row">
                                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                    <h2 class="mb-0">$45850</h2>
                                                    <p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p>
                                                </div>
                                                <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                                            </div>
                                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                                <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Purchase</h5>
                                        <div class="row">
                                            <div class="col-8 col-sm-12 col-xl-8 my-auto">
                                                <div class="d-flex d-sm-block d-md-flex align-items-center">
                                                    <h2 class="mb-0">$2039</h2>
                                                    <p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p>
                                                </div>
                                                <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
                                            </div>
                                            <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                                                <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

                    <?php
                    include 'includes/footer.php'
                    ?>
                    <!-- main-panel ends -->
                </div>





                <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->
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