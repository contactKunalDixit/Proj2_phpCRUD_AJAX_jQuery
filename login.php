<?php
include_once "includes/config.php";
include_once "includes/database.php";
include_once "common/header.php";

?>

<main role="main" class="container">
    <style>
    .wrapper {
        padding-top: 30px;
    }
    </style>

    <div class="row justify-content-center wrapper">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <h4 class="card-title mt-2">Sign In</h4>
                </header>
                <article class="card-body">
                    <form method="POST" action="<?php echo SITE_URL . "user_Action_Inputs/login_inputs.php" ?>">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" placeholder="password">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success btn-block"> Login </button>
                        </div>
                    </form>
                </article>
                <div class="border-top card-body text-center">Have not registered yet? <a
                        href="<?php echo (SITE_URL . "sign_up.php") ?>">Sign Up</a>
                </div>

                <!-- on  Screen notifications -->

                <?php
                if (!empty($_SESSION["errors"])) {
                    echo ("<div class = 'alert alert-danger'>");
                    echo "<p> There were following errors found: </p>";
                    echo "<ul>";
                    foreach ($_SESSION["errors"] as $errorItem) {
                        echo "<li>" . $errorItem . "</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                } ?>;

                <?php unset($_SESSION["errors"]);
                ?>
                <!-- Resetting the Error variable -->

            </div>
        </div>

    </div>

</main>
<?php
include_once "common/footer.php";
?>