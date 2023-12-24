<?php
session_start();
error_reporting(0);
include_once 'include/config.php';
$oid = intval($_GET['oid']);
if(isset($_SESSION['product_no'])) {
    $product_no = $_SESSION['product_no'];
    // echo "Product No: $product_no";
} else {
    // echo "Product No not set.";
}


$sqlforp = "SELECT LEFT(paymentMethod, 1) AS first_letter FROM orders WHERE userId='".$_SESSION['id']."'";
$resultforp = $con->query($sqlforp);

if ($resultforp->num_rows > 0) {
    // Output data of each row
    while($row1 = $resultforp->fetch_assoc()) {
        echo "" . $row1["first_letter"];
        $first_letter = $row1["first_letter"];
    }
} else {
    echo "0 results";
}



echo "<br>";




$orderid = $first_letter . $product_no . rand(11111111,99999999);




// echo $orderid;




// echo $first_letter;




// if (isset($_POST['submit'])) {
//     $query = "DELETE FROM `orders` WHERE `orders`.`id` = $oid";
//     mysqli_query($con, $query);

//     header('location: shop.php');
// }

if (isset($_POST['delete'])) {
    $query = "DELETE  FROM `orders` WHERE `orders`.`id` = $oid";
    mysqli_query($con, $query);

    header('location:shop.php');
}
?>
<script language="javascript" type="text/javascript">
    function f2() {
        window.close();
    }
    ser

    function f3() {
        window.print();
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ART | Staionary Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="./img/ART.png" rel="shortcut-icon">
    


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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Track Orders</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Track Orders</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->





    <!-- MAIN CONTENT START -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 table-responsive">
                <form name="updateticket" id="updateticket" method="post">
                    <table class="table table-bordered table-hover">

                        <tr height="50">
                            <td colspan="2" class="fontkink2" style="padding-left:0px;">
                                <div class="fontpink2"> <b>Order Tracking Details !</b></div>
                            </td>

                        </tr>
                        <tr height="30">
                            <td class="fontkink1"><b>order Id:</b></td>
                            <td class="fontkink"><?php echo $oid; ?></td>
                        </tr>
                        <tr>
                            <td class="fontlink1"><b>Order Number</b></td>
                            <td class="fontlink"><?php echo $orderid; ?></td>
                        </tr>

                        <?php
                        $ret = mysqli_query($con, "SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
                        $num = mysqli_num_rows($ret);
                        if ($num > 0) {
                            while ($row = mysqli_fetch_array($ret)) {
                        ?>



                                <tr height="20">
                                    <td class="fontkink1"><b>At Date:</b></td>
                                    <td class="fontkink"><?php echo $row['postingDate']; ?></td>
                                </tr>
                                <tr height="20">
                                    <td class="fontkink1"><b>Status:</b></td>
                                    <td class="fontkink"><?php echo $row['status']; ?></td>
                                </tr>
                                <tr height="20">
                                    <td class="fontkink1"><b>Remark:</b></td>
                                    <td class="fontkink"><?php echo $row['remark']; ?></td>
                                </tr>
                                <!-- <tr>
                                    <td>

                                        <form action="" method="post">
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-danger  btn-lg">Cancel Order</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr> -->


                                <tr>
                                    <td colspan="2">
                                        <hr />
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            ?>
                            <tr>
                                <td colspan="2">Order Not Process Yet</td>
                                <td>
                                    <form method="post">
                                        <button type="submit" name="delete" class="btn btn-primary">Cancel Order</button>
                                    </form>
                                </td>
                            </tr>
                        <?php  }
                        $st = 'Delivered';
                        $rt = mysqli_query($con, "SELECT * FROM orders WHERE id='$oid'");
                        while ($num = mysqli_fetch_array($rt)) {
                            $currrentSt = $num['orderStatus'];
                        }
                        if ($st == $currrentSt) { ?>
                            <tr>
                                <td colspan="2"><b>
                                        Product Delivered successfully </b></td>
                            <?php }

                            ?>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <!-- MAIN CONTENT END -->












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