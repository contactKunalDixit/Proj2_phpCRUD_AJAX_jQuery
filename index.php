<?php
include_once "includes/config.php";
include_once "includes/database.php";
include_once "common/header.php";

?>




<main role="main" class="container">


    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="align-middle"><img src="https://via.placeholder.com/50.png/09f/666"
                        class="img-thumbnail img-list" /></td>
                <td class="align-middle">Deepak Sharma</td>
                <td class="align-middle">
                    <a href="/contactbook/view.php?id=9" class="btn btn-success">View</a>
                    <a href="/contactbook/addcontact.php?id=9" class="btn btn-primary">Edit</a>
                    <a href="/contactbook/delete.php?id=9" class="btn btn-danger"
                        onclick="return confirm(`Are you sure want to delete this contact?`)">Delete</a>
                </td>
            </tr>
            <tr>
                <td class="align-middle"><img src="/contactbook/uploads/photos/2f053caaa84024ec6d12aaa5679b5417.jpg"
                        class="img-thumbnail img-list" /></td>
                <td class="align-middle">Harish Rawat</td>
                <td class="align-middle">
                    <a href="/contactbook/view.php?id=3" class="btn btn-success">View</a>
                    <a href="/contactbook/addcontact.php?id=3" class="btn btn-primary">Edit</a>
                    <a href="/contactbook/delete.php?id=3" class="btn btn-danger"
                        onclick="return confirm(`Are you sure want to delete this contact?`)">Delete</a>
                </td>
            </tr>
            <tr>
                <td class="align-middle"><img src="https://via.placeholder.com/50.png/09f/666"
                        class="img-thumbnail img-list" /></td>
                <td class="align-middle">john smith</td>
                <td class="align-middle">
                    <a href="/contactbook/view.php?id=1" class="btn btn-success">View</a>
                    <a href="/contactbook/addcontact.php?id=1" class="btn btn-primary">Edit</a>
                    <a href="/contactbook/delete.php?id=1" class="btn btn-danger"
                        onclick="return confirm(`Are you sure want to delete this contact?`)">Delete</a>
                </td>
            </tr>
            <tr>
                <td class="align-middle"><img src="/contactbook/uploads/photos/c266048c47fa99a363727728897ead4c.jpg"
                        class="img-thumbnail img-list" /></td>
                <td class="align-middle">MS2 Dhoni</td>
                <td class="align-middle">
                    <a href="/contactbook/view.php?id=8" class="btn btn-success">View</a>
                    <a href="/contactbook/addcontact.php?id=8" class="btn btn-primary">Edit</a>
                    <a href="/contactbook/delete.php?id=8" class="btn btn-danger"
                        onclick="return confirm(`Are you sure want to delete this contact?`)">Delete</a>
                </td>
            </tr>
            <tr>
                <td class="align-middle"><img src="https://via.placeholder.com/50.png/09f/666"
                        class="img-thumbnail img-list" /></td>
                <td class="align-middle">pawan singh</td>
                <td class="align-middle">
                    <a href="/contactbook/view.php?id=2" class="btn btn-success">View</a>
                    <a href="/contactbook/addcontact.php?id=2" class="btn btn-primary">Edit</a>
                    <a href="/contactbook/delete.php?id=2" class="btn btn-danger"
                        onclick="return confirm(`Are you sure want to delete this contact?`)">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>

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