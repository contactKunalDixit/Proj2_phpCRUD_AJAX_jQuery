<?php
include_once "includes/config.php";
include_once "includes/database.php";
include_once "common/header.php";

include_once "userSelfProfile_MODAL.php";



// If the user is NOT logged in, redirect him to the login page
if ((!empty($_SESSION["user"]) && !empty($_SESSION["user"]["id"]))) {
    $user = $_SESSION["user"];
    $userID = $_SESSION["user"]["id"];
} else {
    session_unset(); //reset the session variables
    session_destroy(); //This is important, else the user can go back in history and can get access to the data.
    header("location:" . SITE_URL . "login.php");
    exit();
}
?>




<main role="main" class="container">

    <div class=" col-11 mt-5 mb-3">
        <div class="input-group input-group-lg">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input"
                aria-describedby="inputGroup-sizing-lg" placeholder="Search..." id="searchinput">

        </div>
    </div>
    <?php
    if (!empty($userID)) {
        $conn = db_connect();
        $empSQL = "SELECT * FROM `employeesTable` WHERE `owner_id` = $userID";
        $sqlRes = mysqli_query($conn, $empSQL);
        $$sqlRows = mysqli_num_rows($sqlRes);
        if ($sqlRows > 0) {
    ?>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
                    while ($resultArr = mysqli_fetch_assoc($sqlRes)) {
                    ?>
            <tr>
                <!-- <td class="align-middle"><img src="https://via.placeholder.com/50.png/09f/666"
                        class="img-thumbnail img-list" /></td> -->
                <td class="align-middle"><?php echo $resultArr["empName"] ?></td>
                <td class="align-middle">
                    <a href="/contactbook/view.php?id=9" class="btn btn-success">View</a>
                    <a href="/contactbook/addcontact.php?id=9" class="btn btn-primary">Edit</a>
                    <a href="/contactbook/delete.php?id=9" class="btn btn-danger"
                        onclick="return confirm(`Are you sure want to delete this contact?`)">Delete</a>
                </td>
            </tr>

            <?php
                    }
                    ?>
        </tbody>
    </table>
    <?php
        }
    } ?>



    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item  disabled">
                <a class="page-link" href="/contactbook/index.php?page=0">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="/contactbook/index.php?page=1">1</a></li>
            <li class="page-item"><a class="page-link" href="/contactbook/index.php?page=2">2</a></li>

            <li class="page-item">
                <a class="page-link" href="/contactbook/index.php?page=2">Next</a>
            </li>
        </ul>
    </nav>
</main>
<?php
include_once "common/footer.php";
?>