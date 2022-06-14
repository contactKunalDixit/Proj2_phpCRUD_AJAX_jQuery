<?php
ob_start();
session_start();
include_once "../includes/database.php";
include_once "../includes/config.php";

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Email Validation
    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }
    }
    // Password Validation

    if (empty($_POST["password"])) {
        $errors[] = "Password is required";
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


    if (!empty($errors)) {
        $_SESSION["errors"] = $errors;
        header("location: " . SITE_URL . "login.php");
        exit();
    }

    // if No errors in validation, then check the user password from the DB:
    if (!empty($email) && !empty($password)) {
        $conn = db_connect();
        $sanitizeEmail = mysqli_real_escape_string($conn, $email);
        $sql = "SELECT * FROM `users` where `email` = '{$sanitizeEmail}'";
        $sqlResult = mysqli_query($conn, $sql);
        $emailRow = mysqli_num_rows($sqlResult);

        //If email found; then proceed to check for passwords
        if ($emailRow > 0) {
            $userInfo = mysqli_fetch_assoc($sqlResult);

            if (!empty($userInfo)) { // password Match checking
                // print_arr($userInfo);
                $passwordInDB = $userInfo["password"];
                if (password_verify($password, $passwordInDB)) {
                    unset($userInfo["password"]); // we should not include passwords in session's variables
                    $_SESSION["user"] = $userInfo;
                    header("location: " . SITE_URL . "index.php");
                    exit();
                } else { //if password not found
                    $errors[] = "incorrect password";
                    $_SESSION["errors"] = $errors;
                    header("location:" . SITE_URL . "login.php");
                    exit();
                }
            }
        } else {
            // if email not found in DB
            $errors[] = "Incorrect Email. Consider registering by Signing up! ";
            $_SESSION["errors"] = $errors;
            header("location:" . SITE_URL . "login.php");
            exit();
        }
    }
}