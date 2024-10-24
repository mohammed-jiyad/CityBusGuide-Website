<?php
     session_start();
    if(!isset($_SESSION["authenticated"])){
        echo '<script>
                    alert("Please Login to Access");
                    window.location.href = "data.php";
                  </script>';
    }
?>