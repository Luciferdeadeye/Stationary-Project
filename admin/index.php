<?php
session_start();
error_reporting(0);
include("includes/config.php");

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$username' and password='$password'");
  $num = mysqli_fetch_array($ret);
  if ($num > 0) {
    $extra = "dashboard.php";
    $_SESSION['alogin'] = $_POST['username'];
    $_SESSION['id'] = $num['id'];
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("location:http://$host$uri/$extra");
    exit();
  } else {
    $_SESSION['errmsg'] = "Invalid username or password";
    $extra = "index.php";
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    header("location:http://$host$uri/$extra");
    exit();
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
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="./assets/images/fav.jpg" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>
                <form action="" method="POST">
                  <div class="form-group">
                    <label for="inputEmail">Username or email *</label>
                    <input type="text" id="inputEmail" name="username" placeholder="Username" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Password *</label>
                    <input type="password" class="form-control p_input"  name="password" id="inputPassword" required placeholder="Password">
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between">
                    <!-- <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div> -->
                    <a href="#" class="forgot-pass">Forgot password</a>
                    <br>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn" name="submit">Login</button>
                  </div>
                  <div class="d-flex">
                    <button class="btn btn-facebook mr-2 col">
                      <i class="mdi mdi-facebook"></i> Facebook </button>
                    <button class="btn btn-google col">
                      <i class="mdi mdi-google-plus"></i> Google plus </button>
                  </div>
                  
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>