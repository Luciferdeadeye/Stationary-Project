<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	$pid = intval($_GET['id']); // product id
	if (isset($_POST['submit'])) {
		$category = $_POST['category'];
		$subcat = $_POST['subcategory'];
		$productname = $_POST['productName'];
		$productcompany = $_POST['productCompany'];
		$productprice = $_POST['productprice'];
		$productpricebd = $_POST['productpricebd'];
		$productdescription = $_POST['productDescription'];
		$productscharge = $_POST['productShippingcharge'];
		$productavailability = $_POST['productAvailability'];

		$sql = mysqli_query($con, "update  products set category='$category',subCategory='$subcat',productName='$productname',productCompany='$productcompany',productPrice='$productprice',productDescription='$productdescription',shippingCharge='$productscharge',productAvailability='$productavailability',productPriceBeforeDiscount='$productpricebd' where id='$pid' ");
        
		$_SESSION['msg'] = "Product Updated Successfully !!";
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
                <!--Include the JS & CSS-->
                <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

        <script type="text/javascript">
            bkLib.onDomLoaded(nicEditors.allTextAreas);
        </script>

        <script>
            function getSubcat(val) {
                $.ajax({
                    type: "POST",
                    url: "get_subcat.php",
                    data: 'cat_id=' + val,
                    success: function(data) {
                        $("#subcategory").html(data);
                    }
                });
            }

            function selectCountry(val) {
                $("#search-box").val(val);
                $("#suggesstion-box").hide();
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
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Insert Product</h4>

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

                                        <form class="forms-sample" name="insertproduct" method="post" enctype="multipart/form-data">
                                        <?php

                                            $query = mysqli_query($con, "select products.*,category.categoryName as catname,category.id as cid,subcategory.subcategory as subcatname,subcategory.id as subcatid from products join category on category.id=products.category join subcategory on subcategory.id=products.subCategory where products.id='$pid'");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {



                                        ?>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Category</label>
                                                <select name="category" class="form-control form-control-lg"   onChange="getSubcat(this.value);"  required>
                                                    <option value="<?php echo htmlentities($row['cid']); ?>"><?php echo htmlentities($row['catname']); ?></option>
                                                    <?php $query = mysqli_query($con, "select * from category");
														while ($rw = mysqli_fetch_array($query)) {
															if ($row['catname'] == $rw['categoryName']) {
																continue;
															} else {
														?>

														<option value="<?php echo $rw['id']; ?>"><?php echo $rw['categoryName']; ?></option>
                                                        <?php }
														} ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Sub Category</label>
                                                <select name="subcategory" required id="subcategory" class="form-control form-control-lg" >
                                                    <option value="<?php echo htmlentities($row['subcatid']); ?>"><?php echo htmlentities($row['subcatname']); ?></option>

                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Name</label>
                                                <input type="text" class="form-control" name="productName" placeholder="Enter your product name" value="<?php echo htmlentities($row['productName']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Company</label>
                                                <input type="text" class="form-control" name="productCompany" placeholder="Enter your product company name" value="<?php echo htmlentities($row['productCompany']); ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Price</label>
                                                <input type="text" class="form-control" value="<?php echo htmlentities($row['productPriceBeforeDiscount']); ?>" name="productpricebd" placeholder="product price before discount" required>
                                                <div class="form-group mt-3">
                                                    <label for="exampleInputPassword1">Product Price</label>
                                                    <input type="text" class="form-control" name="productprice" value="<?php echo htmlentities($row['productPrice']); ?>" placeholder="product price after discount" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleTextarea1">Description</label>
                                                    <textarea id="" class="form-control" rows="6" name="productDescription" placeholder="Enter The description of your Product..."><?php echo htmlentities($row['productDescription']); ?></textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Product Shipping Charge</label>
                                                    <input type="text" value="<?php echo htmlentities($row['shippingCharge']); ?>"  class="form-control" name="productShippingcharge" placeholder="delivery charges" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Product Availibility</label>
                                                    <select name="productAvailability" class="form-control form-control-lg" required>
                                                    <option value="<?php echo htmlentities($row['productAvailability']); ?>"><?php echo htmlentities($row['productAvailability']); ?></option>
													<option value="In Stock">In Stock</option>
													<option value="Out of Stock">Out of Stock</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Product Image 1</label>
                                                    <img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage1']); ?>" width="200" height="100"><a class="btn btn-primary" href="update-image1.php?id=<?php echo $row['id']; ?>">Change Image</a>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Product Image 2</label>
                                                    <img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage2']); ?>" width="200" height="100"><a class="btn btn-primary" href="update-image2.php?id=<?php echo $row['id']; ?>">Change Image</a>
                                                   
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Product Image 3</label>
                                                    <img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage3']); ?>" width="200" height="100"><a class="btn btn-primary" href="update-image3.php?id=<?php echo $row['id']; ?>">Change Image</a>
                                                    
                                                </div>
                                                <?php } ?>



                                                
                                                <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                                               
                                        </form>
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