<?php
session_start();
include 'db_connect.php'; // Ensure this file contains your database connection details and establishes the $conn connection object

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assign received data to variables
    $full_name = $_POST['full_name'];
    $email = $_POST['reg_email'];
    $_SESSION['user_email'] = $email;
    $id_type = $_POST['reg_id_type'];
    $profession = $_POST['reg_profession'];
    $institution = $_POST['reg_inst'];
    $contact_no = $_POST['reg_contact'];
    $password = password_hash($_POST['reg_pass'], PASSWORD_BCRYPT);

    // File upload handling
    $id_file = $_FILES['reg_user_id']['name'];
    $id_file_tmp = $_FILES['reg_user_id']['tmp_name'];
    $id_file_folder = 'uploads/' . basename($id_file);

    // Prepare SQL INSERT statement
    $stmt = $conn->prepare("INSERT INTO tmp_info (full_name, email, id_type, id_file, id_file_tmp, id_file_folder, profession, institution, contact_no, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $full_name, $email, $id_type, $id_file, $id_file_tmp, $id_file_folder, $profession, $institution, $contact_no, $password);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Insert successful
        $_SESSION['tmp_info_inserted'] = true; // Set session variable if needed
        // Redirect or further processing
    } else {
        // Insert failed
        $_SESSION['tmp_info_inserted'] = false; // Set session variable if needed
        // Handle error
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
    //print_r($_FILES);

    //move_uploaded_file($id_file_tmp,$id_file_folder);


    header('Location: dump.php');
    exit();
}
?>

