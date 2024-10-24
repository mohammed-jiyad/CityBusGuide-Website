<?php
session_start();
include('connection1.php'); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

function sendemail_verify($name, $email, $verification_code) {
    $mail = new PHPMailer(true);  
    try {
         
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;              
        $mail->Username   = 'citybusguide2024@gmail.com';  
        $mail->Password   = 'uviuiyykdavvprjg';      
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  
        $mail->Port       = 587;              

         
        $mail->setFrom('citybusguide2024@gmail.com');
        $mail->addAddress($email);

        
        $mail->isHTML(true);  
        $mail->Subject = 'Email Verification from City Bus Guide';
        $email_template = '<p>Your Verification Code is: <b style="font-size:30px;">' . $verification_code . '</b></p>';
        $mail->Body = $email_template;

        
        $mail->send();
        echo '<script>
        window.location.href = "veri.php";
        </script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['regist'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $verify_token = md5(rand());  
    date_default_timezone_set('Asia/Kolkata');
    $timee=date('Y-m-d H:i:s');
    
    

     
    $sql = "SELECT email FROM regg WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo '<script>
                  alert("Email ID exists");
                  window.location.href = "reg.php";
              </script>';
    } else {
         
        $verification_code = mt_rand(100000, 999999); 
        $query = "INSERT INTO regg (name, phone, email, password, verify_token, verification_code,last_time) 
                  VALUES ('$name', '$phone', '$email', '$password', '$verify_token', '$verification_code','$timee')";
        $query_run = mysqli_query($conn, $query);
        
        if ($query_run) {
            echo '<script>
                      alert("Registration successful! Please Verify your Email");
                      window.location.href = "veri.php";
                  </script>';
            sendemail_verify($name, $email, $verification_code);
             
        } else {
            $_SESSION['status'] = "Registration failed.";
            
            header("Location: reg.php");
        }

       
    }
}
?>
