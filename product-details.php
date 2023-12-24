<?php 
session_start();
error_reporting(0);
include('include/config.php');
$cid = intval($_GET['cid']);


// Assuming you generate $product_no here
$query = "SELECT productCode FROM category WHERE id = $cid";
$result = mysqli_query($con, $query);

if($result && $row = mysqli_fetch_assoc($result)) {
    $productCode = $row['productCode'];
    $product_no = $productCode . rand(11111,99999);

    $_SESSION['product_no'] = $product_no;
} else {
    echo "No product code found for this category.";
}


if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
					echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
		}else{
			$message="Product ID is invalid";
		}
	}
}
$pid=intval($_GET['pid']);
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

}
}
if(isset($_POST['submit']))
{
	$qty=$_POST['quality'];
	$price=$_POST['price'];
	$value=$_POST['value'];
	$name=$_POST['name'];
	$summary=$_POST['summary'];
	$review=$_POST['review'];
	mysqli_query($con,"insert into productreviews(productId,quality,price,value,name,summary,review) values('$pid','$qty','$price','$value','$name','$summary','$review')");
}



  // Assuming $cid contains the category id
//   $query = "SELECT productCode FROM category WHERE id = $cid";
//   $result = mysqli_query($con, $query);

//   if($result && $row = mysqli_fetch_assoc($result)) {
//       $productCode = $row['productCode'];
//     //   echo "Product Code: $productCode";
//   } else {
//       echo "No product code found for this category.";
//   }





//   $product_no=$productCode . rand(11111,99999);








?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ART | Stationary Shop </title>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Product Details</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Product Details</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
    <?php
				$ret = mysqli_query($con, "select * from products where id='$pid'");
				while ($row = mysqli_fetch_array($ret)) {

				?>
        
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="Image" height="200">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage2']); ?>" alt="Image" height="200">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage3']); ?>" alt="Image" height="200">
                        </div>
                        <!-- <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-4.jpg" alt="Image">
                        </div> -->
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><?php echo htmlentities($row['productName']); ?></h3>
                <div class="d-flex mb-3">
                <?php $rt = mysqli_query($con, "select * from productreviews where productId='$pid'");
									$num = mysqli_num_rows($rt); {
									?>
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(<?php echo htmlentities($num); ?> Reviews)</small>
                    <?php } ?>
                </div>
                <h3 class="font-weight-semi-bold mb-2">Rs. <?php echo htmlentities($row['productPrice']); ?></h3><h5 style="color: red;"><del>Rs.<?php echo htmlentities($row['productPriceBeforeDiscount']); ?></del></h5>

                <p class="mb-4"><?php echo $row['productDescription']; ?></p>
                <div class="d-flex mb-3">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Availability:</p>
                    <span><?php echo htmlentities($row['productAvailability']); ?></span>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Product Brand:</p>
                    <span><?php echo htmlentities($row['productCompany']); ?></span>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Product Number:</p>
                    <span><?php echo $product_no ?></span>
                </div>
                <div class="d-flex mb-4">
                    <p class="text-dark font-weight-medium mb-0 mr-3">Shipping Charge:</p>
                    <span><?php if ($row['shippingCharge'] == 0) {
																			echo "Free";
																		} else {
																			echo htmlentities($row['shippingCharge']);
																		}

																		?></span>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <?php if ($row['productAvailability'] == 'In Stock') { ?>
                    <a class="btn btn-primary px-3" href="product-details.php?page=product&action=add&id=<?php echo $row['id']; ?>"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</a> &nbsp; &nbsp;
                    <a class="btn btn-primary px-2" data-toggle="tooltip" data-placement="right" title="Wishlist" href="product-details.php?pid=<?php echo htmlentities($row['id']) ?>&&action=wishlist"><i class="fas fa-heart"></i></a>

                    <?php } else { ?>
													<div class="action" style="color:red">Out of Stock</div>
												<?php } ?>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (<?php echo htmlentities($num); ?>)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p><?php echo $row['productDescription']; ?>.</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3" >
                        <div class="row" >
                            <div class="col-md-6">
                            <?php $qry = mysqli_query($con, "select * from productreviews where productId='$pid'");
													while ($rvw = mysqli_fetch_array($qry)) {
													?>
                                <h4 class="mb-4"><?php echo htmlentities($rvw['summary']); ?>"</h4>
                                <div class="media mb-4">
                                    <!-- <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;"> -->
                                    <div class="media-body">
                                        <h6><?php echo htmlentities($rvw['name']); ?><small> - <i><?php echo htmlentities($rvw['reviewDate']); ?></i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <p>"<?php echo htmlentities($rvw['review']); ?>"</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Leave a review</h4>
                                <small>Your email address will not be published. Required fields are marked *</small>
                                <!-- <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Your Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star" name="quality"></i>
                                        <i class="far fa-star" name="quality"></i>
                                        <i class="far fa-star" name="quality"></i>
                                        <i class="far fa-star" name="quality"></i>
                                        <i class="far fa-star" name="quality"></i>
                                    </div>
                                </div> -->
                                <form>
                                    <div class="form-group">
                                        <label for="message">Your Review *</label>
                                        <textarea name="review"  id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Your Name *</label>
                                        <input type="text"  name="name" class="form-control" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Summary *</label>
                                        <input type="text" name="summary" class="form-control" id="email">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	<?php $cid = $row['category'];
					$subcid = $row['subCategory'];
				} ?>
    <!-- Shop Detail End -->







    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <?php
			            $qry = mysqli_query($con, "select * from products where subCategory='$subcid' and category='$cid' LIMIT 4");
			            while ($rw = mysqli_fetch_array($qry)) {

			        ?>
                    
                    <div class="card product-item border-0">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">

                                <div class="text-center">
                                <a href="product-details.php?pid=<?php echo htmlentities($rw['id']); ?>" class="cat-img overflow-hidden mb-3">
                                    <img class="img-fluid" src="admin/productimages/<?php echo htmlentities($rw['id']); ?>/<?php echo htmlentities($rw['productImage1']); ?>" height="300" data-echo="admin/productimages/<?php echo htmlentities($rw['id']); ?>/<?php echo htmlentities($rw['productImage1']); ?>" alt="">
                                </a>
                                </div>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo htmlentities($rw['productName']); ?></h6>
                                
                            </div>
                            
                    </div>
                   
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->


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

</html>