<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="icon" href="assets/img/biwta-logo.png" type="image/png">
</head>

<body>
    <div class="wrapper">
    <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-menu"></i>
                </button>
                <div class="sidebar-logo">
                    <a href="#"><img src="assets/img/hydro_logo_long.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link active">
                        <i class="lni lni-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="survey.php" class="sidebar-link">
                        <i class="lni lni-bar-chart"></i>
                        <span>Survey Chart</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="tidal_data.php" class="sidebar-link">
                        <i class="lni lni-graph"></i>
                        <span>Tidal Data</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="tide_table.php" class="sidebar-link">
                        <i class="lni lni-agenda"></i>
                        <span>Tide Table</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="milage.php" class="sidebar-link">
                        <i class="lni lni-direction"></i>
                        <span>River Milage</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="map.php" class="sidebar-link">
                        <i class="lni lni-map"></i>
                        <span>Map</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="cart.php" class="sidebar-link">
                        <i class="lni lni-shopping-basket"></i>
                        <span>My Cart</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="history.php" class="sidebar-link">
                        <i class="lni lni-archive"></i>
                        <span>Order History</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="tariff.php" class="sidebar-link">
                        <i class="lni lni-layout"></i>
                        <span>Data Tarrif</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="notification.php" class="sidebar-link">
                        <i class="lni lni-popup"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="profile.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="login.php" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
        <!-- main elements begin -->
        <div class="main p-3">
            
            <h1 class="page-heading">
                <i class="lni lni-map"></i>
                Maps</h1>

        
            <div class="container">
                
                <h1 class="text-center">
                <?php echo $_SESSION['user_id'];?>'S New Map Request</h1>
                <div class="row justify-content-center">
                   
                    <div class="form-container col-md-12">                                      
                        <form action="">
                            <div class="form-group">
                                <div class="row">
                                    <label for="map_type" class="col-sm-5 col-form-label">Type of Map:</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <select class="form-control" id="map_type" name="map_type">
                                                <option value="" disabled selected>Select Type of Map</option>
                                                <option value="">Circular Waterways</option>
                                                <option value="">Classification of Roughness</option>
                                                <option value="">Draft Restrictions Map</option>
                                                <option value="">Classification of Inland Waterways</option>
                                                <option value="">Bangladesh-India Protocol Routes</option>
                                            </select>
                                            <!-- <div class="input-group-append">
                                              <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div> -->
                                          </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="row">
                                    <label for="quantity" class="col-sm-5 col-form-label">Quantity:</label>
                                    <div class="col-sm-7">
                                        <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Enter Quantity">
                                    </div>
                                </div>
                            </div>
    
                            <div class="btn-container row justify-content-center">
                                <button class="btn btn-primary rounded-0 mb-1"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                                <button class="btn btn-success rounded-0 mb-1"><i class="fas fa-save"></i> Save and Add New</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- main elements end -->
    </div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
</body>

</html>