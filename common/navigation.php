<?php
ob_start();
session_start();
include_once "../includes/config.php";


$user = !empty($_SESSION["user"]) ? $_SESSION["user"] : [];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="<?php echo (SITE_URL) ?>"><i class="fa fa-address-book"></i> <?php echo "Employee Roll
            Book - " . $_SESSION['user']['firstName'] ?></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">

                <?php
                if (empty($_SESSION["user"])) { ?>
                <li class="nav-item  active">
                    <a class="nav-link" href="<?php echo SITE_URL . "login.php" ?>">Login <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item  active">
                    <a class="nav-link" href=" <?php echo SITE_URL . "sign_up.php" ?>">Sign up <span
                            class="sr-only">(current)</span></a>
                </li>

                <?php
                } else { ?>
                <li class="nav-item  active">
                    <a href="#" class="nav-link" href="<?php echo SITE_URL . "index.php" ?>">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" data-toggle="modal" data-target="#userModal">Add
                        Employee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button" data-toggle="modal"
                        data-target="#userViewModal">Profile</a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITE_URL . "logout.php" ?>">Log Out</a>

                </li>

                <?php } ?>
            </ul>
        </div>

    </div>
</nav>