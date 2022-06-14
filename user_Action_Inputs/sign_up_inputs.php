<?php
ob_start();
session_start();
include_once "../includes/config.php";
include "../includes/database.php";

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // first name validation:
    if (empty($_POST["fname"])) {
        $errors[] = "Name is required";
    } else {
        $firstName = test_input($_POST["fname"]);

        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
            $errors[] = "Only letters and white space allowed";
        }
    }

    // Last Name Validation
    $lastName = test_input($_POST["lname"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
        $errors[] = "Only letters and white space allowed";
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


    //password validation
    if (empty($_POST["password"])) {
        $errors[] = "Password is Required";
    } else {
        $password = test_input($_POST["password"]);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $errors[] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        };
    }

    //Confirm Password validation 

    if (empty($_POST["cpassword"]) || $_POST["password"] != $_POST["cpassword"]) {
        $errors[] = "Passwords cannot be empty, and has to match";
    } else {
        $cPassword = test_input($_POST["cpassword"]);
    };
    $submitBtn = test_input($_POST["register"]);

    //Validate if the user's email already exists in the database:

    if (!empty($email)) {
        $conn = db_connect();
        $sanitizeEmail = mysqli_real_escape_string($conn, $email);
        $emailSql = "SELECT id from `users` where `email` = '{$sanitizeEmail}'";
        $sqlResult = mysqli_query($conn, $emailSql);
        $emailRow = mysqli_num_rows($sqlResult);
        if ($emailRow > 0) {
            $errors[] = "Email already exists";
        }
        db_close($conn);
    }


    // Getting values accepted if no errors encountered

    if (!empty($errors)) {
        $_SESSION["errors"] = $errors; // storing the errors in a session variable
        header("location: " . SITE_URL . "sign_up.php");
        echo print_arr($errors);
        exit();
    }


    // Encrypting the user password: Hashing the poassword

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO `users` (firstName, lastName, email,password) VALUES ('{$firstName}', '{$lastName}', '{$email}','{$passwordHash}')";
    $conn = db_connect();
    if (mysqli_query($conn, $sql)) {
        db_close($conn);
        $_SESSION["success"] = "New Record succusfully 
        created";
        header("location: " . SITE_URL . "sign_up.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    exit();
}