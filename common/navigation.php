<?php
ob_start();
session_start();
include_once "../includes/config.php";
$user = !empty($_SESSION["user"]) ? $_SESSION["user"] : [];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="<?php echo (SITE_URL) ?>"><i class="fa fa-address-book"></i> Employee Roll
            Book</a>
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
                    <a class="nav-link" href="<?php echo SITE_URL . "index.php" ?>">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contactbook/addcontact.php">Add Contact</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="/contactbook/profile.php" id="navbarDropdownMenuLink"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                            echo $_SESSION["user"]["firstName"]
                            ?> </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/contactbook/profile.php">Profile</a>
                        <a class="dropdown-item" href="
                <?php
                    echo SITE_URL . "logout.php"
                ?>">Logout</a>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>