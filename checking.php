<?php
    session_start();
    
    include("connection1.php");
    
    if(isset($_POST['submit2'])){
            
            $verify_code=$_POST['verifyy_code'];
            $verify_query="SELECT verify_status from regg WHERE verification_code='$verify_code' LIMIT 1";
            $verify = mysqli_query($conn, $verify_query);
            $count = mysqli_num_rows($verify);
            if($count > 0){
                $row=mysqli_fetch_array($verify);
                //echo $row['verify_token'];
                if($row['verify_status']=="0"){
                    
                    $update_query= "UPDATE regg SET verify_status='1' WHERE verification_code='$verify_code' LIMIT 1";
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
                alert("Wrong Verification Code");
                window.location.href = "veri.php";
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
