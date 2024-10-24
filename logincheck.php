<?php
session_start();

include('connection1.php');

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);
    $captcha = trim($_POST['captcha']);

    if (!empty($email) && !empty($password) && !empty($captcha)) {
        // Check CAPTCHA
        if ($captcha != $_SESSION['captcha']) {
            echo '<script>
                alert("Invalid CAPTCHA");
                window.location.href = "data.php";
                </script>';
            exit;
        }

        // Sanitize inputs
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        // Check login credentials
        $sql = "SELECT * FROM regg WHERE email='$email' AND password='$password' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            if ($row['verify_status'] == "1") {
                $_SESSION['authenticated'] = true;
                $_SESSION['auth_user'] = [
                    'username' => $row['name'],
                    'phone' => $row['phone'],
                    'email' => $row['email']
                ];
                echo '<script>
                    alert("Logged in Successfully");
                    window.location.href = "miniproj.php";
                    </script>';
            } else {
                echo '<script>
                    alert("Please Verify your Email to Continue");
                    window.location.href = "data.php";
                    </script>';
            }
        } else {
            echo '<script>
                alert("Invalid Email or Password. If not Registered, Please Register");
                window.location.href = "data.php";
                </script>';
        }
    } else {
        echo '<script>
            alert("All Fields are mandatory");
            window.location.href = "data.php";
            </script>';
    }
}
?>
