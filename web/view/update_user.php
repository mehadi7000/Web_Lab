<?php
include '../model/database.php';
session_start();

$conn = createCon();

if (!isset($_GET['id'])) {
    echo "No user ID provided.";
    exit();
}

$phone = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM student WHERE Phone = '$phone'");
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "User not found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>
</head>
<body>
    <h2>Update Profile</h2>
    <form method="post" action="../control/update_control.php">
        <input type="hidden" name="original_phone" value="<?php echo htmlspecialchars($user['Phone']); ?>">

        Name: <input type="text" name="Name" value="<?php echo htmlspecialchars($user['Name']); ?>"><br><br>
        Father's Name: <input type="text" name="F_name" value="<?php echo htmlspecialchars($user['F_name']); ?>"><br><br>
        Mother's Name: <input type="text" name="M_name" value="<?php echo htmlspecialchars($user['M_name']); ?>"><br><br>
        Email: <input type="email" name="Email" value="<?php echo htmlspecialchars($user['Email']); ?>"><br><br>
        Phone: <input type="text" name="Phone" value="<?php echo htmlspecialchars($user['Phone']); ?>"><br><br>
        DOB: <input type="date" name="DOB" value="<?php echo htmlspecialchars($user['DOB']); ?>"><br><br>

        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
