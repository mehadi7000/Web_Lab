<?php
include '../model/database.php';
session_start();

if (isset($_POST['update'])) {
    $conn = createCon();

    $original_phone = mysqli_real_escape_string($conn, $_POST['original_phone']);
    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $F_name = mysqli_real_escape_string($conn, $_POST['F_name']);
    $M_name = mysqli_real_escape_string($conn, $_POST['M_name']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Phone = mysqli_real_escape_string($conn, $_POST['Phone']);
    $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);

    $sql = "UPDATE student SET 
                Name = '$Name',
                F_name = '$F_name',
                M_name = '$M_name',
                Email = '$Email',
                Phone = '$Phone',
                DOB = '$DOB'
            WHERE Phone = '$original_phone'";

 
    if (mysqli_query($conn, $sql)) {
        echo "User updated successfully.<br>";
        echo "<a href='../view/login.php'> Back to login</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    close($conn);
}
?>
