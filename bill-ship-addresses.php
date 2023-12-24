<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:.php');
} else {
    // code for billing address updation
    if (isset($_POST['update'])) {
        $baddress = $_POST['billingaddress'];
        $bstate = $_POST['bilingstate'];
        $bcity = $_POST['billingcity'];
        $bpincode = $_POST['billingpincode'];
        $query = mysqli_query($con, "update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='" . $_SESSION['id'] . "'");
        if ($query) {
            echo "<script>alert('Billing Address has been updated');</script>";
        }
    }


    // code for Shipping address updation
    if (isset($_POST['shipupdate'])) {
        $saddress = $_POST['shippingaddress'];
        $sstate = $_POST['shippingstate'];
        $scity = $_POST['shippingcity'];
        $spincode = $_POST['shippingpincode'];
        $query = mysqli_query($con, "update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='" . $_SESSION['id'] . "'");
        if ($query) {
            echo "<script>alert('Shipping Address has been updated');</script>";
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
                if (document.chngpwd.cpass.value == "") {
                    alert("Current Password Filed is Empty !!");
                    document.chngpwd.cpass.focus();
                    return false;
                } else if (document.chngpwd.newpass.value == "") {
                    alert("New Password Filed is Empty !!");
                    document.chngpwd.newpass.focus();
                    return false;
                } else if (document.chngpwd.cnfpass.value == "") {
                    alert("Confirm Password Filed is Empty !!");
                    document.chngpwd.cnfpass.focus();
                    return false;
                } else if (document.chngpwd.newpass.value != document.chngpwd.cnfpass.value) {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.chngpwd.cnfpass.focus();
                    return false;
                }
                return true;
            }
        </script>

    </head>

    <body>
        <!-- TOP HEADER START -->
        <?php
        include 'include/top-header.php';
        ?>
        <!-- TOP HEADER END -->


        <!-- Navbar Start -->
        <?php
        include 'include/navbar2.php';
        ?>
        <!-- Navbar End -->




        <!-- Page Header Start -->
        <div class="container-fluid bg-secondary mb-5">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
                <h1 class="font-weight-semi-bold text-uppercase mb-3">My Account </h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">My Account</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->





        <!-- Main SECTION START -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Billing Address
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    
                                       
                                        <?php
													$query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
													while ($row = mysqli_fetch_array($query)) {
													?>

                                            <form action="" role="form" method="post">
                                                <div class="form-group">
                                                    <label for="Billing Address">Billing Address <span>*</span></label>
                                                    <textarea class="form-control" name="billingaddress" required="required"><?php echo $row['billingAddress']; ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Billing State">Billing State <span>*</span></label>
                                                    <input type="text" class="form-control" id="bilingstate" name="bilingstate" value="<?php echo $row['billingState']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Billing City">Billing City <span>*</span></label>
                                                    <input type="text" class="form-control " id="billingcity" name="billingcity" required value="<?php echo $row['billingCity']; ?>">
                                                </div>
                                                <div class="form-group">
													<label for="Billing Pincode">Billing Pincode <span>*</span></label>
													<input type="text" class="form-control" id="billingpincode" name="billingpincode" required="required" value="<?php echo $row['billingPincode']; ?>">
												</div>
                                                <button type="submit" name="update" class="btn btn-primary">Update</button>

                                            </form>
                                        <?php } ?>

                                    
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Shipping Address
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                    
                                       
                            <?php
											$query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
											while ($row = mysqli_fetch_array($query)) {
											?>
                                        <form action="" role="form" method="post">
                                            <div class="form-group">
                                                <label for="Shipping Address">Shipping Address<span>*</span></label>
                                                <textarea class="form-control" name="shippingAddress" required><?php echo $row['shippingAddress']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="Billing State">Shipping State <span>*</span></label>
                                                <input type="text" class="form-control" id="shippingstate" name="shippingstate" value="<?php echo $row['shippingState']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Shipping City">Shipping City <span>*</span></label>
                                                <input type="text" class="form-control " id="shippingcity" name="shippingcity" required value="<?php echo $row['shippingCity']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Shipping Pincode">Shipping Pincode <span>*</span></label>
                                                <input type="text" class="form-control" id="shippingpincode" name="shippingpincode" required="required" value="<?php echo $row['shippingPincode']; ?>">
                                            </div>
                                            <button type="submit" name="update" class="btn btn-primary">Update</button>

                                        </form>
                                    <?php } ?>

                                
                            </div>
                            </div>
                        </div>
                    </div>

                </div>




                <!-- MY ACOOUNT SIDEBAR -->

                <?php
                include 'include/my-account-sidebar.php';
                ?>
                <!-- MY ACOOUNT SIDEBAR -->
            </div>
        </div>
          <!-- Main SECTION START -->
          








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
<?php } ?>

    </html>