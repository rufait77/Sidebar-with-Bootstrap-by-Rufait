<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['login_mail'];
    $password = $_POST['login_pass'];

    $stmt = $conn->prepare("SELECT full_name, password FROM info WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            header('Location: index.php');
            exit();
        } else {
            $_SESSION['login_error'] = "Wrong Credentials";
        }
    } else {
        $_SESSION['login_error'] = "Wrong Credentials";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login - BIWTA HYDROGRAPHY</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/biwta-logo.png" type="image/png">
</head>
<body class="bg-fill vh-100 d-flex justify-content-center align-items-center">
    <div class="container-sm p-4" id="login-box">
        <div class="row">
            <div class="col-lg-6">
                <img src="assets/img/biwta-logo.png" alt="BIWTA" class="img-fluid mx-auto d-block" width="120">
                <h3 class="text-center pt-3 pb-3"><b>BIWTA <br>HYDROGRAPHIC RESOURCES</b></h3>
                <div class="row mt-4">
                    <div class="col-sm-6">
                        <a href="assets/pdf/biwta_guide.pdf" target="_blank"><div class="btn-danger text-center p-2" id="user-guide"><i class="fas fa-file-pdf"></i> User Manual </div></a>
                    </div>
                    <div class="col-sm-6">
                        <div class="btn-info text-center p-2" style="cursor: pointer;" data-toggle="modal" data-target="#contactModal"><i class="fa fa-envelope"></i> Contact Us </div></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 my-auto">
                <h3 class="text-center logbox-title"><b>Login Here</b></h3>
                <?php
                if (isset($_SESSION['login_error'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
                    unset($_SESSION['login_error']);
                }
                ?>
                <form action="" method="post" class="p-2">
                    <input type="email" name="login_mail" placeholder="Your Email" class="form-control mb-3 mt-2" required>
                    <input type="password" name="login_pass" placeholder="Your Password" class="form-control mb-3" required>
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="submit" value="Login >>" class="btn btn-primary btn-md mx-auto w-100 mt-1 mb-1 btn-rad-0" name="login">
                        </div>
                        <div class="col-sm-6">
                            <div class="btn btn-secondary text-center btn-md mx-auto w-100 mt-1 mb-1 btn-rad-0" data-toggle="modal" data-target="#registerModal">Sign Up <i class="fas fa-sign-in-alt"></i></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registerModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register to BIWTA Hydrographic Database</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php
                                if (isset($_SESSION['reg_success'])) {
                                    echo '<div class="alert alert-success">' . $_SESSION['reg_success'] . '</div>';
                                    unset($_SESSION['reg_success']);
                                }
                                if (isset($_SESSION['reg_error'])) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['reg_error'] . '</div>';
                                    unset($_SESSION['reg_error']);
                                }
                                ?>
                                <form action="payment_handler.php" method="post" enctype="multipart/form-data" id="reg_form" class="mt-2">
                                    <div class="form-row">
                                        <div class="col-3">Full Name</div>
                                        <div class="col-9"><input type="text" name="full_name" required class="form-control" placeholder="Enter Full Name"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-3">Email</div>
                                        <div class="col-9"><input type="email" name="reg_email" required class="form-control" placeholder="Enter Email"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-3">ID Type</div>
                                        <div class="col-9">
                                            <select name="reg_id_type" class="form-control" required>
                                                <option value="" disabled>Select ID Type</option>
                                                <option value="NID">NID</option>
                                                <option value="Passport">Passport</option>
                                                <option value="Student ID">Student ID</option>
                                                <option value="Professional ID">Professional ID</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-3">Upload ID</div>
                                        <div class="col-9">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" id="reg_user_id" name="reg_user_id" class="custom-file-input" required>
                                                    <label class="custom-file-label" for="reg_user_id">Choose ID File</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-3">Profession</div>
                                        <div class="col-9"><input type="text" name="reg_profession" required class="form-control" placeholder="Enter Your Profession"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-3">Institution</div>
                                        <div class="col-9"><input type="text" name="reg_inst" required class="form-control" placeholder="Enter Your Organization"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-3">Contact No</div>
                                        <div class="col-9"><input type="tel" name="reg_contact" required class="form-control" placeholder="Enter Contact Number"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-3">Password</div>
                                        <div class="col-9"><input type="password" name="reg_pass" required class="form-control" placeholder="Enter Password"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-3">Confirm Password</div>
                                        <div class="col-9"><input type="password" name="reg_cfm_pass" required class="form-control" placeholder="Confirm Password"></div>
                                    </div>
                                    <input type="submit" value="Register" class="btn-rad-0 btn btn-success btn-md mx-auto d-block" id="reg_btn">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center text-danger">
                    <hr>
                    <p>Payment of BDT 200.00 is required for successful registration.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="contactModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Contact BIWTA Hydrographic Services</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container p-4 align-content-center justify-content-center">
                        <div class="row mb-1">
                            <div class="col-2 text-center text-success"><i class="fab fa-whatsapp-square fa-2x"></i></div>
                            <div class="col-10 text-left info">+8801700000000</div>
                        </div>
                        <div class="row">
                            <div class="col-2 text-center"><i class="far fa-envelope fa-2x"></i></div>
                            <div class="col-10 text-left info">info@biwtahydro.com.bd</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/all.min.js"></script>
</body>
</html>
