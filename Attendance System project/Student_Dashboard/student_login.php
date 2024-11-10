<?php
if (isset($_COOKIE['student_id'])) {
    session_start();
    $_SESSION['student_email'] = $_COOKIE['student_email'];
    $_SESSION['student_name'] = $_COOKIE['student_name'];
    $_SESSION['std_profile'] =$_COOKIE['std_profile'];
    $_SESSION['student_id'] =$_COOKIE['student_id'];
    $_SESSION['std_semester'] =$_COOKIE['std_semester'];
    header('Location:./student_dashboard.php');

}
// if (isset($_GET['err']) && $_GET['err'] == 1) {
//     $login_pwd_err = "Please login to continue";
// }
$username = $password = $email = '';
$login_email_err = $login_pwd_err = $login_uname_err = '';
$student_login_err = 0;
include ('../database and tables/create_database.php');
error_reporting(0);
try {
    if (isset($_POST['login_submit'])) {
        //checking email
        if (isset($_POST['email']) && empty($_POST['email'])) {
            $student_login_err++;
            $login_email_err = "Enter your email";
        } else {
            $login_email_err = " ";
        }

            //checkimng password
        if (isset($_POST['password']) && empty($_POST['password'])) {
            $student_login_err++;
            $login_pwd_err = "Enter password";
        } else {
            $login_pwd_err = " ";
        }

        //checking from database for studnet
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $student_login_err = 0;
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
             //taking data from database
            $select_student = "SELECT * FROM student_table WHERE  Email='$email' AND login_pwd='$password'";
            $result_name = mysqli_query($connect, $select_student);

            if (mysqli_num_rows($result_name) == 1) {
                $row = $result_name->fetch_assoc();
                $std_profile = $row['image'];
                $student_name= $row['Name'];
                $std_sem =$row['semester'];
                $student_id=$row['id'];
                if (
                     $row['Email'] == $email && $row['login_pwd'] == $password
                ) {
                    session_start();
                    $_SESSION['std_profile'] = $std_profile;
                    $_SESSION['student_email'] = $email;
                    $_SESSION['student_name'] = $student_name;
                    $_SESSION['student_id'] = $student_id;
                    $_SESSION['std_semester'] = $std_sem;
                    if (isset($_POST['keep_sign'])) {
                        setcookie('student_name', $student_name, time() + 365 * 24 * 60 * 60);
                        setcookie('std_profile', $std_profile, time() + 365 * 24 * 60 * 60);
                        setcookie('student_email', $email, time() + 365 * 24 * 60 * 60);
                        setcookie('student_id', $student_id, time() + 365 * 24 * 60 * 60);
                        setcookie('std_semester', $std_sem, time() + 365 * 24 * 60 * 60);
                    }

                    header('Location: ./student_dashboard.php');


                }
            } else {
                $student_login_err++;
                $login_uname_err = 'invalid Name';
                $login_email_err = 'invalid email';
                $login_pwd_err = "invalid password";
            }

            if ($student_login_err == 0) {
                header('Location: ./student_dashboard.php');

            }
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
    <title>student Login Panel</title>
    <link rel="stylesheet" href="student_login_css.css" />
</head>

<body>
    <!-- login panel -->
    <form action="" method="post" class="student_login_panel">
        <div class="student_login_form">
            <a href="../index page/index_pge.php"
                class="close">&times;</a>
            <div>
                <h1 id="loginpanel_head">Login panel</h1>
                <img id="idloginimag" src="images/login_logo.png" />
            </div>
            <div>
                <label for="email">Email:</label>
                <input  type="email" id="email" name="email" placeholder="Enter Email"
                    value="<?php echo $email; ?>">
                <span><?php echo isset($login_email_err) ? $login_email_err : ''; ?></span>
            </div>
            <div>
                <label for="password">Password:</label>
                <input  type="password" id="password" name="password" placeholder="Enter Password"
                    value="<?php echo $password; ?>">
                <img src="images/pwd_hide1.png" id="pwd_hide" onclick="pwdhide()">
                <img src="images/pwd_show.png" id="pwd_show" onclick="pwdshow()">
                <span><?php echo isset($login_pwd_err) ? $login_pwd_err : ''; ?></span>
            </div>
            <div class="student_keep_sign">
                <input type="checkbox" id="keep_sign" name="keep_sign" value="keep_sign">Keep me signed in
            </div>
            <div class="student_forget_pwd">
                <a href="./student_forget_password.php">forget password</a>
            </div>
            <div>
                <!-- <button class="loginclick" id="login_cancel" onclick="logincancel()">Cancel</button> -->
                <button class="loginclick" id="login_submit" name="login_submit">Login</button>

              
            </div>
            <div class="log_register">
                <label for="log_reg">Not registered yet? </label>
                <a href="../registration form/Student_register.php" id="log_reg" name="login_reg">Register</a>
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