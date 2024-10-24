<?php
include("authentication.php");
include("navbar.php");
?>
<title>Dashboard</title>
<div class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dashboard</h4>
                    </div>
                    <div class="card-body">
                        
                        
                            <h5>Username = <?php echo $_SESSION['auth_user']['username'] ?></h5>
                            <h5>Email ID = <?php echo $_SESSION['auth_user']['email'] ?></h5>
                            <h5>Phone = <?php echo $_SESSION['auth_user']['phone'] ?></h5>
                    </div>
                </div>
                                
            </div>
        </div>
    </div>
</div>
