<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Karachi');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from products where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="Product deleted !!";
		  }

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
												<th>Product Name</th>
												<th>Category </th>
												<th>Subcategory</th>
												<th>Company Name</th>
												<th>Product Creation Date</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>

											<?php $query = mysqli_query($con, "select products.*,category.categoryName,subcategory.subcategory from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory");
											$cnt = 1;
											while ($row = mysqli_fetch_array($query)) {
											?>
												<tr>
													<td><?php echo htmlentities($cnt); ?></td>
													<td><?php echo htmlentities($row['productName']); ?></td>
													<td><?php echo htmlentities($row['categoryName']); ?></td>
													<td> <?php echo htmlentities($row['subcategory']); ?></td>
													<td><?php echo htmlentities($row['productCompany']); ?></td>
													<td><?php echo htmlentities($row['postingDate']); ?></td>
													<td>
														<a href="edit-products.php?id=<?php echo $row['id'] ?>"><div class="btn btn-primary">Edit</div></a>
														<a href="manage-products.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><div class="btn btn-danger">Remove</div></a>
													</td>
												</tr>
											<?php $cnt = $cnt + 1;
											} ?>
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