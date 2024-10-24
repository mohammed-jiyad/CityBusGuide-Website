<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-brand {
            display: flex;
            align-items: center;
        }
        .navbar-brand img {
            margin-right: 10px;
            border-radius: 50%; 
            width: 50px; 
            height: 50px;
        }
        .nav-link {
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        .nav-link:hover {
            color: #fff; 
            background-color:dimgray; 
            border-radius: 5px; 
        }

        .nav-item .nav-link.active {
            color: #007bff; 
        }
        
    </style>
</head>
<body>
    <div class="bg-dark">
        <div class="container1">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-dark flex-column bg-dark">
                        <div class="container-fluid">
                            <!--<img src="cropcity.jpg" alt="Description of the image" width="100" height="50" class="justify-content-left">-->
                            <a class="navbar-brand" href="miniproj.php">
                                <img src="logo.jpg" alt="Logo" width="50" height="50" class="d-inline-block align-text-top">
                                CityBus Guide
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="miniproj.php">Home</a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <?php if(!isset($_SESSION['authenticated'])) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="data.php">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="reg.php">Register</a>
                                    </li>
                                    <?php endif ?>
                                    <?php if(isset($_SESSION['authenticated'])) : ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="logout.php">Logout</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="cp.php">Dashboard</a>
                                    </li>
                                    <?php endif ?>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
