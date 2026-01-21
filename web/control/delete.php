<?php
include '../model/database.php';
session_start();


$conn = createCon();


if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    deleteUser($conn, $deleteId);
    session_destroy();

    header("Location: ../view/login.php");
    exit();
}


$users = getAllUsers($conn);


close($conn);
?>