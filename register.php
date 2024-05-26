<?php
session_start(); // Start the session
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $email = $_POST['reg_email'];
    $id_type = $_POST['reg_id_type'];
    $profession = $_POST['reg_profession'];
    $institution = $_POST['reg_inst'];
    $contact_no = $_POST['reg_contact'];
    $password = password_hash($_POST['reg_pass'], PASSWORD_BCRYPT);

    // File upload
    $id_file = $_FILES['reg_user_id']['name'];
    $id_file_tmp = $_FILES['reg_user_id']['tmp_name'];
    $id_file_folder = 'uploads/' . basename($id_file);

    if (move_uploaded_file($id_file_tmp, $id_file_folder)) {
        $stmt = $conn->prepare("INSERT INTO info (full_name, email, id_type, id_file, profession, institution, contact_no, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $full_name, $email, $id_type, $id_file_folder, $profession, $institution, $contact_no, $password);

        if ($stmt->execute()) {
            $_SESSION['reg_success'] = "Registration successful!";
        } else {
            $_SESSION['reg_error'] = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $_SESSION['reg_error'] = "Error uploading file.";
    }

    $conn->close();
    header('Location: login.php'); // Redirect back to the login page
    exit();
}
?>
