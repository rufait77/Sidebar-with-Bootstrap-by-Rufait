<?php
session_start(); // Start the session
include 'db_connect.php';
include('smtp/PHPMailerAutoload.php');

function smtp_mailer($to, $subject, $msg) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2;
    $mail->Username = "hydrography.biwta@gmail.com";
    $mail->Password = "yjjyctfrbxgwcgii";
    $mail->SetFrom("hydrography.biwta@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    if (!$mail->Send()) {
        echo $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}

// Assuming you pass email as a GET parameter to identify the user in tmp_info
if (isset($_SESSION['user_email_now'])) {
    $email = $_SESSION['user_email_now'];

    // Fetch data from tmp_info table
    $stmt = $conn->prepare("SELECT full_name, email, id_type, id_file, id_file_tmp, id_file_folder, profession, institution, contact_no, password FROM tmp_info WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($full_name, $email, $id_type, $id_file, $id_file_tmp, $id_file_folder, $profession, $institution, $contact_no, $password);
    $stmt->fetch();
    $stmt->close();

    if (!empty($email)) {
        // Move file to the desired folder
        if (move_uploaded_file($id_file_tmp, $id_file_folder)) {
            // Insert data into info table
            $stmt = $conn->prepare("INSERT INTO info (full_name, email, id_type, id_file, profession, institution, contact_no, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $full_name, $email, $id_type, $id_file_folder, $profession, $institution, $contact_no, $password);

            if ($stmt->execute()) {
                $_SESSION['reg_success'] = "Registration successful!";
                //echo smtp_mailer($email, 'Registration', 'Your Registration was successful');
            } else {
                $_SESSION['reg_error'] = "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $_SESSION['reg_error'] = "Error uploading file.";
            $stmt = $conn->prepare("INSERT INTO info (full_name, email, id_type, id_file, profession, institution, contact_no, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $full_name, $email, $id_type, $id_file_folder, $profession, $institution, $contact_no, $password);

            if ($stmt->execute()) {
                $_SESSION['reg_success'] = "Registration successful!";
                echo smtp_mailer($email, 'Registration', 'Your Registration was successful');
            } else {
                $_SESSION['reg_error'] = "Error: " . $stmt->error;
            }

            $stmt->close();
        }

        // Delete entry from tmp_info table after successful insertion
        $stmt = $conn->prepare("DELETE FROM tmp_info WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->close();
    } else {
        $_SESSION['reg_error'] = "No data found for the provided email.";
    }

    $conn->close();
    echo "Data inserted successfully </br>";
    // echo $email."</br>";
    // echo $full_name."</br>";
    // echo $id_type."</br>";
    // echo $id_file_folder."</br>";
    // echo $id_file_tmp."</br>";
    // echo $id_file."</br>";
    // echo $profession."</br>";
    // echo $institution."</br>";
    // echo $contact_no."</br>";
    // print_r($_FILES);

    header('Location: http://localhost:8080/BIWTA/login.php'); // Redirect back to the login page
    exit();
} else {
    $_SESSION['reg_error'] = "Email not provided.";
    header('Location: http://localhost:8080/BIWTA/login.php'); // Redirect back to the login page
    exit();
}
?>
