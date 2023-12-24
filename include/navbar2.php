<?php 

 if(isset($_Get['action'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		}
	}
?>



<div class="container-fluid">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">

                    <?php $sql = mysqli_query($con, "select id,categoryName  from category");
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <a href="category.php?cid=<?php echo $row['id']; ?>" class="nav-item nav-link"><?php echo $row['categoryName']; ?></a>
                    <?php } ?>
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">A</span>RT</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="shop.php" class="nav-item nav-link">Shop</a>
                        <!-- <a href="detail.html" class="nav-item nav-link"></a> -->
                        <a href="index.php #offer" class="nav-item nav-link">Deals</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                    <?php
if(!empty($_SESSION['cart'])){
	?>
                    <div class="navbar-nav ml-auto py-0">
                        <a href="my-cart.php" class="btn border nav-item nav-link">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="badge"><?php echo $_SESSION['qnty'];?></span>
                        </a>
                        <a href="my-wishlist.php" class="btn border nav-item nav-link">
                            <i class="fas fa-heart"></i>
                            <span class="badge"></span>
                        </a>
                        <?php  } ?>
                        <?php if (strlen($_SESSION['login']) == 0) {   ?>

                            <a href="my-account.php" class="btn border nav-item nav-link">
                                <i class="fas fa-sign-in-alt"></i>
                                <span class="badge">Login</span>
                            </a>
                            <a href="my-account.php" class="btn border nav-item nav-link">
                                <i class="fa-duotone fa-pen-to-square"></i>
                                <span class="badge">Register</span>
                            </a>
                        <?php } else { ?>
                            <a href="logout.php" class="btn border nav-item nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="badge">Logout</span>
                            </a>
                        <?php } ?>

                        <?php if (strlen($_SESSION['login'])) {   ?>
                            <a href="my-account.php" class="btn border nav-item nav-link">
                                <i class="fas fa-user"></i>
                                <span class="badge"><?php echo htmlentities($_SESSION['username']); ?></span>
                            <?php } ?>
                            </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>