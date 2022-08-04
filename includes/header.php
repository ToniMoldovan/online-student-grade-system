<?php 
require_once __DIR__ . "/config.php";
?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <div class="logo-holder ml-4">
                <a class="navbar-brand" href="<?php echo SITE_URL . 'index.php' ?>">
                    <img src="<?php echo SITE_URL . 'images/icons8-student-64.png' ?>" alt="header-logo-png" width="48px">
                Student Report
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-links" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item px-3">
                        <a class="nav-link" href="<?php echo SITE_URL . 'index.php' ?>">Home</a>
                    </li>

                    <?php 
                    // Menu for NOT logged user
                    if(!isset($_SESSION["logged"])) { ?>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="<?php echo SITE_URL . 'pages/register.php' ?>">Register</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="<?php echo SITE_URL . 'pages/login.php' ?>">Login</a>
                        </li>
                    <?php } 

                    // Menu for logged user
                    else { ?>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link disabled">Hello, <?php echo $_SESSION["logged"]->username; ?>!</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link" href="<?php echo SITE_URL . 'includes/functions/logout.php' ?>">Logout</a>
                        </li>
                    <?php } ?>
                    
                </ul>
            </div>
        </div>
    </nav>
