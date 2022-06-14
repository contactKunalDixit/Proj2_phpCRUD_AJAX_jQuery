<?php
// Defining a constant for URL switch

define("SITE_URL", "/Proj2_phpCRUD_AJAX_jQuery/");

// Validating Inputs from users / forms:
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Printing in a human readable form
function print_arr($arr)
{
    echo "<pre>";
    print_r($arr);
    exit();
}