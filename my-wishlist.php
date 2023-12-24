<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
    
// Code forProduct deletion from  wishlist	
$wid=intval($_GET['del']);
if(isset($_GET['del']))
{
$query=mysqli_query($con,"delete from wishlist where id='$wid'");
}


if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	$query=mysqli_query($con,"delete from wishlist where productId='$id'");
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);	
header('location:my-wishlist.php');
}
		else{
			$message="Product ID is invalid";
		}
	}
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Arts | Stationary Shop</title>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">WishList</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Wishlist</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->





    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Products</h4>
                    </div>
                    <div class="card-body">
                    <table class="table">
									
									<tbody>
										<?php
										$ret = mysqli_query($con, "select products.productName as pname,products.productName as proid,products.productImage1 as pimage,products.productPrice as pprice,products.productPriceBeforeDiscount as pbdprice,wishlist.productId as pid,wishlist.id as wid from wishlist join products on products.id=wishlist.productId where wishlist.userId='" . $_SESSION['id'] . "'");
										$num = mysqli_num_rows($ret);
										if ($num > 0) {
											while ($row = mysqli_fetch_array($ret)) {

										?>

												<tr>
													<td class="col-md-2"><img src="admin/productimages/<?php echo htmlentities($row['pid']); ?>/<?php echo htmlentities($row['pimage']); ?>" alt="<?php echo htmlentities($row['pname']); ?>" width="60" height="100"></td>
													<td class="col-md-6">
														<div class="product-name"><a href="product-details.php?pid=<?php echo htmlentities($pd = $row['pid']); ?>"><?php echo htmlentities($row['pname']); ?></a></div>
														<?php $rt = mysqli_query($con, "select * from productreviews where productId='$pd'");
														$num = mysqli_num_rows($rt); {
														?>

															<div class="rating">
																<i class="fa fa-star rate"></i>
																<i class="fa fa-star rate"></i>
																<i class="fa fa-star rate"></i>
																<i class="fa fa-star rate"></i>
																<i class="fa fa-star non-rate"></i>
																<span class="review">( <?php echo htmlentities($num); ?> Reviews )</span>
															</div>
														<?php } ?>
														<div class="price">Rs.
															<?php echo htmlentities($row['pprice']); ?>.00
															<span><del><?php echo htmlentities($row['pbdprice']); ?>.00</del></span>
														</div>
													</td>
													<td class="col-md-2">
														<a href="my-wishlist.php?page=product&action=add&id=<?php echo $row['pid']; ?>" class="btn-upper btn btn-primary">Add to cart</a>
													</td>
													<td class="col-md-2 close-btn">
														<a href="my-wishlist.php?del=<?php echo htmlentities($row['wid']); ?>" onClick="return confirm('Are you sure you want to delete?')" class=""><i class="fa fa-times"></i></a>
													</td>
												</tr>
											<?php }
										} else { ?>
											<tr>
												<td style="font-size: 18px; font-weight:bold ">Your Wishlist is Empty</td>

											</tr>
										<?php } ?>
									</tbody>
								</table>

                    </div>
                </div>
            </div>
        </div>
    </div>










        <!-- Footer Start -->
        <?php
        include 'include/footer.php';
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