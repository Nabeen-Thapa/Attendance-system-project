<?php
session_start();
$old_password  = $new_password = '';
$login_old_password_err =  $new_password_err = '';
$student_change_pwd_err = 0;
include ('../database and tables/create_database.php');
error_reporting(0);

try {
    if (isset($_POST['change_pwd'])) {
        // Checking old_password input
        if (isset($_POST['old_password']) && !empty($_POST['old_password'])) {
            $old_password = $_POST['old_password'];
        } else {
            $student_change_pwd_err++;
            $old_password_err = "Enter your old_password";
        }
        

        // Checking new_password
        if (isset($_POST['new_password']) && !empty($_POST['new_password'])) {
            $new_password = $_POST['new_password'];
        } else {
            $student_change_pwd_err++;
            $new_password_err = "Enter your new new_password";
        }

        // Check for student login form database
        if ($student_change_pwd_err == 0) {            
            // Taking name from database
            $student_email=$_SESSION['student_email'];
            $select_student_pwd = "SELECT * FROM  student_table WHERE login_pwd='$old_password' and Email= '$student_email'";
            $result_student_pwd = mysqli_query($connect, $select_student_pwd);

            if (mysqli_num_rows($result_student_pwd) == 1) {
                // Update new_password
                $student_pwd_change_sql = "UPDATE  student_table  SET login_pwd = '$new_password' WHERE login_pwd='$old_password' and Email= '$student_email'";
                if (mysqli_query($connect, $student_pwd_change_sql)) {
                    echo '<script>alert("password updated successfully");</script>';
                    header("Location: Student_Dashboard.php");
                   
                } 
            } else {
                echo '<script>alert("Invalid old password");</script>';
            }
        } else {
            echo '<script>alert("Invalid old password or phone");</script>';
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
    <title>student new_password Recovery Form</title>
    <link rel="stylesheet" href="../Admin dashboard/admin_login_css.css" />
</head>

<body>
    <form action="" method="post" class="student_pwd_panel">
        <div class="student_pwd_form">
            <a href=" ./student_dashboard.php" class="close">&times;</a>
            <div>
                <label for="old_password">old password:</label>
                <input type="text" id="old_password" name="old_password" placeholder="Enter old password" value="<?php echo $old_password; ?>">
                <span class="error-message">
                    <?php echo isset($login_old_password_err) ? $login_old_password_err : ''; ?>
                </span>
            </div>
            <div class="new_password">
                <label for="new_password">Enter your new password:</label>
                <input type="text" name="new_password" id="new_password" placeholder="Enter your new password" value="<?php echo $new_password; ?>">
                <span class="error-message">
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
