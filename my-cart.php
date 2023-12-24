<?php
session_start();
error_reporting(0);
include('include/config.php');

// CODE FOR GETTING PRODUCT NUMBER

if(isset($_SESSION['product_no'])) {
    $product_no = $_SESSION['product_no'];
    echo "Product No: $product_no";
} else {
    echo "Product No not set.";
}

// CODE FOR GETTING PRODUCT NUMBER END


if (isset($_POST['submit'])) {
    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['quantity'] as $key => $val) {
            if ($val == 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $val;
            }
        }
        echo "<script>alert('Your Cart hasbeen Updated');</script>";
    }
}
// Code for Remove a Product from Cart
if (isset($_POST['remove_code'])) {

    if (!empty($_SESSION['cart'])) {
        foreach ($_POST['remove_code'] as $key) {

            unset($_SESSION['cart'][$key]);
        }
        echo "<script>alert('Item Has Been Deleted');</script>";
    }
}















// code for insert product in order table




if (isset($_POST['ordersubmit'])) {
    if (strlen($_SESSION['login']) == 0) {
        header('location: login.php');
        exit; // Terminate script execution after the redirect
    } else {
        $quantity = $_POST['quantity'];
        $pdd = $_SESSION['pid'];
        $value = array_combine($pdd, $quantity);

        foreach ($value as $qty => $val34) {
            $userId = $_SESSION['id'];
            $qty = (int)$qty; // Ensure $qty is an integer
            $val34 = (int)$val34; // Ensure $val34 is an integer

            // Perform database insert (you should add error handling here)
            $insertQuery = "INSERT INTO orders (userId, productId, quantity) VALUES ('$userId', '$qty', '$val34')";
            mysqli_query($con, $insertQuery);
        }

        // Redirect to checkout.php after processing all orders
        header('location: checkout.php');
        exit; // Terminate script execution after the redirect
    }
}


// code for billing address updation
// if (isset($_POST['update'])) {
//     $baddress = $_POST['billingaddress'];
//     $bstate = $_POST['bilingstate'];
//     $bcity = $_POST['billingcity'];
//     $bpincode = $_POST['billingpincode'];
//     $query = mysqli_query($con, "update users set billingAddress='$baddress',billingState='$bstate',billingCity='$bcity',billingPincode='$bpincode' where id='" . $_SESSION['id'] . "'");
//     if ($query) {
//         echo "<script>alert('Billing Address has been updated');</script>";
//     }
// }


// code for Shipping address updation
// if (isset($_POST['shipupdate'])) {
//     $saddress = $_POST['shippingaddress'];
//     $sstate = $_POST['shippingstate'];
//     $scity = $_POST['shippingcity'];
//     $spincode = $_POST['shippingpincode'];
//     $query = mysqli_query($con, "update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='" . $_SESSION['id'] . "'");
//     if ($query) {
//         echo "<script>alert('Shipping Address has been updated');</script>";
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">

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


    <!-- Navbar Start -->
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
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">

                <form action="" name="cart" method="post">
                    <?php
                    if (!empty($_SESSION['cart'])) {
                    ?>
                        <table class="table table-mdi-responsive table-bordered text-center mb-0">
                            <thead class="bg-secondary text-dark">
                                <tr>
                                    <th>Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="index.php" class="btn btn-primary">Continue Shopping</a>
                                                <input type="submit" name="submit" value="Update shopping cart" class="btn btn-upper btn-primary pull-right outer-right-xs">
                                            </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody class="align-middle">
                                <?php
                                $pdtid = array();
                                $sql = "SELECT * FROM products WHERE id IN(";
                                foreach ($_SESSION['cart'] as $id => $value) {
                                    $sql .= $id . ",";
                                }
                                $sql = substr($sql, 0, -1) . ") ORDER BY id ASC";
                                $query = mysqli_query($con, $sql);
                                $totalprice = 0;
                                $totalqunty = 0;
                                if (!empty($query)) {
                                    while ($row = mysqli_fetch_array($query)) {
                                        $quantity = $_SESSION['cart'][$row['id']]['quantity'];
                                        $subtotal = $_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'];
                                        $shippingcharge = $_SESSION['cart'][$row['id']]['quantity'] + $row['shippingCharge'];
                                        $totalprice += $subtotal;
                                        $_SESSION['qnty'] = $totalqunty += $quantity;

                                        array_push($pdtid, $row['id']);
                                        //print_r($_SESSION['pid'])=$pdtid;exit;
                                ?>

                                        <tr>
                                            <td class="align-middle"><img src="admin/productimages/<?php echo $row['id']; ?>/<?php echo $row['productImage1']; ?>" alt="" style="width: 50px;"><?php echo $row['productName'];
                                                                                                                                                                                                $_SESSION['sid'] = $pd;
                                                                                                                                                                                                ?></td>

                                            <td class="align-middle"><?php echo "Rs" . " " . $row['productPrice']; ?>.00</td>
                                            <td class="align-middle">
                                                <div class="input-group quantity mx-auto" style="width: 100px;">

                                                    <div class="input-group-btn">
                                                        <button class="btn btn-sm btn-primary btn-minus" type="button">
                                                            <i class="fa fa-minus"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-sm btn-primary btn-plus" type="button">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </div>

                                                </div>
                                                
            </div>
            </td>
            <td class="align-middle"><?php echo ($_SESSION['cart'][$row['id']]['quantity'] * $row['productPrice'] + $row['shippingCharge']); ?>.00</td>

            <td class="align-middle"><input type="checkbox" name="remove_code[]" class="form-check-input" value="<?php echo htmlentities($row['id']); ?>"></td>
            </tr>
        <?php } ?>


        </tbody>
        </table>

        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                </div>
                <div class="card-body">

                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">Rs .<?php echo $_SESSION['st'] = "$subtotal" . ".00" ?></h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">Rs .<?php echo $_SESSION['sc'] = "$shippingcharge" . ".00"; ?></h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">Rs .<?php echo $_SESSION['tp'] = "$totalprice" + "$shippingcharge" . ".00"; ?></h5>
                    </div>

                <?php

                                }
                                $_SESSION['pid'] = $pdtid;
                ?>
                <button class="btn btn-block btn-primary my-3 py-3" type="submit" name="ordersubmit">Proceed To Checkout</button>
            <?php } else {
                        echo "Your shopping Cart is empty";
                    } ?>
            </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Cart End -->






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