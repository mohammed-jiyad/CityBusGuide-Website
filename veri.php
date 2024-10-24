<?php
    include("navbar.php");
    
    ?>
<style> 
    body{
        background-color: lightgrey;
    }
    .container {
            max-width: 960px; /* Adjust max width based on your design */
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #007bff; /* Bootstrap primary color */
            color: #fff;
            padding: 10px 20px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        span{
            color: red;
        }
</style>
<title>Verification</title>
<body>
    

<div class="ok">

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-shadow">
                    <div class="card-header"> <!-- Corrected class name -->
                        <h5>Enter the Verification Code</h5>
                    </div>
                    <div class="card-body"> <!-- Corrected class name -->
                        <form action="checking.php"onsubmit="return validation()" method="POST" name="form">
                            <div class="form-group">
                                <label for="name">Verification Code</label>
                                <input type="text" id="verifyy_code" name="verifyy_code" class="form-control">
                                <span id="verifyy_code"></span>
                            
                            <div class="form-group">
                                <button type="submit" name="submit2" id="submit2" class="btn btn-primary">Verify Now</button> <!-- Corrected class name -->
                            </div>
                            <h5>
                            Did not Receive a Verification Email?
                            <a href="resend-email-verification.php">Resend</a>
                            </h5>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
        <p color: #fff>&copy; City Bus Guide 2024</p>
    </footer>