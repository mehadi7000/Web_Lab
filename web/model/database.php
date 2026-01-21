<?php

function createCon(){
return  mysqli_connect("localhost", "root", "", "myDB");
}

function insertData($conn,$Name, $F_name, $M_name,$Email,$Phone,$BCN,$DOB,$IMG){
$sql = "INSERT INTO student (Name, F_name, M_name,Email,Phone,BCN,DOB,IMG)
VALUES ('$Name', '$F_name', '$M_name','$Email','$Phone','$BCN','$DOB','$IMG')";
return mysqli_query($conn, $sql);
}

function checkLogin($conn,$Name,$Phone){
$sql="SELECT * FROM student WHERE Name='$Name' AND Phone='$Phone'";
return mysqli_query($conn, $sql);
}



function deleteUser($conn, $Phone) {
    $userId = mysqli_real_escape_string($conn, $Phone);
    $query = "DELETE FROM student WHERE Phone = '$Phone'";
    return mysqli_query($conn, $query);
}
function fetchUser($conn, $Name) {
    $sql = "SELECT * FROM student WHERE Name='$Name' AND Phone='$Phone' ";
    return mysqli_query($conn, $sql); 
}

function getAllUsers($conn) {
    $query = "SELECT * FROM student";
    $result = mysqli_query($conn, $query);
    return $result;
}

function close($conn){
$conn->close();
}
?>
