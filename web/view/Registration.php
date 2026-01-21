<?php
include "../control/action.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Female Student Registration</title>
  <link rel="stylesheet" href="css.css">

</head>
<body>
  <div class="sticky">
    <h1>Registration for Needy Female Student</h1>
  </div>
  <img src="../image/regs.jpg" alt="Registration Image">
  
  <form action=" " method="post" enctype="multipart/form-data"  onsubmit="return validateForm();">
    
    <!-- Personal Information -->
    <fieldset>
      <legend>Personal Information :</legend>
      <div class="note">
        This is an important portion of your registration. If you give any wrong information, you will not be eligible for a donation. Please give correct information.
      </div>
      <br>
      <table>
        <tr>
          <td><label for="name">Name:</label></td>
          <td><input type="text" id="name" name="name" class="input_border" placeholder="John Doe" >
          <td><p id="edu"><?php echo $name_error; ?></p></td>
        </td>
        </tr>
        <tr>
        
        </tr>
        <tr>
          <td><label for="fname">Father's Name:</label></td>
          <td><input type="text" class="input_border" id="fname" name="fname" placeholder="Mostafijur Rahman"></td>
        </tr>
        <tr>
          <td><label for="mname">Mother's Name:</label></td>
          <td><input type="text" class="input_border" id="mname" name="mname" placeholder="Shalina Akter"></td>
        </tr>
        <tr>
          <td><label for="email">Email:</label></td>
          <td><input type="email" class="input_border" id="email" name="email" placeholder="email@example.com"></td>
          <td><p id="edu"><?php echo $email_error ; ?></p></td>
        </tr>
        <tr>
                <td></td>
                <td>
                    <p class="red_validate" id="email_error">Please enter a valid email</p>
                </td>
            </tr>
        <tr>
          <td><label for="phone">Phone:</label></td>
          <td><input type="number" class="input_border" id="phone" name="phone" placeholder="01716385494"></td>
          <td><p id="edu"><?php echo $phone_errors ; ?></p></td>
        </tr>
        <tr>
          <td></td>
          <td><p class="red_validate" id="phone_error">Please enter a valid phone number (min 10 digits).</p>
          </td>
        </tr>
        <tr>
          <td><label for="BCN">Birth Certificate No:</label></td>
          <td><input type="number" class="input_border" id="BCN" name="BCN" placeholder="5789645634752"></td>
          <td><p id="edu"><?php echo  $BCN_errors; ?></p></td>
        </tr>
        <tr>
          <td></td>
          <td><p class="red_validate" id="bcn_error">Please enter a valid Birth Certificate Number (min 10 digits).</p>
          </td>
        </tr>
        <tr>
          <td><label for="birthday">Birthday:</label></td>
          <td><input type="date" class="input_border" id="birthday" name="birthday"></td>
          <td><p id="edu"><?php echo  $birth_errors; ?></p></td>
        </tr>
        <tr>
          <td></td>
          <td><p class="red_validate" id="birthday_error">Please select your birthday.</p>

          </td>
        </tr>
        <tr>
          <td><label>Education:</label></td>
          <td>
            <input type="radio" id="running" name="education" value="Running">
            <label for="running">Running</label>
            <input type="radio" id="dropped" name="education" value="Dropped">
            <label for="dropped">Dropped</label>
            <td><p id="edu"><?php echo  $education_errors; ?></p></td>
          </td>
        </tr>
        
        <tr>
          <td></td>
          <td><p class="red_validate" id="education_error">Please select your education status.</p>


          </td>
        </tr>
        <tr>
          <td><label>Dependent:</label></td>
          <td>
            <input type="radio" id="family" name="dependent" value="Family">
            <label for="family">Family</label>
            <input type="radio" id="husband" name="dependent" value="Husband">
            <label for="husband">Husband</label>
            <td><p id="edu"><?php echo  $depedent_errors; ?></p></td>
          </td>
        </tr>
        <tr>
        <td><label for="gname">Upload image :</label></td>  
        <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
        <td><p id="edu"><?php echo  $img_error; ?></p></td></tr>
      </table>
    </fieldset>

    <input type="submit" name ="submit"class="btnsubmit" value="Submit">
  </form>
</body>
</html>
