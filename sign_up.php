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
                    <h4 class="card-title mt-2">Sign up</h4>
                </header>
                <article class="card-body">
                    <form method="POST" action="<?php echo SITE_URL . "user_Action_Inputs/sign_up_inputs.php" ?>">
                        <div class="form-row">
                            <div class="col form-group">
                                <label>First name </label>
                                <input type="text" name="fname" class="form-control" placeholder="First Name">
                            </div> <!-- form-group end.// -->
                            <div class="col form-group">
                                <label>Last name</label>
                                <input type="text" name="lname" class="form-control" placeholder="Last Name">
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row end.// -->
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="text" name="email" class="form-control" placeholder="">
                            <small class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" name="cpassword">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="register" class="btn btn-primary btn-block">
                                Register</button>
                        </div>

                    </form>

                </article>
                <div class="border-top card-body text-center">Have an account? <a
                        href="<?php echo (SITE_URL . "login.php") ?>">Log
                        In</a>
                </div>


                <?php
                if (!empty($_SESSION["success"])) {
                    echo ("<div class = 'alert alert-success text-center'>");
                    echo "<h5>" . $_SESSION["success"] . "</h5>";
                    echo "</div>";
                } ?>
                <?php unset($_SESSION["success"]) ?>
                <!-- To clear the success list when refreshed -->
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
                <?php unset($_SESSION["errors"]) ?>
                <!-- To clear the error list when refreshed -->

            </div>
        </div>
    </div>


</main>
<?php
include_once "common/footer.php";
?>