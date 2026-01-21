<?php
include "../model/database.php";
session_start(); 

if (isset($_POST["submit"])) {
    $name =$_POST["name"];
    $phone =$_POST["phone"];

    if (empty($name) || empty($phone)) {
        echo "Name and Phone number are required.";
        exit();
    }

    $conobj = createCon();

    $result = checkLogin($conobj, $name, $phone);

    if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $user; 
    header("Location: ../view/profile.php");
    exit();
    }

    else {
        echo "Invalid name or phone number.";
    }

    close($conobj);
}
?>
