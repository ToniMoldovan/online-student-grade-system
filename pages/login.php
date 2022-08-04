<?php 
require_once dirname(__DIR__) . "../includes/config.php";

if (isset($_SESSION["logged"]))
    header("Location: " . SITE_URL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Student Grade Report</title>
    <?php include dirname(__DIR__) . "../includes/head.php"; ?>
</head>

<body>

    <?php include dirname(__DIR__) . "../includes/header.php"; ?>


    <!-- CONTENT SECTION -->
    <section id="registration-section" style="min-height: 100vh;">
        <div class="container-fluid" style="text-align: center;">
            <h1>Login</h1>
            <h3>Acces your account right now!</h3>
        </div>

        <div class="container form-container">
            <form action="../includes/functions/login.php" method="POST">
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 mb-4 mt-4">
                        <input type="text" name="uname" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 mb-4 mt-4">
                        <input type="password" name="passwd" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12 col-md-12 mb-4 mt-4">
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php include dirname(__DIR__) . "../includes/footer.php" ?>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>