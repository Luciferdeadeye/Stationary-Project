<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Karachi'); // change according timezone
    $currentTime = date('d-m-Y h:i:s A', time());


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ART | Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="assets/images/fav.jpg" />
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
        <div class="container-scroller">
            <!-- SIDEBAR -->
            <?php
            include './includes/sidebar.php'
            ?>
            <div class="container-fluid page-body-wrapper">
                <!-- NAVBAR -->

                <?php
                include 'includes/navbar.php';
                ?>
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="page-header">
                            <h3 class="page-title"> Today's Orders </h3>
                             
                        </div>
                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <?php if (isset($_GET['del'])) { ?>
                                            <div class="alert alert-error">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="table-responsive">

                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th> Name</th>
                                                        <th width="50">Email /Contact no</th>
                                                        <th>Shipping Address</th>
                                                        <th>Product </th>
                                                        <th>Qty </th>
                                                        <th>Amount </th>
                                                        <th>Order Date</th>
                                                        <th>Action</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $f1 = "00:00:00";
                                                    $from = date('Y-m-d') . " " . $f1;
                                                    $t1 = "23:59:59";
                                                    $to = date('Y-m-d') . " " . $t1;
                                                    $query = mysqli_query($con, "select users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId where orders.orderDate Between '$from' and '$to'");
                                                    $cnt = 1;
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo htmlentities($cnt); ?></td>
                                                            <td><?php echo htmlentities($row['username']); ?></td>
                                                            <td><?php echo htmlentities($row['useremail']); ?>/<?php echo htmlentities($row['usercontact']); ?></td>

                                                            <td><?php echo htmlentities($row['shippingaddress'] . "," . $row['shippingcity'] . "," . $row['shippingstate'] . "-" . $row['shippingpincode']); ?></td>
                                                            <td><?php echo htmlentities($row['productname']); ?></td>
                                                            <td><?php echo htmlentities($row['quantity']); ?></td>
                                                            <td><?php echo htmlentities($row['quantity'] * $row['productprice'] + $row['shippingcharge']); ?></td>
                                                            <td><?php echo htmlentities($row['orderdate']); ?></td>
                                                            <td> <a href="updateorder.php?oid=<?php echo htmlentities($row['id']); ?>" title="Update order" target="_blank"><div class="btn btn-primary">Edit</div></a>
                                                            </td>
                                                        </tr>

                                                    <?php $cnt = $cnt + 1;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>










        <!-- plugins:js -->
        <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="assets/vendors/chart.js/Chart.min.js"></script>
        <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
        <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/hoverable-collapse.js"></script>
        <script src="assets/js/misc.js"></script>
        <script src="assets/js/settings.js"></script>
       
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->
    </body>
<?php } ?>

    </html>