<?php
session_start();
error_reporting(0);
include('include/config.php');
// Code user Registration
if (isset($_POST['submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['emailid'];
    $contactno = $_POST['contactno'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");
    if ($query) {
        echo "<script>alert('You are successfully register');</script>";
    } else {
        echo "<script>alert('Not register something went worng');</script>";
    }
}
// Code for User login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' and password='$password'");
    $num = mysqli_fetch_array($query);
    if ($num > 0) {
        $extra = "my-cart.php";
        $_SESSION['login'] = $_POST['email'];
        $_SESSION['id'] = $num['id'];
        $_SESSION['username'] = $num['name'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        $log = mysqli_query($con, "insert into userlog(userEmail,userip,status) values('" . $_SESSION['login'] . "','$uip','$status')");
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $extra = "login.php";
        $email = $_POST['email'];
        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 0;
        $log = mysqli_query($con, "insert into userlog(userEmail,userip,status) values('$email','$uip','$status')");
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("location:http://$host$uri/$extra");
        $_SESSION['errmsg'] = "Invalid email id or Password";
        exit();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
     <title>ART | Staionary Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
        <link href="img/ART.png" rel="icon">


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script type="text/javascript">
		function valid() {
			if (document.register.password.value != document.register.confirmpassword.value) {
				alert("Password and Confirm Password Field do not match  !!");
				document.register.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>
	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'email=' + $("#email").val(),
				type: "POST",
				success: function(data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>
</head>

<body>



     <!-- Topbar Start -->

    <?php
        include 'include/top-header.php';
    ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php
        include 'include/navbar2.php';
    ?>
    <!-- Navbar End -->


        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-3 ">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Login / Signup </h1>
            <!-- <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div> -->
        </div>
    </div>
    <!-- Page Header End -->









    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-truncate">Login</h4>
                        <p class="card-description">Hello, Welcome Back To Your Account!!</p>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="inputEmail">Email Address <span>*</span></label>
                                <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Enter Your Registered Email" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Password <span>*</span></label>
                                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Enter Your Password" required>
                            </div>
                            <a href="forgot-password.php" class="forgot-password pull-right">Forgot your Password?</a>
                            <div class="form-group mt-4" >
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-truncate">Create a new Account</h4>
                        <p class="card-description">Create your own shipping account</p>
                        <form action="" role="form" name="register" method="post" onSubmit="return valid();">
                        <div class="form-group">
								<label for="fullname">Full Name <span>*</span></label>
								<input type="text" class="form-control" id="fullname" name="fullname" required="required" placeholder="Enter Your full name">
							</div>


							<div class="form-group">
								<label for="exampleInputEmail2">Email Address <span>*</span></label>
								<input type="email" class="form-control" id="email" onBlur="userAvailability()" name="emailid" required placeholder="Enter Your Email address">
								<span id="user-availability-status1" style="font-size:12px;"></span>
							</div>

							<div class="form-group">
								<label for="contactno">Contact No. <span>*</span></label>
								<input type="text" class="form-control" id="contactno" name="contactno" maxlength="10" required placeholder="Enter Your Contact No.">
							</div>

							<div class="form-group">
								<label for="password">Password. <span>*</span></label>
								<input type="password" class="form-control" id="password" name="password" required placeholder="Enter Your Password">
							</div>

							<div class="form-group">
								<label for="confirmpassword">Confirm Password. <span>*</span></label>
								<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required placeholder="Confirm Your Password">
							</div>
                            <button type="submit" name="submit" class="btn btn-primary" id="submit">Sign Up</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
















    <!-- Footer Start -->
    <?php
    include '<include/footer.php';
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>