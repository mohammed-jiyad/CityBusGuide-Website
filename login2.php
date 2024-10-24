<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('connection1.php');

if (isset($_POST['submit'])) {
    $source = $_POST['from'];
    $desti = $_POST['to'];

    $sql = "SELECT * FROM bus_info WHERE source='$source' AND desti='$desti'";  
    $result = mysqli_query($conn, $sql);  
    $count = mysqli_num_rows($result);  
    
    if ($result && $count > 0) {  
        $_SESSION['bus_results'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
        header('Location: output1.php');
        exit();
    } elseif ($source == $desti) {
        echo '<script>
                alert("Source and Destination cannot be the same");
                window.location.href = "miniproj.php";
              </script>';
    } else {  
        $_SESSION['data']=false;
        echo '<script>
                alert("No bus routes found for the selected route number.");
                window.location.href = "miniproj.php";
              </script>';
    }
}

if (isset($_POST['submit1'])) {
    $rno = $_POST['route'];
    $sql1 = "SELECT * FROM bus_info WHERE bus_no='$rno' && no_of_stops='5'";  
    $result1 = mysqli_query($conn, $sql1);  
    $count1 = mysqli_num_rows($result1);  
    
    if ($result1 && $count1 > 0) {
        $_SESSION['bus_results'] = mysqli_fetch_all($result1, MYSQLI_ASSOC);
        header('Location: output1.php');
        exit();
    } else {  
        echo '<script>
                alert("No bus routes found for the selected route number.");
                window.location.href = "miniproj.php";
              </script>';
    }
}
?>
