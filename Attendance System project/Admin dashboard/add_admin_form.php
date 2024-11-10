<?php  
include ("admin_title_bar.php");
include ("admin_side_bar.php");
?>
<?php
include ('../database and tables/create_database.php');

$admin_name = $admin_email = $admin_phone = $admin_pwd = $admin_confirm_pwd = $admin_uname = '';
$status = '1';
$admin_error = 0;
if (isset($_POST['admin_add_btn'])) {
    //for admin name validation
    if (isset($_POST['admin_name']) && !empty($_POST['admin_name']) && trim($_POST['admin_name'])) {
        $admin_name = trim($_POST['admin_name']);
        if (!preg_match('/^[A-Z][a-z\s]+([A-Z][a-z\s]+)*[A-Z][a-z\s]+$/', $admin_name)) {
            $admin_error++;
            $admin_name_err = 'your name is not valid';
        }
    } else {
        $admin_error++;
        $admin_name_err = 'Enter your name';
    }
    // admin email

    if (isset($_POST['admin_email']) && !empty($_POST['admin_email']) && trim($_POST['admin_email'])) {
        $emailcheck = filter_var($_POST['admin_email'], FILTER_SANITIZE_EMAIL);
        $admin_email = $_POST['admin_email'];
        if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
            $admin_error++;
            $admin_email_err = "Do you mean " . $emailcheck . '?';
        } else {
            try {
                $email_sql = "SELECT Email from admin_details where Email='$admin_email'";
                $result_eml = mysqli_query($connect, $email_sql);
                if (mysqli_num_rows($result_eml) == 1) {
                    $admin_error++;
                    $admin_email_err = 'email already registered';
                } else {
                    $admin_email_err = ' ';
                }
            } catch (Exception $ex) {
                die('Database Error: ' . $ex->getMessage());
            }
        }
    } else {
        $admin_error++;
        $admin_email_err = 'Enter your email';
    }
    // studnet phone
    $phone_pattern = '/^(98|97)\d{8}$/';
    if (isset($_POST['admin_phone']) && !empty($_POST['admin_phone']) && trim($_POST['admin_phone'])) {
        $admin_phone = trim($_POST['admin_phone']);
        if (!preg_match($phone_pattern, $admin_phone)) {
            $admin_error++;
            $admin_phone_err = "enter the validate phone";
        } else {
            try {
                $phone_select = "SELECT Phone from admin_details where Phone='$admin_phone'";
                $result_phone = mysqli_query($connect, $phone_select);
                if (mysqli_num_rows($result_phone) == 1) {
                    $admin_error++;
                    $admin_phone_err = 'phone already registered';
                } else {
                    $admin_email_err = ' ';
                }
            } catch (Exception $ex) {
                die('Database Error: ' . $ex->getMessage());
            }
        }

    } else {
        $admin_error++;
        $admin_phone_err = "enter your phone number";
    }

    //image upload
    if (isset($_FILES['ppimage'])) {
        if ($_FILES['ppimage']['error'] == 0) {
            if ($_FILES["ppimage"]["size"] < 5000000) { // Limiting to 50MB
                $filetype = ['image/jpeg', 'image/png', 'image/svg+xml', 'image/bmp'];
                if (in_array($_FILES['ppimage']['type'], $filetype)) {
                    $filename = uniqid() . '.' . pathinfo($_FILES['ppimage']['name'], PATHINFO_EXTENSION);
                    if (move_uploaded_file($_FILES['ppimage']['tmp_name'], 'admin_images/' . $filename)) {
                        $image = $filename;
                        $img_type = $_FILES['ppimage']['type'];
                    } else {
                        $admin_error++;
                        $admin_img_err = 'Upload failed';
                    }
                } else {
                    $admin_error++;
                    $admin_img_err = "File type must be jpeg/png/svg/bmp";
                }
            } else {
                $admin_error++;
                $admin_img_err = "Your image is too big in size";
            }
        } else {
            $admin_error++;
            $admin_img_err = "File upload error";
        }
    }

    //for admin username validation
    if (isset($_POST['admin_uname']) && !empty($_POST['admin_uname']) && trim($_POST['admin_uname'])) {
        $admin_uname = trim($_POST['admin_uname']);
        if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $admin_uname)) {
            try {
                //admin username checkin with database
                $uname_sql = "SELECT username from admin_details where Email='$admin_uname'";
                $result_uname = mysqli_query($connect, $uname_sql);
                if (mysqli_num_rows($result_uname) == 1) {
                    $admin_error++;
                    $admin_uname_err = 'username already registered';
                } else {
                    $admin_uname_err = ' ';
                }
            } catch (Exception $ex) {
                die('Admin username error: ' . $ex->getMessage());
            }

        } else {

            $admin_error++;
            $admin_uname_err = 'your username is not valid';

        }
    } else {
        $admin_error++;
        $admin_uname_err = 'Enter your uname';
    }

    //admin passwword
    if (isset($_POST['admin_pwd']) && !empty($_POST['admin_pwd']) && trim($_POST['admin_pwd'])) {
        $admin_pwd = $_POST['admin_pwd'];
        // if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $admin_pwd)) {
        //     $admin_error++;
        //     $admin_pwd_err = 'your pwd is not valid';
        // }else{
        //     $admin_pwd = $_POST['admin_pwd'];
        // }
    } else {
        $admin_error++;
        $admin_pwd_err = 'Enter your pwd';
    }
    //admin confirm password
    if (isset($_POST['admin_confirm_pwd']) && !empty($_POST['admin_confirm_pwd']) && trim($_POST['admin_confirm_pwd'])) {
        $admin_confirm_pwd = $_POST['admin_confirm_pwd'];
        if ($admin_confirm_pwd == $admin_pwd) {
            $admin_confirm_pwd = $_POST['admin_confirm_pwd'];
        } else {
            $admin_error++;
            $admin_confirm_err = "confirm password is not matched";
        }
    } else {
        $admin_error++;
        $admin_confirm_err = 'Enter your confirm_pwd';
    }
    if ($admin_error == 0) {
        // $request_date = date("Y-m-d");
        include '../database and tables/create_database.php';
        include '../database and tables/admin_table.php';
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
    <title>admin registration form</title>
    <!-- <link rel="stylesheet" href="registration_css.css" /> -->
    <link rel="stylesheet" href="admin_forms_css.css">
</head>

<body>

    <!--admin registration-->
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div class="admin_registration">
            <!-- <span class="adminregclose" onclick="hideadminreg()">&times;</span> -->
            <h2 class="admin_head">admins registration panel</h2>
            <div>
                <label for="admin_name"> Name:</label>
                <input type="text" name="admin_name" id="admin_name" placeholder="enter name" value="<?php echo $admin_name; ?>" />
                <span> <?php echo isset($admin_name_err) ? $admin_name_err : ' '; ?></span>
            </div>
            <div>
                <label for="admin_email"> E-mail:</label>
                <input type="email" name="admin_email" class="admin_email" id="admin_email"
                    placeholder="enter email" value="<?php echo $admin_email; ?>" />
                <span><?php echo isset($admin_email_err) ? $admin_email_err : ' '; ?></span>
            </div>
            <div>
                <label for="tecaher_phone">contact:</label>
                <input type="number" name="admin_phone" class="tecaher_phone" id="admin_phone"
                    placeholder="Enter contacts number" value="<?php echo $admin_phone; ?>" />
                <span><?php echo isset($admin_phone_err) ? $admin_phone_err : ' '; ?></span>
            </div>
            <div>
                <label for="ppimage">Image : </label>
                <input type="file" name="ppimage" id="ppimage" class="stdregister" accept="<?php echo $filename; ?>" />
                <span>
                    <?php echo isset($admin_img_err) ? $admin_img_err : '' ?>
                </span>
            </div>
            <div>
                <div>
                    <label for="admin_uname">username:</label>
                    <input type="text" name="admin_uname" class="admin_uname" id="admin_uname"
                        placeholder="set a username  for login" value="<?php echo $admin_uname; ?>" />
                    <span><?php echo isset($admin_uname_err) ? $admin_uname_err : ' '; ?></span>
                </div>
                <div>
                    <label for="admin_pwd"> Password:</label>
                    <input type="password" name="admin_pwd" class="admin_pwd" id="admin_pwd"
                        placeholder="set a passwrod for login" value="<?php echo $admin_pwd; ?>" />
                    <span><?php echo isset($admin_pwd_err) ? $admin_pwd_err : ' '; ?></span>
                </div>
                <div>
                    <label for="admin_confirm_pwd">Conform:</label>
                    <input type="password" name="admin_confirm_pwd" class="admin_confirm_pwd"
                        id="admin_confirm_pwd" placeholder="conform your login password"
                        value="<?php echo $admin_confirm_pwd; ?>" />
                    <span> <?php echo isset($admin_confirm_err) ? $admin_confirm_err : ' '; ?></span>
                </div>
            </div>
            <div>
                <!-- <button class="admin_add_cancel">cancel</button> -->
                <button class="admin_add" name="admin_add_btn">Add</button>
            </div>
        </div>
    </form>
    <!-- <script src="register_script.js"></script> -->
</body>

</html>