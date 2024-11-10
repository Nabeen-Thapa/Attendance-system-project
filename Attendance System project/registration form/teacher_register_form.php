<?php
include 'student_register_validate.php';
// include 'image_upload.php';
include '../database and tables/create_database.php';
//include '../database and tables/Alter_student_DBtable.php'; 
include '../database and tables/Student_table.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student registration form</title>
    <link rel="stylesheet" href="registration_css.css" />
</head>

<body>
    <!--student registration-->
    <div class="teacher_wrapper">
        <form id="id_std_register" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
            enctype="multipart/form-data">
            <a href="http://localhost/Attendance%20System%20project/index%20page/index_pge.php" class="std_regclose">&times;</a>
            <h2>Teacher regester panel</h2>
            <div>
                <label class="stdreglbl" id="stdname" for="idstdinputname">Student name:</label>
                <input type="text" class="stdregister" id="idstdinputname" name="stdinputname"
                    placeholder="enter your full name" value="<?php echo $stdname; ?>" />
                <span class="reg_err" id="std_reg_name_err">
                    <?php echo isset($stderrName) ? $stderrName : '' ?>
                </span>
            </div>
            <div>
                <label class="stdreglbl" for="stdemail">student email:</label>
                <input type="email" class="stdregister" id="stdemail" name="stdemail" value="<?php echo $Semail; ?>"
                    placeholder="enter your eamil" />
                <span class="reg_err" id="std_reg_email_err">
                    <?php echo isset($stderremail) ? $stderremail : '' ?>
                </span>
            </div>
            <div>
                <label class="stdreglbl" for="stdphone"> Phone number:</label>
                <input type="text" class="stdregister" id="stdphone" name="stdphone"
                    placeholder="student contact number" value="<?php echo $Sphone; ?>" />
                <span class="reg_err" id="std_reg_phone_err">
                    <?php echo isset($stderrphone) ? $stderrphone : '' ?>
                </span>
            </div>
            <span class="reg_err" id="std_reg_sec_err">
                <?php echo isset($stderrsection) ? $stderrsection : '' ?>
            </span>
            <span class="reg_err" id="std_reg_regno_err">
                <?php echo isset($stderrreg) ? $stderrreg : '' ?>
            </span>
            <span class="reg_err" id="std_reg_roll_err">
                <?php echo isset($stderrroll) ? $stderrroll : '' ?>
            </span>
            <div>
                <label class="stdreglbl" id="idstdadrslbl" for="idstdadrs">Address:</label>
                <input type="text" class="stdregister" id="idstdadrs" name="address"
                    placeholder="enter temporary address" value="<?php echo $Saddress; ?>" />
                <span class="reg_err" id="std_reg_adres_err">
                    <?php echo isset($stderraddress) ? $stderraddress : '' ?>
                </span>
            </div>
            <div>
                <label class="stdreglbl" id="idstdgenderlbl" for="std_gen">Student gender:</label>
                <div class="outstdgender" id="std_gen">
                    Male<input type="radio" class="stdgender" id="idstdmale" name="gender" value="Male" <?php if ($gender == "Male")
                        echo "checked"; ?> />
                    Female<input type="radio" class="stdgender" id="idstdfemale" name="gender" value="Female" <?php if ($gender == "Female")
                        echo "checked"; ?> />
                    Others<input type="radio" class="stdgender" id="idstdothers" name="gender" value="others" <?php if ($gender == "others")
                        echo "checked"; ?> />
                    <span class="reg_err" id="std_reg_gen_err">
                        <?php echo isset($stderrgender) ? $stderrgender : '' ?>
                    </span>
                </div>
            </div>
            <div>
                <label class="stdreglbl" id="idstdpwdlbl" for="idstdpwd">Create password:</label>
                <input type="password" class="stdregister" id="idstdpwd" name="stdpwd" placeholder="create your password for login" />
                <span class="reg_err" id="std_reg_setpwd_err"></span>
            </div>
            <div>
                <label class="stdreglbl" id="idstdconformpwdlbl" for="idstdconfirmpwd">confirm passwrod:</label><input type="password" class="stdregister" id="idstdconfirmpwd" name="idstdconfirmpwd" placeholder="confirm your password" />
                <span class="reg_err" id="std_reg_matchpwd_err"></span>
            </div>

            <!-- stndent image for frofile  -->
            <div>
                <label for="ppimage">Image : </label>
                <input type="file" name="ppimage" id="ppimage" class="stdregister"
                    value="<?php echo (isset($_FILES['ppimage'])) ? $_FILES['ppimage'] : '' ?>" />
                <span class="reg_err" id="std_reg_img_err">
                    <?php echo isset($std_img_err) ? $std_img_err : '' ?>
                </span>
            </div>
            <div>
                <button class="stdregclick" name="std_reg_cancel" id="idstdregcancel"
                    onclick="stdregcancel()">cancel</button>
                <button class="stdregclick" name="std_regclk" id="idstdregsubmit"
                    onclick="stdregsubmit()">Submit</button>
            </div>
            <div class="reg_login">
                <label for="reg_log">alrady registered ? </label>
                <a href="https://localhost/Attendance%20System%20project/login%20form/login_panel.php" id="log_reg"
                    name="login_reg">login</a>
            </div>
        </form>
    </div>
    <script src="register_script.js"></script>
    <script src="../title bar/menu_berjs.js"></script>
</body>
</html>