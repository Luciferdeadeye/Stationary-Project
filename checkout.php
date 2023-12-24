<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:.php');
}
else{


    if (isset($_POST['submitpayment'])) {

		mysqli_query($con,"update orders set 	paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and paymentMethod is null ");
		unset($_SESSION['cart']);
		
		header('location:order-history.php');

	}

	// code for billing address updation
	if(isset($_POST['update']))
	{
		$baddress=$_POST['billingaddress'];
		$bstate=$_POST['bilingstate'];
		$bcity=$_POST['billingcity'];
		$bpincode=$_POST['billingpincode'];
		$query=mysqli_query($con,"update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Billing Address has been updated');</script>";
		}
	}


// code for Shipping address updation
	if(isset($_POST['shipupdate']))
	{
		$saddress=$_POST['shippingaddress'];
		$sstate=$_POST['shippingstate'];
		$scity=$_POST['shippingcity'];
		$spincode=$_POST['shippingpincode'];
		$query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Shipping Address has been updated');</script>";
		}
	}
    if (isset($_POST['submit'])) {

		mysqli_query($con,"update orders set 	paymentMethod='".$_POST['paymethod']."' where userId='".$_SESSION['id']."' and paymentMethod is null ");
		unset($_SESSION['cart']);
		header('location:order-history.php');

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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <?php
	                        $query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
	                        while($row=mysqli_fetch_array($query))
	                        {   
                        ?>
                        <form action="" role="form" method="post">
                            <div class="form-group">
                                <label for="Billing Address">Billing Address <span>*</span></label>
                                <textarea class="form-control" name="billingaddress" id="Billing Address" cols="30" rows="6"><?php echo $row['billingAddress'];?></textarea>
                            </div>
                            <div class="form-group">
					            <label for="Billing State ">Billing State  <span>*</span></label>
			                 <input type="text" class="form-control" id="bilingstate" name="bilingstate" value="<?php echo $row['billingState'];?>" required>
					        </div>
                            <div class="form-group">
					            <label for="Billing City">Billing City <span>*</span></label>
					            <input type="text" class="form-control" id="billingcity" name="billingcity" required="required" value="<?php echo $row['billingCity'];?>" >
					        </div>
                            <div class="form-group">
					            <label for="Billing Pincode">Billing Pincode <span>*</span></label>
					            <input type="text" class="form-control" id="billingpincode" name="billingpincode" required="required" value="<?php echo $row['billingPincode'];?>" >
					        </div>
                            <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        </form>
                        <?php } ?>



                    
                    
                        <div class="col-md-12 form-group mt-5">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse mb-4" id="shipping-address">
                    <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                    <div class="row">
                    <?php
	                        $query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
	                        while($row=mysqli_fetch_array($query))
	                        {   
                        ?>
                        <form action="" role="form" method="post">
                            <div class="form-group">
                                <label for="Billing Address">Shipping Address <span>*</span></label>
                                <textarea class="form-control" name="shippingaddress" id="Billing Address" cols="30" rows="6"><?php echo $row['shippingAddress'];?></textarea>
                            </div>
                            <div class="form-group">
					            <label for="Billing State ">Shipping State  <span>*</span></label>
			                 <input type="text" class="form-control" id="shippingState" name="shippingState" value="<?php echo $row['shippingState'];?>" required>
					        </div>
                            <div class="form-group">
					            <label for="Billing City">Shipping City <span>*</span></label>
					            <input type="text" class="form-control" id="shippingCity" name="shippingCity" required="required" value="<?php echo $row['shippingCity'];?>" >
					        </div>
                            <div class="form-group">
					            <label for="Billing Pincode">Shipping Pincode <span>*</span></label>
					            <input type="text" class="form-control" id="shippingpincode" name="shippingpincode" required="required" value="<?php echo $row['shippingPincode'];?>" >
					        </div>
                            <button type="submit" name="shipupdate" class="btn btn-primary">Submit</button>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
               
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <form action="" name="payment" method="post">

                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="test1" name="paymethod" value="COD">
                                    <label for="test1">Cash On Delivery</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="test2" name="paymethod" value="Internet Banking" >
                                    <label for="test2">Cheque</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio"  name="paymethod" value="Debit / Credit card" id="test3">
                                    <label for="test3">Internet Banking</label>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <input type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" name="submitpayment" value="Place Order">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->



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