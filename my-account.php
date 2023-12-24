<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $contactno = $_POST['contactno'];
        $query = mysqli_query($con, "update users set name='$name',contactno='$contactno' where id='" . $_SESSION['id'] . "'");
        if ($query) {
            echo "<script>alert('Your info has been updated');</script>";
        }
    }


    date_default_timezone_set('Asia/Kolkata'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());


    if (isset($_POST['submit'])) {
        $sql = mysqli_query($con, "SELECT password FROM  users where password='" . md5($_POST['cpass']) . "' && id='" . $_SESSION['id'] . "'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            $con = mysqli_query($con, "update students set password='" . md5($_POST['newpass']) . "', updationDate='$currentTime' where id='" . $_SESSION['id'] . "'");
            echo "<script>alert('Password Changed Successfully !!');</script>";
        } else {
            echo "<script>alert('Current Password not match !!');</script>";
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
                                        My Profile
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="col-md-6 col-sm-12">
                                        <h4>Personal Info</h4>
                                        <?php
                                        $query = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                                        while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <form action="" role="form" method="post">
                                                <div class="form-group">
                                                    <label for="name">Name <span>*</span></label>
                                                    <input type="text" value="<?php echo $row['name']; ?>" required name="name" id="name" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email Address <span>*</span></label>
                                                    <input type="email" value="<?php echo $row['email']; ?>" class="form-control" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="Contact No.">Contact No. <span>*</span></label>
                                                    <input type="text" id="contactno" name="contactno" value="<?php echo $row['contactno']; ?>" class="form-control" maxlength="11">
                                                </div>
                                                <button type="submit" name="update" class="btn btn-primary">Update</button>

                                            </form>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Change Password
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="col-md-6 col-sm-12">
                                        <form action="" name="chngpwd" onSubmit="return valid();" role="form" method="post">
                                            <div class="form-group">
                                                <label for="Current Password">Current Password <span>*</span></label>
                                                <input type="text" name="cpass" id="cpass" required class="form-control " placeholder="Enter Your Current Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="New Password">New Password <span>*</span></label>
                                                <input type="password" id="newpass" name="newpass" required class="form-control" placeholder="Enter Your New Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="Confirm Password">Confirm Password <span>*</span></label>
                                                <input type="password" id="cnfpass" name="cnfpass" required class="form-control" placeholder="Confirm Your Password">
                                            </div>
                                        </form>
                                    </div>
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