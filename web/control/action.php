<?php
include "../model/database.php";
 $name_error=" "; 
 $email_error =" ";
 $phone_errors=" ";
 $BCN_errors =" ";
 $birth_errors=" ";
 $education_errors ="";
 $depedent_errors=" ";
 $img_error=" ";
 $targetPath=" ";
 $has_error= 0;

if (isset(($_REQUEST["submit"]))) {

    
    if (empty($_REQUEST['name'])) {
        $name_error = "Name is required.";
        $has_error= 1;
    } else {
        $name = $_REQUEST['name'];
        if (strlen($name) < 5) {
            $name_error = "Name must be at least 5 characters.";
            $has_error= 1;
        }
    }
    if (empty($_REQUEST['email'])) {
        $email_error = "Email is required.";
        $has_error= 1;
    } else {
        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format.";
            $has_error= 1;
        }
    }


    if (empty($_REQUEST['phone'])) {
        $phone_errors= "Phone number is required.";
    } else {
        if (!preg_match("/^[0-9]{11}$/", $_REQUEST['phone'])) {
            $phone_errors = "Phone number must be 11digits.";
            $has_error= 1;
        }
    }
    if (empty($_REQUEST['BCN'])) {
        $BCN_errors = "Birth Certificate Number is required.";
        $has_error= 1;
    } else {
        if (!preg_match("/^[0-9]{1}$/", $_REQUEST['BCN'])) {
            $BCN_errors = "Birth Certificate Number must be at least 17 digits.";
            $has_error= 1;
        }
    }
    if (empty($_REQUEST['birthday'])) {
        $birth_errors = "Birthday is required.";
        $has_error= 1;
    } else {
        $d = DateTime::createFromFormat('Y-m-d', $_REQUEST['birthday']);
            $cutoffDate = new DateTime('2005-12-31');
            if ($d < $cutoffDate) {
                $birth_errors = "Date of birth must not be before 2005.";
                $has_error= 1;
            }

    }

    if (empty($_REQUEST['education'])) {
        $education_errors = "Must select one ";
        $has_error= 1;
    } 

    if (empty($_REQUEST['dependent'])) {
        $depedent_errors = "Must select one";
        $has_error= 1;
    } 



  if (empty($_FILES["fileToUpload"]["tmp_name"])) {
        $img_error = "Please upload your image.";
        $has_error= 1;
    } else 
    {
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $img_error = "Sorry, your file is too large.";
            $has_error= 1;
        } 
        else
        {
            $imageFileType = $_FILES["fileToUpload"]["type"];

            $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', ];

            if (!in_array($imageFileType, $allowedTypes)) {
                $img_error = "Sorry, only JPG, JPEG, PNG files are allowed.";
                $has_error= 1;
            } else {
                $fileExt = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
               $targetPath = "../downloded/" . "image_" . date("Ymd_His") . "." . $fileExt;
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetPath);
            }

            
        
        }
    }
    if($has_error == 0){
    $conobj=createCon();
    $result = insertData($conobj, $_POST['name'], $_POST['fname'],$_POST['mname'],$_POST['email'],$_POST['phone'],$_POST['BCN'],$_POST['birthday'], $targetPath);

    if ($result){
     header("Location: ../view/login.php");
    } else {
    echo "Error inserting data: " . mysqli_error($conn);
    }
    close($conobj);
    }

}

?>
