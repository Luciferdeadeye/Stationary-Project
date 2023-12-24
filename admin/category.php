<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	date_default_timezone_set('Asia/Karachi'); // change according timezone
	$currentTime = date('d-m-Y h:i:s A', time());


	if (isset($_POST['submit'])) {
		$category = $_POST['category'];
		$description = $_POST['description'];
		$sql = mysqli_query($con, "insert into category(categoryName,categoryDescription) values('$category','$description')");
		$_SESSION['msg'] = "Category Created !!";
	}

	if (isset($_GET['del'])) {
		mysqli_query($con, "delete from category where id = '" . $_GET['id'] . "'");
		$_SESSION['delmsg'] = "Category deleted !!";
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
                include 'includes/navbar.php';
                ?>

                <div class="main-panel">
                    <div class="content-wrapper">
                        <?php if (isset($_POST['submit'])) { ?>
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                            </div>
                        <?php } ?>


                        <?php if (isset($_GET['del'])) { ?>
                            <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <?php if (isset($_POST['submit'])) { ?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                            </div>
                                        <?php } ?>
                                        <h4 class="card-title">Create Category</h4>
                                        <form class="forms-sample" name="Category" method="post">

                                            <div class="form-group">
                                                <label for="category">Category Name</label>
                                                <input type="text" class="form-control" name="category" placeholder="Enter Category Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Description</label>
                                                <textarea class="form-control" rows="8" name="description" placeholder="Enter The description of your Category..."></textarea>
                                            </div>

                                            <div class="form-check form-check-flat form-check-primary">
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="card-title">Manage Products</h4>
                                        <?php if (isset($_GET['del'])) { ?>
                                            <div class="alert alert-error">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="table-responsive">

                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Category</th>
                                                        <th>Description</th>
                                                        <th>Creation date</th>
                                                        <th>Last Updated</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php $query = mysqli_query($con, "select * from category");
                                                    $cnt = 1;
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($row['categoryName']); ?></td>
                                                            <td><?php echo htmlentities($row['categoryDescription']); ?></td>
                                                            <td> <?php echo htmlentities($row['creationDate']); ?></td>
                                                            <td><?php echo htmlentities($row['updationDate']); ?></td>
                                                            <td>
                                                                <a href="edit-category.php?id=<?php echo $row['id'] ?>"><div class="btn btn-primary">Edit</div></a>
                                                                <a href="category.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><div class="btn btn-danger">Delete</div></a>
                                                            </td>
                                                        </tr>
                                                    <?php $cnt = $cnt + 1;
                                                    } ?>

                                            </table>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        include 'includes/footer.php'
                        ?>

                    </div>
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