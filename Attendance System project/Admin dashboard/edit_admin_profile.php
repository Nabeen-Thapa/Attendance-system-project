<?php
session_start();
include ('../database and tables/create_database.php');
$admin_id = $_SESSION['admin_id'];
$select_admin = "SELECT * FROM admin_details WHERE id='$admin_id'";
$result_admin = mysqli_query($connect, $select_admin);

if (mysqli_num_rows($result_admin) > 0) {
    $admin_data = mysqli_fetch_assoc($result_admin);
} else {
    echo " ";
}



$admin_name = $admin_email = $admin_phone = $admin_address = $admin_old_pwd = $admin_new_pwd = $admin_uname = '';
$status = '1';
$admin_error = 0;
if (isset($_POST['admin_add_btn'])) {
    //for admin name validation
    if (isset($_POST['admin_name']) && !empty($_POST['admin_name']) && trim($_POST['admin_name'])) {
        $admin_name = trim($_POST['admin_name']);
        if (!preg_match('/^[A-Z][a-z\s]+([A-Z][a-z\s]+)*[A-Z][a-z\s]+$/', $admin_name)) {
            $admin_error++;
            $admin_name = 'your name is not valid';
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
        } 
        // else {
        //     try {
        //         $email_sql = "SELECT Email from admin_details where Email='$admin_email'";
        //         $result_eml = mysqli_query($connect, $email_sql);
        //         if (mysqli_num_rows($result_eml) == 1) {
        //             $admin_error++;
        //             $admin_email_err = 'email already registered';
        //         } else {
        //             $admin_email_err = ' ';
        //         }
        //     } catch (Exception $ex) {
        //         die('Database Error: ' . $ex->getMessage());
        //     }
        // }
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
            // } else {
            //     try {
            //         $phone_select = "SELECT Phone from admin_details where Phone='$admin_phone'";
            //         $result_phone = mysqli_query($connect, $phone_select);
            //         if (mysqli_num_rows($result_phone) == 1) {
            //             $admin_error++;
            //             $admin_phone_err = 'phone already registered';
            //         } else {
            //             $admin_email_err = ' ';
            //         }
            //     } catch (Exception $ex) {
            //         die('Database Error: ' . $ex->getMessage());
            //     }
        }

    } else {
        $admin_error++;
        $admin_phone_err = "enter your phone number";
    }

    //for admin username validation
    if (isset($_POST['admin_uname']) && !empty($_POST['admin_uname']) && trim($_POST['admin_uname'])) {
        $admin_uname = trim($_POST['admin_uname']);
        if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $admin_uname)) {
            // try {
            //     //admin username checkin with database
            //     $uname_sql = "SELECT username from admin_details where Email='$admin_uname'";
            //     $result_uname = mysqli_query($connect, $uname_sql);
            //     if (mysqli_num_rows($result_uname) == 1) {
            //         $admin_error++;
            //         $admin_uname_err = 'username already registered';
            //     } else {
            //         $admin_uname_err = ' ';
            //     }
            // } catch (Exception $ex) {
            //     die('Database Error: ' . $ex->getMessage());
            // }
            $admin_uname = trim($_POST['admin_uname']);
        } else {

            $admin_error++;
            $admin_uname_err = 'your username is not valid';

        }
    } else {
        $admin_error++;
        $admin_uname_err = 'Enter your uname';
    }

    //admin passwword
    if (isset($_POST['admin_old_pwd']) && !empty($_POST['admin_old_pwd']) && trim($_POST['admin_old_pwd'])) {
        $admin_old_pwd = $_POST['admin_old_pwd'];
        // if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $admin_old_pwd)) {
        //     $admin_error++;
        //     $admin_old_pwd_err = 'your pwd is not valid';
        // }else{
        //     $admin_old_pwd = $_POST['admin_old_pwd'];
        // }
        //$admin_old_pwd = 
    } else {
        $admin_error++;
        $admin_old_pwd_err = 'Enter your pwd';
    }
    //admin confirm password
    if (isset($_POST['admin_new_pwd']) && !empty($_POST['admin_new_pwd']) && trim($_POST['admin_new_pwd'])) {
        $admin_new_pwd = $_POST['admin_new_pwd'];
        // if ($admin_new_pwd == $admin_old_pwd) {
        //     $admin_new_pwd = $_POST['admin_new_pwd'];
        // } else {
        //     $admin_error++;
        //     $admin_confirm_err = "confirm password is not matched";
        // }
    } else {
        $admin_error++;
        $admin_confirm_err = 'Enter your confirm_pwd';
    }
    if ($admin_error == 0) {
        include '../database and tables/create_database.php';
        $update_admin = "UPDATE admin_details SET Name = '$admin_name', Email= '$admin_email', username= '$admin_uname', password='$admin_new_pwd' Phone= '$admin_phone' where id = '$admin_id'";
        if(mysqli_query($connect, $update_admin)){
            echo '<script>alert("Your details are updated");</script>'; 
        }else{
            echo '<script>alert("Check the error");</script>';
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
    <title>admin update form</title>
    <link rel="stylesheet" href="admin_forms_css.css">
    <!-- <link rel="stylesheet" href="edit_admin_profile_css.css"> -->
</head>

<body>
    <?php
    // include ("admin_side_bar.php");
// include ("admin_title_bar.php");
    ?>
    <!--admin registration-->
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div class="admin_update_profile">
            <!-- <span class="adminregclose" onclick="hideadminreg()">&times;</span> -->
            <h2 class="admin_head">admin edit panel</h2>
            <div>
                <label for="admin_name"> Name:</label>
                <input type="text" name="admin_name" id="admin_name" value="<?php echo $admin_data['Name']; ?>" />
                <span> <?php echo isset($admin_name_err) ? $admin_name_err : ' '; ?></span>
            </div>
            <div>
                <label for="admin_email"> E-mail:</label>
                <input type="email" name="admin_email" class="admin_email" id="admin_email" placeholder="enter email"
                    value="<?php echo $admin_data['Email']; ?>" />
                <span><?php echo isset($admin_email_err) ? $admin_email_err : ' '; ?></span>
            </div>
            <div>
                <label for="admin_uname">username:</label>
                <input type="text" name="admin_uname" class="admin_uname" id="admin_uname" placeholder="Enter username"
                    value="<?php echo $admin_data['username']; ?>" />
                <span><?php echo isset($admin_uname_err) ? $admin_uname_err : ' '; ?></span>
            </div>
            <div>
                <label for="admin_phone">contact:</label>
                <input type="number" name="admin_phone" class="admin_phone" id="admin_phone"
                    placeholder="Enter contacts number" value="<?php echo $admin_data['Phone']; ?>" />
                <span><?php echo isset($admin_phone_err) ? $admin_phone_err : ' '; ?></span>
            </div>
            
            <div>
                <div>
                    <label for="admin_old_pwd"> old Password:</label>
                    <input type="password" name="admin_old_pwd" class="admin_old_pwd" id="admin_old_pwd"
                        placeholder="enter oyur " value="<?php echo $admin_old_pwd; ?>" />
                        <!-- <img src="images/pwd_hide1.png" id="pwd_hide" onclick="pwdhide()"><img src="images/pwd_show.png"
                    id="pwd_show" onclick="pwdshow()"> -->
                    <span><?php echo isset($admin_old_pwd_err) ? $admin_old_pwd_err : ' '; ?></span>
                </div>
                <div>
                    <label for="admin_new_pwd">New password:</label>
                    <input type="password" name="admin_new_pwd" class="admin_new_pwd"
                        id="admin_new_pwd" placeholder="conform your login password"
                        value="<?php echo $admin_new_pwd; ?>" />
                        <!-- <img src="images/pwd_hide1.png" id="pwd_hide" onclick="pwdhide()"><img src="images/pwd_show.png"
                    id="pwd_show" onclick="pwdshow()"> -->
                    <span> <?php echo isset($admin_confirm_err) ? $admin_confirm_err : ' '; ?></span>
                </div>
            </div>
            <div>
                <button class="admin_add" name="admin_add_btn">update</button>
            </div>
        </div>
    </form>
    <script>

        document.getElementById('pwd_show').style.display = 'none';
        function pwdshow() {
            document.getElementById('pwd_hide').style.display = 'inline';
            document.getElementById('pwd_show').style.display = 'none';
            document.getElementById('password').type = 'password';

        }
        function pwdhide() {
            document.getElementById('pwd_show').style.display = 'inline';
            document.getElementById('pwd_hide').style.display = 'none';
            document.getElementById('password').type = 'text';
        }
        document.getElementById('password').addEventListener('contextmenu', function (event) {
            event.preventDefault();
        });
    </script>
</body>

</html>
 