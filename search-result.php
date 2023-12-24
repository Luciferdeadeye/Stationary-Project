<?php
session_start();
error_reporting(0);
include('include/config.php');
$find = "%{$_POST['product']}%";
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
            echo "<script>alert('Product has been added to the cart')</script>";
            echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
        } else {
            $message = "Product ID is invalid";
        }
    }
}
// COde for Wishlist
if (isset($_GET['pid']) && $_GET['action'] == "wishlist") {
    if (strlen($_SESSION['login']) == 0) {
        header('location:login.php');
    } else {
        mysqli_query($con, "insert into wishlist(userId,productId) values('" . $_SESSION['id'] . "','" . $_GET['pid'] . "')");
        echo "<script>alert('Product aaded in wishlist');</script>";
        header('location:my-wishlist.php');
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

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Search Result</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Search Result</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <?php
            $ret = mysqli_query($con, "select * from products where productName like '$find'");
            $num = mysqli_num_rows($ret);
            if ($num > 0) {
                while ($row = mysqli_fetch_array($ret)) { ?>
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">

                                <div class="text-center">
                                    <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>" class="cat-img overflow-hidden mb-3">
                                        <img class="img-fluid" src="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" data-echo="admin/productimages/<?php echo htmlentities($row['id']); ?>/<?php echo htmlentities($row['productImage1']); ?>" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><?php echo htmlentities($row['productName']); ?></h6>
                                <div class="d-flex justify-content-center">
                                    <h6><?php echo htmlentities($row['productPrice']); ?></h6>
                                    <h6 class="text-muted ml-2"><del><?php echo htmlentities($row['productPriceBeforeDiscount']); ?></del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="product-details.php?pid=<?php echo htmlentities($row['id']); ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                <a href="index.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                            </div>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <h3>No Product Found</h3>
                </div>

            <?php } ?>
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

</html>