<?php 
if(isset($_POST['old_password'])){ 
    if(isset($_POST['old_password']) && !empty($_POST['old_passwrod'])){
        $admin_old_password = $_POST['old_password'];
    }else{
        $old_passwrod_err = "enter your new old password";
    }
    if(!empty($_POST['$passwrod'])){
        include ('../database and tables/create_database.php');
        $admin_pwd_update_sql= "UPDATE Admin_detail set old_password = '$passwrod' where ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class="admin_old_password">
            <label for="old_password">enter your old old_password</label>
            <input type="text" name="old_password" id="old_password" value="<?php  echo $passwrod; ?>">
            <span>
                <?php echo isset($old_passwrod_err)?$old_password_err:'' ?>
            </span>
        </div>
        <div class="admin_new_password">
            <label for="new_password">enter your new password</label>
            <input type="text" name="new_password" id="new_password" value="<?php  echo $passwrod; ?>">
            <span>
                <?php echo isset($new_password_err)?$new_password_err:'' ?>
            </span>
        </div>
        <button name="change_pwd_btn">submit</button>
    </form>
</body>
</html>