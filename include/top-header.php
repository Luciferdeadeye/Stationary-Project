
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="index.php #webfaq">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="contact.php">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="index.php #feedback">Feedback</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
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
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary">A</span>RT</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form method="POST" name="search" action="search-result.php">
                    <div class="input-group">
                        <input type="text" class="form-control" name="product" placeholder="Search for products" required>
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <button type="submit" name="search" style="border: none; outline: none; background: transparent;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>


            <?php if (strlen($_SESSION['login']) == 0) {   ?>

                      &nbsp;
            <?php } else {?>
                <div class="col-lg-3 col-6 text-right">
                    <!-- <a href="track-order.php" class="btn btn-primary text-black ">
                        <i class="fas fa-search-location"></i> 
                        Track Order
                    </a> -->
                    <a href="order-history.php" class="btn btn-primary text-black ">
                        <!-- <i class="fas fa-search-location"></i>  -->
                        My Orders
                    </a>
                </div>
                
                <?php }?>
            
        </div>
    </div>
