<?php
ob_start();
session_start();
include_once "../includes/config.php";
include_once "../includes/database.php";

if (!empty($_SESSION["user"])) {
    $userInfo = $_SESSION["user"];
    $userID = $_SESSION["user"]["id"];
} else {
    session_unset();
    session_destroy();
    exit();
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    print_arr($_POST);

    // Emp Name Validation
    if (empty($_POST["empName"])) {
        $errors[] = "Name is required";
    } else {
        $fullName = test_input($_POST["empName"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $fullName)) {
            $errors[] = "Only letters and white space allowed";
        }
    }

    // Email Validation
    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }
    }

    // Phone Validation - 10 digit phone
    if (empty($_POST["phone"])) {
        $errors[] = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!empty($phone) && !is_numeric($phone) && (strlen($phone) < 8 || strlen($phone) > 10)) {
            $errors[] = "Invalid Phone Number";
        }
    }

    // Address Validation
    $address = test_input($_POST["address"]);

    // designation Validation
    if (empty($_POST["designation"])) {
        $errors[] = "Designation is required";
    } else {
        $designation = test_input($_POST["designation"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $designation)) {
            $errors[] = "Only letters and white space allowed";
        }
    }

    // Salary Validation 
    if (empty($_POST["salary"])) {
        $errors[] = "Salary is required";
    } else {
        $salary = test_input($_POST["salary"]);
        if (empty($salary) && !is_numeric($salary)) {
            $errors[] = "Invalid entry";
        }
    }

    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
    };
}