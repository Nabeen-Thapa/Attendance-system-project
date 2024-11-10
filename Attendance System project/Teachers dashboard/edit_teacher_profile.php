<?php
session_start();
include ('../database and tables/create_database.php');
$teacher_id = $_SESSION['teacher_id'];
$select_teacher = "SELECT * FROM teacher_details WHERE id = '$teacher_id'";
$result_teacher = mysqli_query($connect, $select_teacher);
if (mysqli_num_rows($result_teacher) > 0) {
    $teacher_data = mysqli_fetch_assoc($result_teacher);
} else {
    echo " ";
}



$teacher_name = $teacher_email = $teacher_phone = $teacher_address = $teacher_old_pwd = $teacher_new_pwd = $teacher_uname = '';
$status = '1';
$teacher_error = 0;
if (isset($_POST['teacher_add_btn'])) {
    //for student name validation
    if (isset($_POST['teacher_name']) && !empty($_POST['teacher_name']) && trim($_POST['teacher_name'])) {
        $teacher_name = trim($_POST['teacher_name']);
        if (!preg_match('/^[A-Z][a-z\s]+([A-Z][a-z\s]+)*[A-Z][a-z\s]+$/', $teacher_name)) {
            $teacher_error++;
            $teacher_name = 'your name is not valid';
        }
    } else {
        $teacher_error++;
        $teacher_name_err = 'Enter your name';
    }
    // student email

    if (isset($_POST['teacher_email']) && !empty($_POST['teacher_email']) && trim($_POST['teacher_email'])) {
        $emailcheck = filter_var($_POST['teacher_email'], FILTER_SANITIZE_EMAIL);
        $teacher_email = $_POST['teacher_email'];
        if (!filter_var($teacher_email, FILTER_VALIDATE_EMAIL)) {
            $teacher_error++;
            $teacher_email_err = "Do you mean " . $emailcheck . '?';
        }
        //  else {
        //     try {
        //         $email_sql = "SELECT Email from teacher_details where Email='$teacher_email'";
        //         $result_eml = mysqli_query($connect, $email_sql);
        //         if (mysqli_num_rows($result_eml) == 1) {
        //             $teacher_error++;
        //             $teacher_email_err = 'email already registered';
        //         } else {
        //             $teacher_email_err = ' ';
        //         }
        //     } catch (Exception $ex) {
        //         die('Database Error: ' . $ex->getMessage());
        //     }
        // }
    } else {
        $teacher_error++;
        $teacher_email_err = 'Enter your email';
    }
    // studnet phone
    $phone_pattern = '/^(98|97)\d{8}$/';
    if (isset($_POST['teacher_phone']) && !empty($_POST['teacher_phone']) && trim($_POST['teacher_phone'])) {
        $teacher_phone = trim($_POST['teacher_phone']);
        if (!preg_match($phone_pattern, $teacher_phone)) {
            $teacher_error++;
            $teacher_phone_err = "enter the validate phone";
        } 
        // else {
        //     try {
        //         $phone_select = "SELECT Phone from teacher_details where Phone='$teacher_phone'";
        //         $result_phone = mysqli_query($connect, $phone_select);
        //         if (mysqli_num_rows($result_phone) == 1) {
        //             $teacher_error++;
        //             $teacher_phone_err = 'phone already registered';
        //         } else {
        //             $teacher_email_err = ' ';
        //         }
        //     } catch (Exception $ex) {
        //         die('Database Error: ' . $ex->getMessage());
        //     }
        // }

    } else {
        $teacher_error++;
        $teacher_phone_err = "enter your phone number";
    }

    //address
    if (isset($_POST['teacher_address']) && !empty($_POST['teacher_address']) && trim($_POST['teacher_address'])) {
        $teacher_address = trim($_POST['teacher_address']);
        if (!preg_match('/^[A-Za-z0-9\s\.,#\-]+$/', $teacher_address)) {
            $teacher_error++;
            $teacher_address_err = 'invalid address';
        }
    } else {
        $teacher_error++;
        $teacher_address_erer = 'Enter your address';
    }

    //student gender
    if (isset($_POST["teacher_gender"])) {
        $teacher_gender = $_POST["teacher_gender"];
        if ($teacher_gender == " ") {
            $teacher_error++;
            $teacher_gender_err = "Choose your gender";
        }
    }

    //image upload
    if(isset($_FILES['ppimage'])){
        if ($_FILES['ppimage']['error'] == 0) {
            if ($_FILES["ppimage"]["size"] < 5000000) { // Limiting to 50MB
                $filetype = ['image/jpeg', 'image/png', 'image/svg+xml', 'image/bmp'];
                if (in_array($_FILES['ppimage']['type'], $filetype)) {
                    $filename = uniqid() . '.' . pathinfo($_FILES['ppimage']['name'], PATHINFO_EXTENSION);
                    if (move_uploaded_file($_FILES['ppimage']['tmp_name'], '../Admin dashboard/teacher_images/' . $filename)) {
                        $image =  $filename;
                        $img_type = $_FILES['ppimage']['type'];
                    } else {
                        $teacher_error++;
                        $std_img_err = 'Upload failed';
                    }
                } else {
                    $teacher_error++;
                    $std_img_err = "File type must be jpeg/png/svg/bmp";
                }
            } else {
                $teacher_error++;
                $std_img_err = "Your image is too big in size";
            }
        } 
        // else {
        //     $teacher_error++;
        //     $std_img_err = "File upload error";
        // }
    }else{
        $image = $teacher_data['image'];
    }

    //for student username validation
    if (isset($_POST['teacher_uname']) && !empty($_POST['teacher_uname']) && trim($_POST['teacher_uname'])) {
        $teacher_uname = trim($_POST['teacher_uname']);
        if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $teacher_uname)) {
            // try {
            //     //teacher username checkin with database
            //     $uname_sql = "SELECT username from teacher_details where Email='$teacher_uname'";
            //     $result_uname = mysqli_query($connect, $uname_sql);
            //     if (mysqli_num_rows($result_uname) == 1) {
            //         $teacher_error++;
            //         $teacher_uname_err = 'username already registered';
            //     } else {
            //         $teacher_uname_err = ' ';
            //     }
            // } catch (Exception $ex) {
            //     die('Database Error: ' . $ex->getMessage());
            // }

        } else {

            $teacher_error++;
            $teacher_uname_err = 'your username is not valid';

        }
    } else {
        $teacher_error++;
        $teacher_uname_err = 'Enter your uname';
    }

    //teacher passwword
    if (isset($_POST['teacher_old_pwd']) && !empty($_POST['teacher_old_pwd']) && trim($_POST['teacher_old_pwd'])) {
        $teacher_old_pwd = $_POST['teacher_old_pwd'];
        try {
                //teacher old pwd checking with database
                $pwd_sql = "SELECT password from teacher_details where password='$teacher_old_pwd'";
                $result_pwd = mysqli_query($connect, $pwd_sql);
                if (mysqli_num_rows($result_pwd) != 1) {
                    $teacher_error++;
                    $teacher_old_pwd_err = 'passwrod not match';
                } else {
                    $teacher_old_pwd_err = ' ';
                }
            } catch (Exception $ex) {
                die('Database Error: ' . $ex->getMessage());
            }
    } else {
        $teacher_error++;
        $teacher_old_pwd_err = 'Enter your pwd';
    }
    //teacher new password
    if (isset($_POST['teacher_new_pwd']) && !empty($_POST['teacher_new_pwd']) && trim($_POST['teacher_new_pwd'])) {
        $teacher_new_pwd = $_POST['teacher_new_pwd'];
    } else {
        $teacher_error++;
        $teacher_new_pwd_err = 'Enter your confirm_pwd';
    }
    if ($teacher_error == 0) {
        //password venerator
        // $request_date = date("Y-m-d");

        //include database to store student regsitered data 
        include '../database and tables/create_database.php';
        $teacher_update = "UPDATE teacher_details SET Name='$teacher_name',Email= '$teacher_email',  Phone= '$teacher_phone', Username='$teacher_uname',password= '$teacher_new_pwd', address= '$teacher_address', Gender= '$teacher_gender' where id = '$teacher_id'";
        if(mysqli_query($connect, $teacher_update)){
            echo '<script>alert("updated");</script>';
            header("location:https://localhost/Attendance%20System%20project/Teachers%20dashboard/view_teacher_profile.php");
        }else {
            echo '<script>alert("check the error in update ");</script>';
    
        } 
    } else {
        echo '<script>alert("check the error validation ");</script>';

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher update form</title>
    <!-- <link rel="stylesheet" href="registration_css.css" /> -->
    <link rel="stylesheet" href="../Admin dashboard/admin_forms_css.css">
</head>

<body>
<?php  
?>
    <!--teacher registration-->
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div class="teacher_registration">
            <!-- <span class="teacherregclose" onclick="hideteacherreg()">&times;</span> -->
            <h2 class="teacher_head">Teachers registration panel</h2>
            <div>
                <label for="teacher_name"> Name:</label>
                <input type="text" name="teacher_name" id="teacher_name" value="<?php echo $teacher_data['Name']; ?>" />
                <span> <?php echo isset($teacher_name_err) ? $teacher_name_err : ' '; ?></span>
            </div>
            <div>
                <label for="teacher_email"> E-mail:</label>
                <input type="email" name="teacher_email" class="teacher_email" id="teacher_email"
                    placeholder="enter email" value="<?php echo $teacher_data['Email']; ?>" />
                <span><?php echo isset($teacher_email_err) ? $teacher_email_err : ' '; ?></span>
            </div>
            <div>
                <label for="tecaher_phone">contact:</label>
                <input type="number" name="teacher_phone" class="tecaher_phone" id="teacher_phone"
                    placeholder="Enter contacts number" value="<?php echo $teacher_data['Phone']; ?>" />
                <span><?php echo isset($teacher_phone_err) ? $teacher_phone_err : ' '; ?></span>
            </div>
            <div>
                <label for="teacher_address">Address:</label>
                <input type="text" name="teacher_address" class="teacher_address" id="teacher_address"
                    placeholder="Enter temporary" value="<?php echo $teacher_data['address']; ?>" />
                <span><?php echo isset($teacher_address_err) ? $teacher_address_err : ' '; ?></span>
            </div>

            <div>
                <label for="teacher_gender">Gender:</label>
                <div class="teacher_gender_div">
                    Male<input type="radio" class="teacher_gender" name="teacher_gender" value="Male <?php if ($teacher_data['Gender'] == "Male")
                        ?>"/>
                    Female<input type="radio" class="teacher_gender" name="teacher_gender" value="Female <?php if ($teacher_data['Gender'] == "Female")
                        ?> "/>
                    Others<input type="radio" class="teacher_gender" name="teacher_gender" value="others<?php if ($teacher_data['Gender'] == "others")
                        ?> "/>
                    <span><?php echo isset($teacher_gender_err) ? $teacher_gender_err : ' '; ?></span>

                </div>
            </div>
            
            <div>
                <div>
                    <label for="teacher_uname">username:</label>
                    <input type="text" name="teacher_uname" class="teacher_uname" id="teacher_uname"
                        placeholder="set a username  for login" value="<?php echo $teacher_data['username']; ?>" />
                    <span><?php echo isset($teacher_uname_err) ? $teacher_uname_err : ' '; ?></span>
                </div>
                <div>
                    <label for="teacher_old_pwd">old Password:</label>
                    <input type="password" name="teacher_old_pwd" class="teacher_old_pwd" id="teacher_old_pwd"
                        placeholder="enter your old password" value="" />
                    <span><?php echo isset($teacher_old_pwd_err) ? $teacher_old_pwd_err : ' '; ?></span>
                </div>
                <div>
                    <label for="teacher_new_pwd">New password:</label>
                    <input type="password" name="teacher_new_pwd" class="teacher_new_pwd"
                        id="teacher_new_pwd" placeholder="enter your new password"
                        value="<?php echo $teacher_new_pwd; ?>" />
                    <span> <?php echo isset($teacher_new_pwd_err) ? $teacher_new_pwd_err : ' '; ?></span>
                </div>
            </div>
            <div>
                <!-- <button class="teacher_add_cancel">cancel</button> -->
                <button class="teacher_add" name="teacher_add_btn">Add</button>
            </div>
        </div>
    </form>
    <!-- <script src="register_script.js"></script> -->
</body>

</html>