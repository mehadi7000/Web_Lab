<?php
include "../control/profil_control.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<form action=" " method="POST">


<h2>Login Form</h2>

<form action="login_process.php" method="POST">
    <label for="name">Name:</label><br>
    <input type="text" name="name" id="name" ><br><br>

    <label for="phone">Phone:</label><br>
    <input type="text" name="phone" id="phone" ><br><br>

    <input type="submit" name ="submit"class="btnsubmit" value="Submit">
</form>

</body>
</html>
