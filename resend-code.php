<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

function resend_email_verify($name, $email, $verify_code){
    $mail = new PHPMailer(true); // true enables exceptions
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; 
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // SMTP server
        $mail->SMTPAuth   = true;             // Enable SMTP authentication
        $mail->Username   = 'citybusguide2024@gmail.com'; // SMTP username (your Gmail address)
        $mail->Password   = 'uviuiyykdavvprjg';     // SMTP password (your Gmail password or app-specific password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption (should be STARTTLS for port 587)
        $mail->Port       = 587;             // TCP port to connect to

        // Sender and recipient
        $mail->setFrom('citybusguide2024@gmail.com');
        $mail->addAddress($email);

        // Email content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Email Verification from City Bus Guide';
        
        $email_template = '<p>Your Verification Code is: <b style="font-size:30px;">' . $verify_code . '</b></p>';
        $mail->Body = $email_template;

        // Send email
        $mail->send();
        echo '<script>
        window.location.href = "veri.php";
        </script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

include("connection1.php");

if(isset($_POST["resend-email"])){
    if(!empty(trim($_POST["email"]))){
        
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $checkmail = "SELECT * FROM regg WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $checkmail);
        $count = mysqli_num_rows($result);
        
        if($count > 0){
            $row = mysqli_fetch_array($result);
            if($row['verify_status'] == "0"){
                $verification_code = mt_rand(100000, 999999);
                
                $email = $row["email"];
                $name = $row["name"];
                
                // Update verification code in the database
                $update_query = "UPDATE regg SET verification_code='$verification_code' WHERE email='$email'";
                mysqli_query($conn, $update_query);
                
                resend_email_verify($name, $email, $verification_code);
                
                header("Location: veri.php");
                exit(0);
            } else {
                $_SESSION['status'] = "Email is Verified";
                header("Location: resend-email-verification.php");
                exit(0);
            }
        } else {
            echo '<script>
                alert("Email not Registered. Please Register");
                window.location.href = "reg.php";
                </script>';
        }
    } else {
        $_SESSION['status'] = "Please enter the email field";
        header("Location: resend-email-verification.php");
        exit(0);
    }
}
?>
