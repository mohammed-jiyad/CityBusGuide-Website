<?php 
    if (session_status() === PHP_SESSION_ACTIVE){

    }
    else{

    
    session_start();
    }
	include("connection1.php");
	
    include("navbar.php");
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    
    <title>City Bus Guide</title>
    
    <meta name="description" content="City Bus Guide" />
    <meta name="keywords" content="City Bus Guide" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        
        body {
            font-family: Arial, sans-serif;
            background-color:white; 
            line-height: 1.6;
            background-image: url('buss.jpg') ;
            background-size: cover;
        
        }

        
        .container {
            max-width: 960px; 
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: rgba(255, 255, 255, 0.6);
        }
        
        .container2 {
            max-width: 960px; 
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            
        }
        .container3 {
            max-width: 960px; 
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: rgba(255, 255, 255, 0.8);
        }

       
        .card-shadow {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        .card-header {
            background-color: #007bff; 
            color: #fff;
            padding: 10px 20px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .card-body {
            padding: 20px;
            background-color: rgba(255, 255, 255, 1);
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
        }

        .form-group select,
        .form-group input[type="submit"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        
        .btn {
            display: inline-block;
            padding: 8px 12px;
            font-size: 16px;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            white-space: nowrap;
            background-color: #007bff;
            border: 1px solid #007bff;
            color: #fff;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3; 
            border-color: #0056b3;
        }

        
        .py-5 {
            padding-top: 5rem;
            padding-bottom: 5rem;
        }

        .text-center {
            text-align: center;
        }

        .text-justify {
            text-align: justify;
        }

        
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            form {
                padding: 10px;
            }
        }

        
        .row-forms {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .col-form {
            flex: 0 0 calc(50% - 20px); 
        }
        footer{
            color: #fff;
        }
    </style>
    
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <div class="con">
        <div class="py-4">
            <div class="container">
                <div class="row row-forms">
                    <!-- First Form -->
                    <div class="col-md-6 col-form">
                        <div class="card-shadow">
                            <div class="card-header">
                                <h5>BUS INFO</h5>
                            </div>
                            <div class="card-body">
                                <form action="login2.php" onsubmit="return isLoginFormValid()" method="POST" name="form">
                                    <div class="form-group mb-3">
                                        <label for="from">From</label>
                                        <select name="from" id="city">
                                        <option value="" disabled selected>Select a location</option>
                                            <option>Banashankari</option>
                                            <option>Kumarswamy Layout</option>
                                            <option>Yeshwanthpur</option>
                                            <option>Jayaprakash Nagar</option>
                                            <option>Koramangla</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="to">To</label>
                                        <select name="to" id="cen">
                                        <option value="" disabled selected>Select a location</option>
                                            <option>Banashankari</option>
                                            <option>Yeshwanthpur</option>
                                            <option>Kumarswamy Layout</option>
                                            <option>Jayaprakash Nagar</option>
                                            <option>Koramangla</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Second Form -->
                    <div class="col-md-6 col-form">
                        <div class="card-shadow">
                            <div class="card-header">
                                <h5>SEARCH BY ROUTE</h5>
                            </div>
                            <div class="card-body">
                                <form action="login2.php" method="post" name="route" onsubmit="return isRouteFormValid()">
                                    <fieldset>
                                        <div class="form-group mb-3">
                                            <label for="route">Route Number</label>
                                            <select name="route">
                                            <option value="" disabled selected>Select Route Number</option>
                                                <option>1A</option>
                                                <option>2A</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary" value="Submit" name="submit1"/>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="container3">
        <h3 style="padding-left: 2em;">Tips</h3>
        <ol style="text-align: justify;">
            <li>Some places have more than one name, for e.g., Kempegowda Bus Station is commonly known as Majestic - try searching for all the names.</li>
            <li>If you do not find a bus route for a place, try searching for nearby places. Many times there are good bus services to some areas but not to nearby ones.</li>
            
            
            
            <li>The route plan determined by the Shortest Distance method may not be directly useful since it tends to generate too many hops. It is included in the search options for the sake of completeness only.</li>
        </ol>
       
    </div>
    <footer>
        <p>&copy; City Bus Guide 2024</p>
    </footer>
   

    <script>
        function isLoginFormValid() {
            var form = document.forms["form"];
            var user = form.elements["from"].value.trim();
            var pass = form.elements["to"].value.trim();

            if (user === "" || pass === "") {
                alert("Please fill in both From and To fields.");
                return false;
            }

            
            return true;
        }

        function isRouteFormValid() {
            var form1 = document.forms["route"];
            var rou = form1.elements["route"].value.trim();
            if (rou === "") {
                alert("Please fill in Route Number.");
                return false;
            }
            return true; 
        }
    </script>
</body>
</html>
