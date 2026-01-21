<?php
include "../control/profil_control.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
      <link rel="stylesheet" href="profile_css.css">

</head>
<body>
    <h2>Profile</h2>

    <?php
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
         echo "<p><img src='../uploads/" . htmlspecialchars($user['IMG']) . "' alt='Profile Image' ></p>";
        echo "<p>Name: " . htmlspecialchars($user['Name']) . "</p>";
        echo "<p>Father's Name: " . htmlspecialchars($user['F_name']) . "</p>";
        echo "<p>Mother's Name: " . htmlspecialchars($user['M_name']) . "</p>";
        echo "<p>Date of Birth: " . htmlspecialchars($user['DOB']) . "</p>";
        echo "<p>Phone: " . htmlspecialchars($user['Phone']) . "</p>";
        echo "<p>Email: " . htmlspecialchars($user['Email']) . "</p>";
        echo "<td>
            <a href='update_user.php?id=" . $user['Phone'] . "'>Update</a> |
           <a href='../control/delete.php?delete_id=" . $user['Phone'] . "' onclick='return confirm(\"Delete this user?\");'>Delete</a>
          </td>";
    } else {
        echo "<p>User not logged in.</p>";
    }
    ?>
    

    

    <a href="../control/logout.php">Logout</a>
</body>
</html>
