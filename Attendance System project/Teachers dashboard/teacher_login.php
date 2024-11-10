<?php
if (isset($_COOKIE['teacher_id'])) {
    session_start();
    $_SESSION['teacher_name'] = $_COOKIE['teacher_name'];
    $_SESSION['teacher_username'] = $_COOKIE['teacher_username'];
    $_SESSION['teacher_profile'] = $_COOKIE['teacher_profile'];
    $_SESSION['teacher_id'] = $_COOKIE['teacher_id'];
    header('location:./teacher_dashboard.php');

}
// if (isset($_GET['err']) && $_GET['err'] == 1) {
//     $login_pwd_err = "please login to cntinue";
// }
$username = $password = $username = '';
$login_username_err = $login_pwd_err = $login_uname_err = '';
$teacher_login_err = 0;
include ('../database and tables/create_database.php');
error_reporting(0);
try {
    if (isset($_POST['login_submit'])) {
        //checking username
        if (isset($_POST['username']) && empty($_POST['username'])) {
            $teacher_login_err++;
            $login_username_err = "enter your username";
        } else {
            $login_username_err = " ";
        }

        //cheacking password
        if (isset($_POST['password']) && empty($_POST['password'])) {
            $teacher_login_err++;
            $login_pwd_err = "enter password";
        } else {
            $login_pwd_err = " ";
        }

        //check for teacher login
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            //taking name from database
            $select_name = "SELECT * from Teacher_details where username='$username' AND  password='$password' ";
            $result_name = mysqli_query($connect, $select_name);
            if (mysqli_num_rows($result_name) == 1) {
                $row = $result_name->fetch_assoc();
                $teacher_profile = $row['image'];
                $teacher_id = $row['id'];
                $teacher_name = $row['Name'];
                if ( $row['username'] == $username && $row['password'] == $password) {
                    session_start();
                    $_SESSION['teacher_id'] = $teacher_id;
                    $_SESSION['teacher_name'] = $teacher_name;
                    $_SESSION['teacher_username'] = $username;
                    $_SESSION['teacher_profile'] = $teacher_profile;
                    if (isset($_POST['keep_sign'])) {
                        setcookie('teacher_username', $username, time() + 20 * 365 * 24 * 60 * 60);
                        setcookie('teacher_profile', $teacher_profile, time() + 20 * 365 * 24 * 60 * 60);
                        setcookie('teacher_id', $teacher_id, time() + 20 * 365 * 24 * 60 * 60);
                        setcookie('teacher_name', $teacher_name, time() + 20 * 365 * 24 * 60 * 60);
                    }
                    header('location:./teacher_dashboard.php');
                }
            } else {
                $teacher_login_err++;
                $login_username_err = 'invalid username';
                $login_pwd_err = 'invalid passowrd';
            }
            if ($teacher_login_err == 0) {
                echo 'Login Sucessful';
                header('./teacher_dashboard.php');
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
    <title>Teacher login panel</title>
    <link rel="stylesheet" href="teacher_login_css.css" />
</head>

<body>
    <!-- login panel-->
    <form action="" method="post" class="teacher_login_panel">
        <div class="teacher_login_form">
            <a href="../index page/index_pge.php"
                class="close">&times;</a>
            <div>
                <h1 id="loginpanel_head">Teacher Login panel</h1>
                <img id="idloginimag" src="images/login_logo.png" />
            </div>
            <div>
                <label for="username">username:</label>
                <input type="text" id="username" name="username" placeholder="enter username"
                    value="<?php echo $username; ?>">
                <span>
                    <?php echo isset($login_username_err) ? $login_username_err : ''; ?>
                </span>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="enter passowrd"
                    value="<?php echo $password; ?>">
                <img src="images/pwd_hide1.png" id="pwd_hide" onclick="pwdhide()"><img src="images/pwd_show.png"
                    id="pwd_show" onclick="pwdshow()">
                <span>
                    <?php echo isset($login_pwd_err) ? $login_pwd_err : ''; ?>
                </span>
            </div>
            <div class="teacher_keep_sign">
                <input type="checkbox" id="keep_sign" name="keep_sign" value="keep_sign">keep me sign in
            </div>
            <div class="teacher_forget_pwd">
                <a href="./teacher_forget_password.php">forget password</a>
            </div>
            <div>
                <!-- <button class="loginclick" id="login_cancel" onclick="logincancel()">cancel</button> -->
                <button class="loginclick" id="login_submit" name="login_submit" onclick="loginsubmit()">login</button>
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