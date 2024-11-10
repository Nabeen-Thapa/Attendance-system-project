<?php
$old_password  = $new_password = '';
$login_old_password_err =  $new_password_err = '';
$tacher_change_pwd_err = 0;
include ('../database and tables/create_database.php');
error_reporting(0);

try {
    if (isset($_POST['change_pwd'])) {
         // Checking email input
         if (isset($_POST['email']) && !empty($_POST['email'])) {
            $tacher_email = $_POST['email'];
        } else {
            $tacher_change_pwd_err++;
            $login_email_err = "Enter your email";
        }
        // Checking old_password input
        if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
            $old_password = $_POST['old_password'];
        } else {
            $tacher_change_pwd_err++;
            $old_password_err = "Enter your old password";
        }
        

        // Checking new_password
        if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
            $new_password = $_POST['new_password'];
        } else {
            $tacher_change_pwd_err++;
            $new_password_err = "Enter your new password";
        }

        // Check for tacher login form database
        if ($tacher_change_pwd_err == 0) {            
            // Taking name from database
            $select_tacher_pwd = "SELECT * FROM teacher_details WHERE password='$old_password' and Email= '$tacher_email'";
            $result_tacher_pwd = mysqli_query($connect, $select_tacher_pwd);

            if (mysqli_num_rows($result_tacher_pwd) == 1) {
                // Update new_password
                $tacher_pwd_change_sql = "UPDATE teacher_details SET password = '$new_password' WHERE password='$old_password' and Email= '$tacher_email'";
                if (mysqli_query($connect, $tacher_pwd_change_sql)) {
                    echo '<script>alert("password updated successfully");</script>';
                    header("Location: ./teacher_dashboard.php");
                   
                } else {
                    echo '<script>alert("new password update error");</script>';
                }
            } else {
                echo '<script>alert("Invalid old password or phone");</script>';
            }
        } else {
            echo '<script>alert("Check validation error");</script>';
        }
    }
} catch (Exception $ex) {
    die('Database Error: ' . $ex->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tacher new_password Recovery Form</title>
    <link rel="stylesheet" href="Admin dashboard/admin_login_css.css" />
</head>

<body>
    <form action="" method="post" class="tacher_pwd_panel">
        <div class="tacher_pwd_change">
            <a href="./teacher_dashboard.php" class="close">&times;</a>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email" value="<?php echo $tacher_email; ?>">
                <span >
                    <?php echo isset($login_email_err) ? $login_email_err : ''; ?>
                </span>
            </div>
            <div>
                <label for="old_password">old_password:</label>
                <input type="text" id="old_password" name="old_password" placeholder="Enter old_password" value="<?php echo $old_password; ?>">
                <span >
                    <?php echo isset($old_password_err) ? $old_password_err : ''; ?>
                </span>
            </div>
            <div class="new_password">
                <label for="new_password">Enter your new password:</label>
                <input type="text" name="new_password" id="new_password" placeholder="Enter your new password" value="<?php echo $new_password; ?>">
                <span >
                    <?php echo isset($new_password_err) ? $new_password_err : ''; ?>
                </span>
            </div>
            <div>
                <button type="submit" name="change_pwd">Submit</button>
            </div>
        </div>
    </form>
</body>

</html>
