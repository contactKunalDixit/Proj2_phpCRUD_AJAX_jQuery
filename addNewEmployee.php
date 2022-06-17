<?php
ob_start();
session_start();

include_once "includes/config.php";
include_once "includes/database.php";
include_once "userSelfProfile_MODAL.php";

if (empty($_SESSION["user"])) {
    header("location:" . SITE_URL . "login.php");
    exit();

    $userID = (!empty($_SESSION["user"]) && !empty($_SESSION["user"]["id"])) ? $_SESSION["user"]["id"] : 0;
}

?>

<?php include_once "common/header.php"; ?>
<main role="main" class="container">
    <div class="row justify-content-center wrapper">
        <div class="col-md-6">


            <div class="card mt-5">
                <header class="card-header">
                    <h4 class="card-title mt-2">Add/Edit Contact</h4>
                </header>
                <article class="card-body">
                    <form method="post"
                        action="<?php echo SITE_URL . 'user_Action_Inputs/add_newEmployee_inputs.php' ?>"
                        enctype="multipart/form-data">
                        <!-- <div class="form-row"> -->
                        <div class="form-group">
                            <label>Employee ID: </label>
                            <input type="text" name="empID" value="  <?php echo $empID ?>" class="form-control"
                                placeholder="Employee ID">

                        </div>
                        <div class="form-group">
                            <label>Employee Name </label>
                            <input type="text" name="empName" value="<?php echo $empName ?>" class="form-control"
                                placeholder="Employee Name">
                        </div>

                        <!-- </div> -->

                        <div class="form-group">
                            <label>Email Address:</label>
                            <input type="email" name="email" value="  <?php echo $email ?>" class="form-control"
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Phone No.: </label>
                            <input type="text" name="phone" value="<?php echo $phone ?>" class="form-control"
                                placeholder="Contact">
                        </div>
                        <div class="form-group">
                            <label>Address: </label>
                            <input type="text" name="address" value="<?php echo $address ?>" class="form-control"
                                placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label>Designation: </label>
                            <input type="text" name="designation" value="<?php echo $designation ?>"
                                class="form-control" placeholder="Designation">
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="text" name="salary" value="<?php echo $salary ?>" class="form-control"
                                placeholder="Salary">
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="photo">Photo</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="contact_photo">
                                <label class="custom-file-label" for="contact_photo">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="contactid" value="<?php echo $contactId ?>" />
                            <!-- 1st time It'll be blkank but next time onwards it can be used for identifying while editing a contact. It'll not be visible since Its hidden -->
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </article>
            </div>
            <?php
            if (!empty($_SESSION["errors"])) { ?>
            <div class="alert alert-danger">
                <p>There were following errors:</p>
                <ul>
                    <?php
                        foreach ($_SESSION["errors"] as $errorItem) {
                            echo "<li>" . $errorItem . "</li>";
                        }
                        ?>
                </ul>
            </div>
            <?php
                unset($_SESSION["errors"]);
            } ?>
        </div>

    </div>

</main>
<?php include_once "common/footer.php" ?>