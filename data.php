<?php
include("navbar.php");
?>   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <style>
        body {
            background-color: white;
            background-image: url('buss.jpg') ;
            background-size: cover;
            
        }
        
        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .card-shadow{
            max-width: 960px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            background-color: rgba(255, 255, 255, 1);
        }
        span {
            color: red;
        }
        #captcha_image {
            max-width: 100%;
            display: block;
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        footer{
            color: #fff;
        }
    </style>
</head>
<body>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-shadow">
                    <div class="card-header">
                        <h5>Login</h5>
                    </div>
                    <div class="card-body">
                        <form action="logincheck.php" onsubmit="return validation()" method="POST" name="form">
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Enter your Email ID">
                                <span id="emaill"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="pass">Password</label>
                                <input type="password" id="pass" name="pass" class="form-control" placeholder="Enter your Password">
                                <span id="passwordError"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="captcha">CAPTCHA</label>
                                <br>
                                <img src="captcha.php" alt="CAPTCHA Image" id="captcha_image">
                                <br>
                                <input type="text" id="captcha" name="captcha" class="form-control" placeholder="Enter the Captcha">
                                <span id="captchaError"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login" class="btn btn-primary">Login Now</button>
                            </div>
                        </form>
                        <hr>
                        <h5>
                            Did not Receive a Verification Email?
                            <a href="resend-email-verification.php">Resend</a>
                        </h5>
                        <h6 class="text-center">or</h6>
                        <a class="nav-link text-center" href="reg.php">Create a New Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; City Bus Guide 2024</p>
    </footer>
    <script>
        function validation() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('pass').value;
            var captcha = document.getElementById('captcha').value;
            var isValid = true;

            // Validate email
            if (email == "") {
                document.getElementById('emaill').innerHTML = "**Please Write Email in the Box**";
                isValid = false;
            } else if (email.indexOf('@') <= 0) {
                document.getElementById('emaill').innerHTML = "**Invalid Email**";
                isValid = false;
            } else if (email.charAt(email.length - 4) != '.' && email.charAt(email.length - 3) != '.') {
                document.getElementById('emaill').innerHTML = "**Invalid Email**";
                isValid = false;
            } else {
                document.getElementById('emaill').innerHTML = "";
            }

            // Validate password
            if (password == "") {
                document.getElementById('passwordError').innerHTML = "**Please Enter Password**";
                isValid = false;
            } else {
                document.getElementById('passwordError').innerHTML = "";
            }

            // Validate CAPTCHA
            if (captcha == "") {
                document.getElementById('captchaError').innerHTML = "**Please Enter CAPTCHA**";
                isValid = false;
            } else {
                document.getElementById('captchaError').innerHTML = "";
            }

            return isValid;
        }
    </script>
</body>
</html>
