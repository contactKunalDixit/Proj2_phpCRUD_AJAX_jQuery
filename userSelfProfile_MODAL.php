<?php
include_once "includes/config.php";
include_once "includes/database.php";
include_once "common/header.php";

if (empty($_SESSION["user"])) // Profile can only be viewed after being logged in. If not,then REDIRECT to Login page
{
    header("location:" . SITE_URL . "login.php");
    exit();
}

$userID = $_SESSION["user"]["id"];
$conn = db_connect();
$sql = "SELECT * FROM `users` WHERE `id` = $userID";
$sqlResult = mysqli_query($conn, $sql);
if (mysqli_num_rows($sqlResult) > 0) {
    $userInfo = mysqli_fetch_assoc($sqlResult);
} else {
    echo "User not found";
    exit();
}
?>
<!-- profile modal start -->
<div class="modal fade" id="userViewModal" tabindex="-1" role="dialog" aria-labelledby="userViewModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile <i class="fa fa-user-circle-o"
                        aria-hidden="true"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container" id="profile">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src="http://placehold.it/100x100" alt="" class="rounded-circle" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h4 class="text-primary">
                                <?php echo  "Name: " . $userInfo['firstName'] . " "  . $userInfo['lastName'] ?></h4>
                            <p class="text-secondary">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <?php echo "Email: " . $userInfo['email'] ?>
                                <br />
                            </p>
                            <!-- Split button -->
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- profile modal end -->