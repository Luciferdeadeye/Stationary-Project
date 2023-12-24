
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


if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update subcategory set categoryid='$category',subcategory='$subcat',updationDate='$currentTime' where id='$id'");
$_SESSION['msg']="Sub-Category Updated !!";

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
                        <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                      </div>
                    <?php } ?>
                    <h4 class="card-title">Edit Sub Category</h4>

                    <?php if(isset($_POST['submit']))
                    {?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
                                    <?php } ?>


                    <form class="forms-sample" name="Category" method="post">
                    <?php
                        $id=intval($_GET['id']);
                        $query=mysqli_query($con,"select category.id,category.categoryName,subcategory.subcategory from subcategory join category on category.id=subcategory.categoryid where subcategory.id='$id'");
                        while($row=mysqli_fetch_array($query))
                        {
                    ?>
                    		

                      <div class="form-group">
                        <label for="exampleInputPassword1">Category</label>
                        <select name="category" class="form-control" required>
                            <option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($catname=$row['categoryName']);?></option>
                            <?php $ret=mysqli_query($con,"select * from category");
                                while($result=mysqli_fetch_array($ret))
                                {
                                echo $cat=$result['categoryName'];
                                if($catname==$cat)
                                {
	                            continue;
                                }
                                else{
                            ?>
                            <option value="<?php echo $result['id'];?>"><?php echo $result['categoryName'];?></option>
                            <?php } }?>
                        </select>
                      </div>


                      <div class="form-group">
                        <label for="exampleInputPassword1">SubCategory Name</label>
                        <input type="text" name="subcategory" class="form-control" placeholder="Enter your SubCategory Name" value="<?php echo  htmlentities($row['subcategory']);?>" required>
                      </div>
                      <?php } ?>	
                     

                      <div class="form-check form-check-flat form-check-primary">
                      </div>
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