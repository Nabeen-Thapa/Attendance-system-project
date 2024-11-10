<?php

$student_email = $student_phone = $student_password = '';
$login_email_err = $login_pwd_err = $password_err = '';
$student_forget_pwd_err = 0;
include ('../database and tables/create_database.php');
error_reporting(0);

try {
    if (isset($_POST['login_submit'])) {
        // Checking email input
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $student_email = $_POST['email'];
        } else {
            $student_forget_pwd_err++;
            $login_email_err = "Enter your email";
        }
        
        // Checking phone input
        if (isset($_POST['phone']) && !empty($_POST['phone'])) {
            $student_phone = $_POST['phone'];
        } else {
            $student_forget_pwd_err++;
            $login_pwd_err = "Enter phone";
        }

        // Checking password
        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $student_password = $_POST['password'];
        } else {
            $student_forget_pwd_err++;
            $password_err = "Enter your new password";
        }

        // Check for student login form database
        if ($student_forget_pwd_err == 0) {            
            // Taking name from database
            $select_student_pwd = "SELECT * FROM student_table WHERE Email='$student_email' AND Phone='$student_phone'";
            $result_student_pwd = mysqli_query($connect, $select_student_pwd);

            if (mysqli_num_rows($result_student_pwd) == 1) {
                // Update password
                $student_pwd_update_sql = "UPDATE student_table SET login_pwd = '$student_password' WHERE Email='$student_email'";
                if (mysqli_query($connect, $student_pwd_update_sql)) {
                    echo '<script>alert("password upadted successfully");</script>';
                    header("Location:https://localhost/Attendance%20System%20project/Student_Dashboard/student_login.php");
                    
                } else {
                    echo '<script>alert("Password update error");</script>';
                }
            } else {
                echo '<script>alert("data not found");</script>';
            }
        } else {
            echo '<script>alert("Invalid email or phone");</script>';
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
    <title>student Password Recovery Form</title>
    <link rel="stylesheet" href="../Admin dashboard/admin_login_css.css" />
</head>

<body>
    <form action="" method="post" class="student_pwd_panel">
        <div class="student_pwd_form">
            <a href="https://localhost/Attendance%20System%20project/Student_Dashboard/student_login.php" class="close">&times;</a>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter email" value="<?php echo $student_email; ?>">
                <span class="error-message">
                    <?php echo isset($login_email_err) ? $login_email_err : ''; ?>
                </span>
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="number" name="phone" placeholder="Enter phone" value="<?php echo $student_phone; ?>">
                <span class="error-message">
                    <?php echo isset($login_pwd_err) ? $login_pwd_err : ''; ?>
                </span>
            </div>
            <div class="student_new_password">
                <label for="password">Enter your new password:</label>
                <input type="text" name="password" id="password" placeholder="Enter your new password" value="<?php echo $student_password; ?>">
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
