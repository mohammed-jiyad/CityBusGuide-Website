<?php
session_start();
include("connection1.php");
if(isset($_GET['token'])){
    $token = $_GET['token'];
    $verify_query="SELECT verify_token,verify_status from regg WHERE verify_token='$token' LIMIT 1";
    $verify = mysqli_query($conn, $verify_query);
    $count = mysqli_num_rows($verify);
    if($count > 0){
        $row=mysqli_fetch_array($verify);
        //echo $row['verify_token'];
        if($row['verify_status']=="0"){
            $clicked_token=$row['verify_token'];
            $update_query= "UPDATE regg SET verify_status='1' WHERE verify_token='$clicked_token' LIMIT 1";
            $update_wuery_run = mysqli_query($conn, $update_query);
            if($update_wuery_run){
                echo '<script>
                    alert("Your Account has been Verified Successfully");
                    window.location.href = "data.php";
                  </script>';

            }
            else{
                echo '<script>
                alert("Verification Failed");
                window.location.href = "data.php";
              </script>';
            }
        }
        else{
            echo '<script>
                    alert("Email Already Verified");
                    window.location.href = "data.php";
                  </script>';
        }

    }
    else{
        echo '<script>
        alert("Token does not exist");
        window.location.href = "data.php";
      </script>';
    }
}
else{
    echo '<script>
    alert("NOT ALLOWED");
    window.location.href = "data.php";
  </script>';
}
?>