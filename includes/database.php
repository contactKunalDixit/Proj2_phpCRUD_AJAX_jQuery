<?php

function db_connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "EmployeesDB";
    $conn = mysqli_connect($servername, $username, $password, $db_name);

    if (!$conn) {
        die("connection failed: " . mysqli_connect_error());
    } else {
        return $conn;
    }
};

function db_close($conn)
{
    mysqli_close($conn);
}