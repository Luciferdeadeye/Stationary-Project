
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	$productname=$_POST['productName'];
	$productimage2=$_FILES["productimage2"]["name"];

//dir="productimages";
//unlink($dir.'/'.$pimage);


	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$pid/".$_FILES["productimage2"]["name"]);
	$sql=mysqli_query($con,"update  products set productImage2='$productimage2' where id='$pid' ");
$_SESSION['msg']="Product Image Updated Successfully !!";

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
                                        <?php if (isset($_POST['submit'])) { ?>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                                            </div>
                                        <?php } ?>

                                        <h4 class="card-title">Update Product Image 2</h4>

                                        <form class="forms-sample" name="insertproduct" method="post" enctype="multipart/form-data">
                                            <?php

                                            $query = mysqli_query($con, "select productName,productImage2 from products where id='$pid'");
                                            $cnt = 1;
                                            while ($row = mysqli_fetch_array($query)) {



                                            ?>

                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Product Name</label>
                                                    <input type="text" class="form-control" name="productName" readonly value="<?php echo htmlentities($row['productName']); ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Current Product Image1</label>
                                                    <img src="productimages/<?php echo htmlentities($pid); ?>/<?php echo htmlentities($row['productImage2']); ?>" width="200" height="100">
                                                </div>
                                                <div class="form-group">
                                                    <label for="productimage2">New Product Image 2</label>
                                                    <input type="file" name="productimage2" id="productimage2" value="" class="form-control" required>
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