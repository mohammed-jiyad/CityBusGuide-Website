<?php
session_start();
include("navbar.php");
?>
<br><br>
<title>Resend Email Verification</title>
<style>
    body{
        background-color: lightgrey;
    }
</style>
<body>
    

<div class="ok">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <?php
                if (isset($_SESSION['status'])) {
                    ?>
                    <div class="alert alert-success">
                        <h5><?= $_SESSION['status']; ?></h5>
                    </div>
                    <?php
                    unset($_SESSION['status']);
                } 
                ?>
                <div class="card">
                    <div class="card-header">
                        <h4>Resend Email Verification</h4>
                    </div>
                    <div class="card-body">
                        <form action="resend-code.php" method="post">
                            <div class="form-group mb-3">
                                <label >Email Address</label>
                                <input type="text" name="email" class="form-control" placeholder="Enter the Email Address">
                            </div>
                        <div class="form-group mb-3">
                            <button type="submit" name="resend-email" class="btn btn-primary">Submit</button>
                        </div>

                        </form>
                    </div>
                </div>
                                
            </div>
        </div>
    </div>
</div>
</body>