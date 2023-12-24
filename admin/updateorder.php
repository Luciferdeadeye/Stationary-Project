<?php
session_start();
error_reporting(0);
include_once 'includes/config.php';
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
} else {
    $oid = intval($_GET['oid']);
    if (isset($_POST['submit2'])) {
        $status = $_POST['status'];
        $remark = $_POST['remark']; //space char

        $query = mysqli_query($con, "insert into ordertrackhistory(orderId,status,remark) values('$oid','$status','$remark')");
        $sql = mysqli_query($con, "update orders set orderStatus='$status' where id='$oid'");
        echo "<script>alert('Order updated sucessfully...');</script>";
        //}
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
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>ART | Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css">

        <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->


        <!-- Layout styles -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- End layout styles -->
        <link rel="shortcut icon" href="assets/images/fav.jpg" />



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
                        <div class="row">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Order Updation</h4>


                                        <form class="forms-sample" name="updateticket" id="updateticket" method="post">
                                            <table class="table">
                                                <tr>
                                                    <td>Order Id</td>
                                                    <td><?php echo $oid; ?></td>
                                                </tr>
                                                <?php
                                                $ret = mysqli_query($con, "SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
                                                while ($row = mysqli_fetch_array($ret)) {
                                                ?>
                                                    <tr>
                                                        <td>At Date</td>
                                                        <td><?php echo $row['postingDate']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td><?php echo $row['status']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Remarks</td>
                                                        <td><?php echo $row['remark']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <hr />
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                <?php
                                                $st = 'Delivered';
                                                $rt = mysqli_query($con, "SELECT * FROM orders WHERE id='$oid'");
                                                while ($num = mysqli_fetch_array($rt)) {
                                                    $currrentSt = $num['orderStatus'];
                                                }
                                                if ($st == $currrentSt) { ?>
                                                    <tr>
                                                        <td colspan="2"><b>
                                                                Product Delivered </b></td>
                                                    <?php } else {
                                                    ?>
                                                    <tr>
                                                        <td>Status</td>
                                                        <td>
                                                            <select name="status" class="form-control" required>
                                                                <option value="">Select Status</option>
                                                                <option value="in Process">In Process</option>
                                                                <option value="Delivered">Delivered</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Remarks</td>
                                                        <td>
                                                            <textarea class="form-control" cols="50" rows="7" name="remark" required="required"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <!-- <td></td> -->
                                                        <td colspan="2"><input type="submit" name="submit2" value="update" class="form-control" style="cursor: pointer;" /> &nbsp;&nbsp;
                                                            <input name="Submit2" type="submit" class="form-control" value="Close this Window " onClick="return f2();" style="cursor: pointer;" />
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </table>



                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        include 'includes/footer.php'
                        ?>

                    </div>
                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
            <!-- container-scroller -->
            <!-- plugins:js -->
            <script src="assets/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="assets/vendors/chart.js/Chart.min.js"></script>
            <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
            <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
            <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
            <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="assets/js/off-canvas.js"></script>
            <script src="assets/js/hoverable-collapse.js"></script>
            <script src="assets/js/misc.js"></script>
            <script src="assets/js/settings.js"></script>
            <script src="assets/js/todolist.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page -->
            <script src="assets/js/dashboard.js"></script>
            <!-- End custom js for this page -->
    </body>
<?php } ?>

    </html>