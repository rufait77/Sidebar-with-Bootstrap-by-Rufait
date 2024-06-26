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
    <link rel="stylesheet" href="assets/datepicker/css/bootstrap-datepicker.min.css">
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
                <i class="lni lni-graph"></i>
                <?php echo $_SESSION['user_id'];?>'S Tidal Data</h1>

        
            <div class="container">
                
                <h1 class="text-center">New Tidal Data Request</h1>
                <div class="row justify-content-center">
                   
                    <div class="form-container col-md-12">                                      
                        <form action="">
                            <div class="form-group">
                                <div class="row">
                                    <label for="data_type" class="col-sm-5 col-form-label">Type of Data:</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <select class="form-control" id="data_type" name="data_type">
                                                <option value="" disabled selected>Select Data Type</option>
                                                <option value="">Monthly Extremes</option>
                                                <option value="">Monthly Mean</option>
                                                <option value="">Daily High-Low</option>
                                                <option value="">Hourly Heights</option>
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
                                    <label for="district" class="col-sm-5 col-form-label">District:</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <select class="form-control" id="district" name="district">
                                                <option value="" disabled selected>Select District</option>
                                                <option value="">Naogaon</option>
                                                <option value="">Chandpur</option>
                                                <option value="">Rajbari</option>
                                                <option value="">Kotbari</option>
                                                <option value="">Pirganj</option>
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
                                    <label for="river" class="col-sm-5 col-form-label">River:</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <select class="form-control" id="river" name="river">
                                                <option value="" disabled selected>Select River</option>
                                                <option value="">Padma</option>
                                                <option value="">Meghna</option>
                                                <option value="">Jamuna</option>
                                                <option value="">Brahmaputra</option>
                                                <option value="">Shitalakkha</option>
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
                                    <label for="station" class="col-sm-5 col-form-label">Station:</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <select class="form-control" id="station" name="station">
                                                <option value="" disabled selected>Select Station</option>
                                                <option value="">Dhaka</option>
                                                <option value="">Chattogram</option>
                                                <option value="">Rajshahi</option>
                                                <option value="">Syllhet</option>
                                                <option value="">Jashore</option>
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
                                    <label for="dateFrom" class="col-sm-5 col-form-label">Date From:</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker" id="dateFrom" name="dateFrom" placeholder="Enter Date" autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="dateTo" class="col-sm-5 col-form-label">Date To:</label>
                                    <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker" id="dateTo" name="dateTo" placeholder="Enter Date" autocomplete="off">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                        </div>
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
    <script src="assets/datepicker/js/bootstrap-datepicker.min.js"> </script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/dashboard.js"></script>    
    
</body>

</html>