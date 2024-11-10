<?php
if(isset($_COOKIE['admin_id'])){
    session_start();
    $_SESSION['admin_username'] = $_COOKIE['admin_username'];
    $_SESSION['admin_name'] = $_COOKIE['admin_name'];
    $_SESSION['admin_id'] = $_COOKIE['admin_id'];
    $_SESSION['admin_image'] = $_COOKIE['admin_image'];
    header('Location:./Admin_dashboard.php');
}
$username = $password = $username = '';
$login_username_err = $login_pwd_err = $login_uname_err = '';
$student_login_err = 0;
include ('../database and tables/create_database.php');
error_reporting(0);
try {
    if (isset($_POST['login_submit'])) {
        //chacking username input
        if (isset($_POST['username']) && empty($_POST['username'])) {
            $student_login_err++;
            $login_username_err = "enter your name";
        } else {
            $login_username_err = " ";
        }
        //checking password input
        if (isset($_POST['password']) && empty($_POST['password'])) {
            $student_login_err++;
            $login_pwd_err = "enter password";
        } else {
            $login_pwd_err = " ";
        }
        //check for admin login form database
        if (
            !empty($_POST['username']) && !empty($_POST['password'])
        ) {
            echo '<script>alert("fill all the fields");</script>';
            $admin_login_err = 0;
            $username = $_POST['username'];
            $password = $_POST['password'];
            // $encrypted_pwd = md5($password);
            //taking name from database
            $select_name = "SELECT * from Admin_details where username='$username' AND password='$password'";
            $result_name = mysqli_query($connect, $select_name);
            if (mysqli_num_rows($result_name) == 1) {
                $row = $result_name->fetch_assoc();
                $admin_id = $row['id'];
                $admin_image = $row['Image'];
                $admin_name = $row['Name'];
                if ( $row['username'] == $username && $row['password'] == $password) {
                    session_start();
                    $_SESSION['admin_username'] = $username;
                    $_SESSION['admin_name'] = $admin_name;
                    $_SESSION['admin_id'] = $admin_id;
                    $_SESSION['admin_image'] = $admin_image;
                    if (isset($_POST['keep_sign'])) {
                        setcookie('admin_username', $username, time() + 20 * 365 * 24 * 60 * 60);
                        setcookie('admin_name', $admin_name, time() + 20 * 365 * 24 * 60 * 60);
                        setcookie('admin_id', $admin_id, time() + 20 * 365 * 24 * 60 * 60);
                        setcookie('admin_image', $admin_image, time() + 20 * 365 * 24 * 60 * 60);
                    }
                    header('Location:./Admin_dashboard.php');
                }
            
                // $ursename = $_POST['ursename'];
                // $username = $_POST['username'];
                // $password = $_POST['password'];
            } else {
                $admin_login_err++;
                $login_pwd_err = 'invalid password';
                $login_uname_err = 'invalid name ';
                $login_username_err = 'invalid username';
            }

            if ($admin_login_err == 0) {
                header('Location:./Admin_dashboard.php');
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
    <title>Admin login panel</title>
    <link rel="stylesheet" href="admin_login_css.css" />
</head>

<body>
    <form action="" method="post" class="admin_login_panel">
        <div class="admin_login_form">
            <a href="./index page/index_pge.php"
                class="close">&times;</a>
            <div>
                <h1 id="loginpanel_head">Admin Login panel</h1>
                <img id="idloginimag" src="images/login_logo.png" />
            </div>
            <div>
                <label for="username">username:</label>
                <input  type="text" id="username" name="username" placeholder="enter username"
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
            <div class="admin_keep_sign">
                <input type="checkbox" id="keep_sign" name="keep_sign" value="keep_sign">keep me sign in
            </div>
            <div class="admin_forget_pwd">
                <a href="https://localhost/Attendance%20System%20project/Admin%20dashboard/admin_forget_password.php">forget password</a>
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