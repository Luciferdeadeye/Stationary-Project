<?php
session_start();
error_reporting(0);
include('include/config.php');

if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = intval($_GET['id']);
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_p = "SELECT * FROM products WHERE id={$id}";
        $query_p = mysqli_query($con, $sql_p);
        if (mysqli_num_rows($query_p) != 0) {
            $row_p = mysqli_fetch_array($query_p);
            $_SESSION['cart'][$row_p['id']] = array("quantity" => 1, "price" => $row_p['productPrice']);
        } else {
            $message = "Product ID is invalid";
        }
    }
    echo "<script>alert('Product has been added to the cart')</script>";
    echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ART | Stationary Shop</title>
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

    <!-- AOS ANIMATION -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <!-- TOP-HEADER START -->

    <?php
    include 'include/top-header.php';
    ?>
    <!-- TOP-HEADER END -->






    </div>



    <!-- NAVBAR -->
    <?php
    include 'include/navbar2.php';
    ?>
    <!-- NAVBAR -->

    <!-- SLIDER -->
    <div data-aos="fade-up" data-aos-duration="1000">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="height: 610px;">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h4 class="text-light text-uppercase font-weight-medium mb-3">20% Off Your First Order</h4>
                            <h3 class="display-4 text-white font-weight-semi-bold mb-4">Best Beauty Products</h3>
                            <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="height: 610px;">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off on Hand Bags</h4>
                            <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                            <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="height: 610px;">
                    <img class="img-fluid" src="img/carousel-3.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h4 class="text-light text-uppercase font-weight-medium mb-3">Instant Delivery Only For You</h4>
                            <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                            <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="height: 610px;">
                    <img class="img-fluid" src="img/carousel-4.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h4 class="text-light text-uppercase font-weight-medium mb-3">Gift anyone with our website</h4>
                            <h3 class="display-4 text-white font-weight-semi-bold mb-4">Gift For All Occassion</h3>
                            <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>

    </div>

    <!-- SLIDER -->





    <!-- COMPONENTS START-->
    <div data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid pt-5">
            <div class="row px-xl-5 pb-3">
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                        <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                        <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                        <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                        <h5 class="font-weight-semi-bold m-0">On Time Delivery</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                        <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                        <h5 class="font-weight-semi-bold m-0">7-Day Return</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                        <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                        <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- COMPONENTS END -->


    <!-- FEATURED Start -->
    <div data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid pt-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Featured Products</span></h2>
            </div>
            <div class="row px-xl-5 pb-3">

                <?php
                $ret = mysqli_query($con, "SELECT * FROM products LIMIT 4;");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">

                                <div class="text-center">
                                    <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>&cid=<?php echo htmlentities($row['category']) ?>" class="cat-img overflow-hidden mb-3">
                                        <img class="img-fluid" src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo htmlentities($row['productName']); ?></h6>

                            </div>

                        </div>
                    </div>
                <?php } ?>





            </div>
        </div>
    </div>
    <!-- FEATURED End -->


    <!-- Offer Start -->
    <div data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid offer pt-5" id="offer">
            <div class="row px-xl-5">
                <div class="col-md-6 pb-4">
                    <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                        <img src="img/left.png" alt="">
                        <div class="position-relative" style="z-index: 1;">
                            <h5 class="text-uppercase text-primary mb-3">20% off On Hand Bags</h5>
                            <h1 class="mb-4 font-weight-semi-bold">New Collection</h1>
                            <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pb-4">
                    <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                        <img src="img/right.png" alt="">
                        <div class="position-relative" style="z-index: 1;">
                            <h5 class="text-uppercase text-primary mb-3">30% off on beauty products</h5>
                            <h1 class="mb-4 font-weight-semi-bold">Beauty Collection</h1>
                            <a href="" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Offer End -->


    <!-- Products Start -->
    <div data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid pt-5">
            <div class="text-center mb-4">
                <h2 class="section-title px-5"><span class="px-2">Trandy Products</span></h2>
            </div>
            <div class="row px-xl-5 pb-3">

                <?php
                $ret = mysqli_query($con, "SELECT * FROM products ORDER BY RAND() LIMIT 8;");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">

                                <div class="text-center">
                                    <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>&cid=<?php echo htmlentities($row['category']) ?>" class="cat-img overflow-hidden mb-3">
                                        <img class="img-fluid" src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo htmlentities($row['productName']); ?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6>Rs. <?php echo htmlentities($row['productPrice']); ?>.00</h6>
                                    <h6 class="text-muted ml-2"><del>Rs. <?php echo htmlentities($row['productPriceBeforeDiscount']); ?>.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>&cid=<?php echo htmlentities($row['category']) ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>





            </div>
        </div>
    </div>

    <!-- Products End -->


    <!-- Subscribe Start -->
    <div data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid bg-secondary my-5">
            <div class="row justify-content-md-center py-5 px-xl-5">
                <div class="col-md-6 col-12 py-5">
                    <div class="text-center mb-2 pb-2">
                        <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                        <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                    </div>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Subscribe</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Subscribe End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <div class="text-center mb-4">
            <div data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title px-5"><span class="px-2">Just Arrived</span></h2>
            </div>
        </div>
        <div data-aos="fade-up" data-aos-duration="1500">
            <div class="row px-xl-5 pb-3">
                <?php
                $ret = mysqli_query($con, "SELECT * FROM products ORDER BY RAND() LIMIT 8;");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>&cid=<?php echo htmlentities($row['category']) ?>" class="cat-img position-relative overflow-hidden mb-3">
                                    <img class="img-fluid w-100" src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="">
                                </a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo htmlentities($row['productName']); ?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6>Rs. <?php echo htmlentities($row['productPrice']); ?>.00</h6>
                                    <h6 class="text-muted ml-2"><del>Rs. <?php echo htmlentities($row['productPriceBeforeDiscount']); ?>.00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>&cid=<?php echo htmlentities($row['category']) ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>



            </div>
        </div>
    </div>
    <!-- Products End -->







    <!-- FAQ's START -->
    <div class="container-fluid pt-3" id="webfaq">
        <div class="text-center mb-4">
            <div data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title px-5"><span class="px-2">FAQ's</span></h2>
            </div>

            <div data-aos="fade-up" data-aos-duration="1000">

                <div class="card p-3">

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <b>How do I place an order?</b>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body" style="text-align: justify;">
                                    First you have to search for your products that you want to buy, you can search it in our <a href="shop.php">Shop</a> section, After that add to your cart then just fill out the details and place order!.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <b>Can I change or cancel my order after it's been placed?</b>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body" style="text-align: justify;">
                                    Yeah you can cancel your order anytime when the order is not dispatched from the dealer :) Once it's confirmed by dealer you cann't cancel the order but you can return it under 7 days after it will delivered.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <b>How do I track my order?</b>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body" style="text-align: justify;">
                                    When you order anything then at the top right corner you have a button named my orders click there and then track your orders from your order history.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <!-- FAQ's END -->




    <!-- FEEDBACK START -->

    <div class="container-fluid mb-4 p-5" id="feedback">
        <div class="text-center mb-4">
            <div data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title px-5"><span class="px-2">FEEDBACK</span></h2>
            </div>
        </div>

        <div data-aos="fade-up" data-aos-duration="1000">
            <div class="card">


                <div class="row p-2">
                    <div class="col">
                        <form method="POST">
                            <div class="form-group">
                                <label for="emailtxt" style="text-indent: 15px;">Email *</label>
                                <input type="email" id="emailtxt" class="form-control" required placeholder="Enter Your Email Address Here">
                            </div>
                            <div class="form-group">
                                <label for="usertxt" style="text-indent: 15px;">Username *</label>
                                <input type="text" id="usertxt" class="form-control" required placeholder="Enter Your Username Here">
                            </div>
                    </div>
                    <div class="col">

                        <div class="form-group">
                            <label for="msgs" style="text-indent: 10px;">Your Feedback *</label>
                            <textarea type="text" rows="6" id="msgs" class="form-control" required placeholder="Enter Your Feedback Here"></textarea>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>



                    </form>

                </div>
            </div>
        </div>
    </div>



    <!-- FEEDBACK END -->





    <!-- Vendor Start -->

    <div data-aos="fade-up" data-aos-duration="1000">
        <div class="container-fluid py-5 mt-3">
            <div class="row px-xl-5">
                <div class="col">
                    <div class="owl-carousel vendor-carousel">
                        <div class="vendor-item border p-4">
                            <img src="img/vendor-1.jpg" alt="">
                        </div>
                        <div class="vendor-item border p-4">
                            <img src="img/vendor-2.jpg" alt="">
                        </div>
                        <div class="vendor-item border p-4">
                            <img src="img/vendor-3.jpg" alt="">
                        </div>
                        <div class="vendor-item border p-4">
                            <img src="img/vendor-4.jpg" alt="">
                        </div>
                        <div class="vendor-item border p-4">
                            <img src="img/vendor-5.jpg" alt="">
                        </div>
                        <div class="vendor-item border p-4">
                            <img src="img/vendor-6.jpg" alt="">
                        </div>
                        <div class="vendor-item border p-4">
                            <img src="img/vendor-7.jpg" alt="">
                        </div>
                        <div class="vendor-item border p-4">
                            <img src="img/vendor-8.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <!-- Footer Start -->
    <div data-aos="fade-down" data-aos-anchor-placement="top-bottom">
        <?php
        include '<include/footer.php';
        ?>
    </div>
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

    <!-- AOS ANIMATION -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>