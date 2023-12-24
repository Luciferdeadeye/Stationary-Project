<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
    <a class="sidebar-brand brand-logo" href="#" style="text-decoration: none; text-transform: uppercase; color:#fff;">ART</a>
    <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo.png" alt="logo" /></a>
  </div>
  <ul class="nav">
    <li class="nav-item profile">
      <div class="profile-desc">
        <div class="profile-pic">
          <div class="count-indicator">
            <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
            <span class="count bg-success"></span>
          </div>
          <div class="profile-name">
            <h5 class="mb-0 font-weight-normal">Admin</h5>
            <span>Website Holder</span>
          </div>
        </div>
        <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
          <div class="dropdown-divider"></div>
          <a href="change-password.php" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-onepassword  text-info"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-dark rounded-circle">
                <i class="mdi mdi-calendar-today text-success"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <p class="preview-subject ellipsis mb-1 text-small">Log Out</p>
            </div>
          </a>
        </div>
      </div>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Navigation</span>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="dashboard.php">
        <span class="menu-icon">
          <i class="mdi mdi-speedometer"></i>
        </span>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-icon">
        <i class="mdi mdi-cog text-success"></i>
        </span>
        
        <span class="menu-title">Orders Management</span> 
        <i class="mdi mdi-menu-down"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="todays-orders.php"><i class="mdi mdi-cart-arrow-down"></i> &nbsp;Today's Orders</a></li>
          <li class="nav-item"> <a class="nav-link" href="pending-orders.php"><i class="mdi mdi-store-clock-outline"></i>&nbsp; Pending Orders</a></li>
          <li class="nav-item"> <a class="nav-link" href="delivered-orders.php"><i class="mdi mdi-store-check"></i>&nbsp; Delivered Orders</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="manage-users.php">
        <span class="menu-icon">
          <i class="mdi mdi-account-group"></i>
        </span>
        <span class="menu-title">Manage Users</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="category.php">
        <span class="menu-icon">
          <i class="mdi mdi-table-large"></i>
        </span>
        <span class="menu-title">Create Category</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="sub-category.php">
        <span class="menu-icon">
          <i class="mdi mdi-sitemap"></i>
        </span>
        <span class="menu-title">Sub Category</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="insert-product.php">
        <span class="menu-icon">
          <i class="mdi mdi-basket-plus"></i>
        </span>
        <span class="menu-title">Insert Products</span>
      </a>
    </li>
   
    <li class="nav-item menu-items">
      <a class="nav-link" href="manage-products.php">
        <span class="menu-icon">
          <i class="mdi mdi-store-cog"></i>
        </span>
        <span class="menu-title">Manage Products</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="user-logs.php">
        <span class="menu-icon">
          <i class="mdi mdi-login"></i>
        </span>
        <span class="menu-title">User Login Log</span>
      </a>
    </li>
    <li class="nav-item menu-items">
      <a class="nav-link" href="logout.php">
        <span class="menu-icon">
          <i class="mdi mdi-logout"></i>
        </span>
        <span class="menu-title">Log Out</span>
      </a>
    </li>
  </ul>
</nav>