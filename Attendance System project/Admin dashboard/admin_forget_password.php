<?php

$admin_email = $admin_phone = $admin_password = '';
$login_email_err = $login_pwd_err = $password_err = '';
$admin_forget_pwd_err = 0;
include ('../database and tables/create_database.php');
error_reporting(0);

try {
    if (isset($_POST['login_submit'])) {
        // Checking email input
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $admin_email = $_POST['email'];
        } else {
            $admin_forget_pwd_err++;
            $login_email_err = "Enter your email";
        }
        
        // Checking phone input
        if (isset($_POST['phone']) && !empty($_POST['phone'])) {
            $admin_phone = $_POST['phone'];
        } else {
            $admin_forget_pwd_err++;
            $login_pwd_err = "Enter phone";
        }

        // Checking password
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $admin_password = $_POST['password'];
        } else {
            $admin_forget_pwd_err++;
            $password_err = "Enter your new password";
        }

        // Check for admin login form database
        if ($admin_forget_pwd_err == 0) {            
            // Taking name from database
            $select_admin_pwd = "SELECT * FROM Admin_details WHERE Email='$admin_email' AND Phone='$admin_phone'";
            $result_admin_pwd = mysqli_query($connect, $select_admin_pwd);

            if (mysqli_num_rows($result_admin_pwd) == 1) {
                // Update password
                $admin_pwd_update_sql = "UPDATE Admin_details SET Password = '$admin_password' WHERE Email='$admin_email'";
                if (mysqli_query($connect, $admin_pwd_update_sql)) {
                    echo '<script>alert("Password updated successfully");</script>';
                    header("Location: ./Admin_login.php");
                    exit();
                } else {
                    echo '<script>alert("Password update error");</script>';
                }
            } else {
                echo '<script>alert("Invalid email or phone");</script>';
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
    <title>Admin Password Recovery Form</title>
    <link rel="stylesheet" href="admin_login_css.css" />
</head>

<body>
    <form action="" method="post" class="admin_pwd_panel">
        <div class="admin_pwd_form">
            <a href="./Admin_login.php" class="close">&times;</a>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email" value="<?php echo htmlspecialchars($admin_email); ?>">
                <span class="error-message">
                    <?php echo isset($login_email_err) ? $login_email_err : ''; ?>
                </span>
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="number" name="phone" placeholder="Enter phone" value="<?php echo htmlspecialchars($admin_phone); ?>">
                <span class="error-message">
                    <?php echo isset($login_pwd_err) ? $login_pwd_err : ''; ?>
                </span>
            </div>
            <div class="admin_new_password">
                <label for="password">Enter your new password:</label>
                <input type="text" name="password" id="password" placeholder="Enter your new password" value="<?php echo htmlspecialchars($admin_password); ?>">
                <span class="error-message">
                    <?php echo isset($password_err) ? $password_err : ''; ?>
                </span>
            </div>
            <div>
                <button type="submit" name="login_submit">Submit</button>
            </div>
        </div>
    </form>
</body>

</html>
