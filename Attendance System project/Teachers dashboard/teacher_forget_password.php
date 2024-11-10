<?php

$teacher_email = $teacher_phone = $teacher_password = '';
$login_email_err = $login_pwd_err = $password_err = '';
$teacher_forget_pwd_err = 0;
include ('../database and tables/create_database.php');
error_reporting(0);

try {
    if (isset($_POST['login_submit'])) {
        // Checking email input
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $teacher_email = $_POST['email'];
        } else {
            $teacher_forget_pwd_err++;
            $login_email_err = "Enter your email";
        }
        
        // Checking phone input
        if (isset($_POST['phone']) && !empty($_POST['phone'])) {
            $teacher_phone = $_POST['phone'];
        } else {
            $teacher_forget_pwd_err++;
            $login_pwd_err = "Enter phone";
        }

        // Checking password
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $teacher_password = $_POST['password'];
        } else {
            $teacher_forget_pwd_err++;
            $password_err = "Enter your new password";
        }

        // Check for teacher login form database
        if ($teacher_forget_pwd_err == 0) {            
            // Taking name from database
            $select_teacher_pwd = "SELECT * FROM teacher_details WHERE Email='$teacher_email' AND Phone='$teacher_phone'";
            $result_teacher_pwd = mysqli_query($connect, $select_teacher_pwd);

            if (mysqli_num_rows($result_teacher_pwd) == 1) {
                // Update password
                $teacher_pwd_update_sql = "UPDATE teacher_details SET Password = '$teacher_password' WHERE Email='$teacher_email'";
                if (mysqli_query($connect, $teacher_pwd_update_sql)) {
                    echo '<script>alert("Password updated successfully");</script>';
                    header("Location: https://localhost/Attendance%20System%20project/Teachers%20dashboard/teacher_login.php");
                    
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
    <title>teacher Password Recovery Form</title>
    <link rel="stylesheet" href="../Admin dashboard/admin_login_css.css" />
</head>

<body>
    <form action="" method="post" class="teacher_pwd_panel">
        <div class="teacher_pwd_form">
            <a href="https://localhost/Attendance%20System%20project/teacher%20dashboard/teacher_login.php" class="close">&times;</a>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email" value="<?php echo htmlspecialchars($teacher_email); ?>">
                <span class="error-message">
                    <?php echo isset($login_email_err) ? $login_email_err : ''; ?>
                </span>
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="number" name="phone" placeholder="Enter phone" value="<?php echo htmlspecialchars($teacher_phone); ?>">
                <span class="error-message">
                    <?php echo isset($login_pwd_err) ? $login_pwd_err : ''; ?>
                </span>
            </div>
            <div class="teacher_new_password">
                <label for="password">Enter your new password:</label>
                <input type="text" name="password" id="password" placeholder="Enter your new password" value="<?php echo htmlspecialchars($teacher_password); ?>">
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
