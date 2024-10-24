<?php
    include("navbar.php");
?>
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
        
        
        .form-group {
            margin-bottom: 20px;
        }
        footer{
            color: #fff;
        }
</style>
<title>Registration</title>
<body>
<div class="ok">
<div class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-shadow">
                    <div class="card-header"> 
                        <h5>Registration Form</h5>
                    </div>
                    <div class="card-body"> 
                        <form action="regicheck.php"onsubmit="return validation()" method="POST" name="form">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name">
                                <span id="namee"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Your Phone Number">
                                <span id="phonee"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Enter Your Email Id">
                                <span id="emaill"></span>
                            </div>
                            <div class="form-group mb-3">
                                <label for="pass">Password</label>
                                <input type="password" id="pass" name="pass" class="form-control" placeholder="Enter Your Password">
                                <span id="passs"></span> 
                            </div>
                            <div class="form-group mb-3">
                                <label for="conf_pass">Confirm Password</label>
                                <input type="password" id="conf_pass" name="conf_pass" class="form-control" placeholder="Confirm Your Password">
                                <span id="confpass"></span> 
                            </div>
                            <div class="form-group">
                                <button type="submit" name="regist" value="Register"class="btn btn-primary">Register Now</button> <!-- Corrected class name -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<footer>
        <p color: #fff>&copy; City Bus Guide 2024</p>
    </footer>
    <script>
    function validation() {
        var email = document.getElementById('email').value;
        var name = document.getElementById('name').value;
        var phone = document.getElementById('phone').value;
        var pass = document.getElementById('pass').value;
        var confpass = document.getElementById('conf_pass').value;

        var isValid = true;

        if (name == "") {
            document.getElementById('namee').innerHTML = "Please Write Name in the Box";
            isValid = false;
        } else if (name.length < 3) {
            document.getElementById('namee').innerHTML = "Please Enter more than 3 alphabets";
            isValid = false;
        } else if (!/^[a-zA-Z]+$/.test(name)) {
    document.getElementById('namee').innerHTML = "Please Enter Alphabets Only";
    isValid = false;
        } else {
            document.getElementById('namee').innerHTML = "";
            isValid=true;
        }

        if (phone == "") {
            document.getElementById('phonee').innerHTML = "Please Write Phone Number in the Box";
            isValid = false;
        } else if (isNaN(phone)) {
            document.getElementById('phonee').innerHTML = "Please Enter Numbers Only";
            isValid = false;
        } else if (phone.length != 10) {
            document.getElementById('phonee').innerHTML = "Please Enter a Valid 10-digit Phone Number";
            isValid = false;
        }
        else if (!["6","7", "8", "9"].includes(phone.charAt(0))) {
    document.getElementById('phonee').innerHTML = "Phone Number Must Start with 7, 8, or 9";
    isValid = false;
} else {
            document.getElementById('phonee').innerHTML = "";
            isvalid=true;
        }

        if (email == "") {
            document.getElementById('emaill').innerHTML = "Please Write Email in the Box";
            isValid = false;
        } else if (email.indexOf('@') <= 0) {
            document.getElementById('emaill').innerHTML = "Invalid Email";
            isValid = false;
        } else if (email.charAt(email.length - 4) != '.' && email.charAt(email.length - 3) != '.') {
            document.getElementById('emaill').innerHTML = "Invalid Email";
            isValid = false;
        } else {
            document.getElementById('emaill').innerHTML = "";
        }

        if (pass == "") {
                document.getElementById('passs').innerHTML = "Please Write Password in the Box";
                isValid = false;
            } else if (pass.length < 8) {
                document.getElementById('passs').innerHTML = "Password must be at least 8 characters long";
                isValid = false;
            } else if (pass.search(/[0-9]/) == -1) {
                document.getElementById('passs').innerHTML = "Password must have at least 1 Numeric character";
                isValid = false;
            } else if (pass.search(/[a-z]/) == -1) {
                document.getElementById('passs').innerHTML = "Password must have at least 1 Lowercase character";
                isValid = false;
            } else if (pass.search(/[A-Z]/) == -1) {
                document.getElementById('passs').innerHTML = "Password must have at least 1 Uppercase character";
                isValid = false;
            } else if (pass.search(/[!\@\#\$\%\^\&\*\(\)\_\+\=\-\,\<\.\>\?\{\}\[\]]/) == -1) {
                document.getElementById('passs').innerHTML = "Password must have at least 1 Special character";
                isValid = false;
            } else {
                document.getElementById('passs').innerHTML = "";
            }

        if (confpass == "") {
            document.getElementById('confpass').innerHTML = "Please Confirm your Password";
            isValid = false;
        } else if (confpass != pass) {
            document.getElementById('confpass').innerHTML = "Passwords do not match";
            isValid = false;
        } else {
            document.getElementById('confpass').innerHTML = "";
        }

        return isValid;
    }
</script>
    </body>
