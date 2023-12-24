<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {

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
        <script language="javascript" type="text/javascript">
            var popUpWin = 0;

            function popUpWindow(URLStr, left, top, width, height) {
                if (popUpWin) {
                    if (!popUpWin.closed) popUpWin.close();
                }
                popUpWin = open(URLStr, 'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width=' + 600 + ',height=' + 600 + ',left=' + left + ', top=' + top + ',screenX=' + left + ',screenY=' + top + '');
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
                <h1 class="font-weight-semi-bold text-uppercase mb-3">Order History </h1>
                <div class="d-inline-flex">
                    <p class="m-0"><a href="">Home</a></p>
                    <p class="m-0 px-2">-</p>
                    <p class="m-0">My Order History</p>
                </div>
            </div>
        </div>
        <!-- Page Header End -->





        <!-- MAIN CONTENT START -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 table-responsive">
                    <form action="" name="cart" method="post">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">#</th>
                                    <th class="cart-description item">Image</th>
                                    <th class="cart-product-name item">Product Name</th>

                                    <th class="cart-qty item">Quantity</th>
                                    <th class="cart-sub-total item">Price Per unit</th>
                                    <th class="cart-sub-total item">Shipping Charge</th>
                                    <th class="cart-total item">Grandtotal</th>
                                    <th class="cart-total item">Payment Method</th>
                                    <th class="cart-description item">Order Date</th>
                                    <th class="cart-total last-item">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $query = mysqli_query($con, "select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.userId='" . $_SESSION['id'] . "' and orders.paymentMethod is not null");?>
                                    <?php
											$cnt = 1;
											while ($row = mysqli_fetch_array($query)) {
											?>
                                            												<tr>
													<td><?php echo $cnt; ?></td>
													<td class="cart-image">
														<a class="entry-thumbnail" href="detail.html">
															<img src="admin/productimages/<?php echo $row['proid']; ?>/<?php echo $row['pimg1']; ?>" alt="" width="84" height="146">
														</a>
													</td>
													<td class="cart-product-name-info">
														<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo $row['opid']; ?>">
																<?php echo $row['pname']; ?></a></h4>


													</td>
													<td class="cart-product-quantity">
														<?php echo $qty = $row['qty']; ?>
													</td>
													<td class="cart-product-sub-total"><?php echo $price = $row['pprice']; ?> </td>
													<td class="cart-product-sub-total"><?php echo $shippcharge = $row['shippingcharge']; ?> </td>
													<td class="cart-product-grand-total"><?php echo (($qty * $price) + $shippcharge); ?></td>
													<td class="cart-product-sub-total"><?php echo $row['paym']; ?> </td>
													<td class="cart-product-sub-total"><?php echo $row['odate']; ?> </td>

													<td>
														<a href="track-order.php?oid=<?php echo htmlentities($row['orderid']); ?>" title="Track order" class="btn btn-primary">
															Track
                                                            
													</td>
												</tr>
											<?php $cnt = $cnt + 1;
											} ?>
                            </tbody>

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
<?php } ?>

    </html>