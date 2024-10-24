<?php
    session_start();
    unset($_SESSION['authenticated']);
    unset($_SESSION['auth_user']);
    echo '<script>
                alert("Logged Out Successfully");
                window.location.href = "miniproj.php";
              </script>';
?>