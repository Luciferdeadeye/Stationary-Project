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
                <div class="card">
                  <div class="card-body">
                    <?php if (isset($_POST['submit'])) { ?>
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
                      </div>
                    <?php } ?>
                    <h4 class="card-title">Change Password</h4>
                    <p class="card-description"> Change Your Passowrd </p>
                    <form class="forms-sample" name="chngpwd" method="post" onSubmit="return valid();">

                      <div class="form-group">
                        <label for="exampleInputPassword1">Current Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter your current password" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" name="newpassword" class="form-control" placeholder="Enter your new password" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Enter your confirm password" required>
                      </div>

                      <div class="form-check form-check-flat form-check-primary">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                      <!-- <button class="btn btn-dark">Cancel</button> -->
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