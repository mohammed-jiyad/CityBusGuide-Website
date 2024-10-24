<?php
session_start();
include("navbar.php");

if (!isset($_SESSION['bus_results'])) {
    header('Location: miniproj.php');
    exit();
}

$bus_results = $_SESSION['bus_results'];
$authenticated = isset($_SESSION["authenticated"]);

// Function to sort buses by number of stops
usort($bus_results, function($a, $b) {
    return $a['no_of_stops'] - $b['no_of_stops'];
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bus Details</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color:white;
      margin: 0;
      color: #333;
      background-image: url('output11.jpg');
      background-size: cover;
      
    }
    
    .container {
      max-width: 900px;
      margin: auto;
      padding: 20px;
      padding-top: 40px;
      position: relative;
    }
    .bus-card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      padding-left: 200px;
      margin-bottom: 20px;
      transition: transform 0.3s, box-shadow 0.3s;
      position: relative;
      z-index: 1;
      background-color: rgba(255, 255, 255, 0.8);
    }
    .bus-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .bus-image {
      position: absolute;
      top: 0;
      left: -110px; /* Adjust the value to control the distance from the box */
      width: 200px; /* Set the width of the image */
      height: 100%; /* Match the height of the box */
      object-fit: cover;
      border-radius: 10px;
      z-index: 0;
    }
    .bus-details {
      position: relative;
      z-index: 2;
    }
    .bus-number {
      font-size: 24px;
      font-weight: 700;
      color: #34495e;
      margin-bottom: 15px;
    }
    .bus-info {
      margin-bottom: 12px;
      font-size: 16px;
    }
    .bus-info strong {
      font-weight: 600;
      color: #2980b9;
    }
    .bus-info a {
      color: #e74c3c;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s;
    }
    .bus-info a:hover {
      color: #c0392b;
    }
    @media (max-width: 768px) {
      .bus-card {
        padding: 15px;
      }
      .bus-number {
        font-size: 20px;
      }
      .bus-info {
        font-size: 14px;
      }
      .bus-image {
        left: -90px; /* Adjust for smaller screens */
        width: 80px;
      }
    }
    .popup {
      width: 400px;
      background: #fff;
      border-radius: 6px;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0.1);
      text-align: center;
      padding: 30px;
      color: #333;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      visibility: hidden;
      transition: transform 0.4s, top 0.4s;
      z-index: 1000;
    }
    .open-popup {
      visibility: visible;
      transform: translate(-50%, -50%) scale(1);
    }
    .popup h2 {
      font-size: 38px;
      font-weight: 500;
      margin: 30px 0 10px;
    }
    .popup button {
      width: 100%;
      margin-top: 50px;
      padding: 10px 0;
      background: #6fd649;
      color: #fff;
      border: 0;
      outline: none;
      font-size: 18px;
      border-radius: 4px;
      cursor: pointer;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }
    
    footer{
      color: white;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php foreach ($bus_results as $row) { ?>
      <div class="bus-card">
        <img src="buspic.jpg" alt="Bus Image" class="bus-image"> <!-- Add the bus image here -->
        <div class="bus-details">
          <div class="bus-number">Bus Number: <?php echo htmlspecialchars($row['bus_no']); ?></div>
          <div class="bus-info"><strong>Source:</strong> <?php echo htmlspecialchars($row['source']); ?></div>
          <div class="bus-info"><strong>Destination:</strong> <?php echo htmlspecialchars($row['desti']); ?></div>
          <div class="bus-info"><strong>Number of Stops:</strong> <?php echo htmlspecialchars($row['no_of_stops']); ?></div>
          <div class="bus-info"><a href="http://localhost:3000/<?php echo htmlspecialchars($row['bus_no']); ?>.php" onclick="handleRouteClick(event, '<?php echo htmlspecialchars($row['bus_no']); ?>')">View Route ▼ </a></div>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="popup" id="popup">
    <p>Please Login to Access</p>
    <button type="button" onclick="closePopUp()">OK</button>
  </div>
  <br><br><br><br>
  <footer>
        <p>&copy; City Bus Guide 2024</p>
    </footer>
  <script>
    let popup = document.getElementById("popup");
    let authenticated = <?php echo json_encode($authenticated); ?>;
    
    function handleRouteClick(event, busNo) {
        event.preventDefault();
        if (!authenticated) {
            popup.classList.add("open-popup");
        } else {
            window.location.href = "http://localhost:3000/" + busNo + ".php";
        }
    }

    function closePopUp() {
        popup.classList.remove("open-popup");
        window.location.href ="data.php";
    }
  </script>
</body>
</html>

<?php
unset($_SESSION['bus_results']); // Clear the session data
?>
