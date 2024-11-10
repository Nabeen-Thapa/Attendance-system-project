<?php
include '../database and tables/create_database.php';
$id = $_GET['id'];
$select_update = "SELECT * FROM Student_table WHERE id = $id";
$result_update = mysqli_query($connect, $select_update);

if (mysqli_num_rows($result_update) > 0) {
    $student_data = mysqli_fetch_assoc($result_update);
} else {
    echo " ";
}
$stdname = $Semail = $Sphone = $Ssection = $Saddress = $courseType = $Scourse = $Syear = $Ssem = $gender = $cpassword = $pwd = '';

//student name
$status = '1';
if (isset($_POST['std_regclk'])) {
    $error = 0;
    //for student name validation
    if (isset($_POST['stdinputname']) && !empty($_POST['stdinputname']) && trim($_POST['stdinputname'])) {
        $stdname = trim($_POST['stdinputname']);
        if (!preg_match('/^[A-Z][a-z\s]+([A-Z][a-z\s]+)*[A-Z][a-z\s]+$/', $stdname)) {
            $error++;
            $stderrName = 'your name is not valid';
        }
    } else {
        $error++;
        $stderrName = 'Enter your name';
    }
    // student email
    $stdemailcheck = filter_var($_POST['stdemail'], FILTER_SANITIZE_EMAIL);
    if (isset($_POST['stdemail']) && !empty($_POST['stdemail']) && trim($_POST['stdemail'])) {
        $Semail = trim($_POST['stdemail']);
        if (!filter_var($Semail, FILTER_VALIDATE_EMAIL)) {
            $error++;
            $stderremail = "Enter valid email, Do you mean " . $stdemailcheck . '?';
        }
    } else {
        $error++;
        $stderremail = 'Enter your email';
    }
    // studnet phone
    $phone_pattern = '/^(98|97)\d{8}$/';
    if (isset($_POST['stdphone']) && !empty($_POST['stdphone']) && trim($_POST['stdphone'])) {
        $Sphone = trim($_POST['stdphone']);
        if (!preg_match($phone_pattern, $Sphone)) {
            $error++;
            $stderrphone = "enter the validate phone";
        }
    } else {
        $error++;
        $stderrphone = "enter your phone number";
    }
    //studnet dob
    if (isset($_POST['date']) && !empty($_POST['date']) && trim($_POST['date'])) {
        $Sdob = trim($_POST['date']);

    } else {
        $error++;
        $stderrdate = 'Select your Date of birth';
    }
    // for passowrd
    if (isset($_POST['password']) && !empty($_POST['password']) && trim($_POST['password'])) {
        $pwd = trim($_POST['password']);
        if (strlen($pwd) > 8) {
            $password = trim($_POST['password']);
        } else {
            $error++;
            $stderrpwd = 'password must be 8 character';
        }
    } else {
        $error++;
        $stderrpwd = 'neter your passwrod';
    }
    //for confirm password
    if (isset($_POST['cpassword']) && !empty($_POST['cpassword']) && trim($_POST['cpassword'])) {
        $cpwd = trim($_POST['cpassword']);
        if (strlen($cpwd) == strlen($password)) {
            $cpassword = trim($_POST['cpassword']);
        } else {
            $error++;
            $stderrcpwd = 'password not match';
        }
    } else {
        $error++;
        $stderrcpwd = 'neter your passwrod';
    }

    // Check if the checkboxes are checked

    if (isset($_POST["courseType"])) {
        $courseType = $_POST["courseType"];
    } else {
        $error++;
        $stderrCtype = "Choose your course type";
    }
    //setudent select course
    $Scourse = $_POST["selectcourse"];
    if ($Scourse === "") {
        $Serrcourse = "Please select an course";
    } else {
        $selectcourse = $_POST['selectcourse'];
    }
    //setudent select year
    if (isset($_POST['selectyear'])) {
        $Syear = $_POST["selectyear"];
        if ($Scourse === "") {
            $Serryear = "Please select an year";
        } else {
            $selectyear = $_POST['selectyear'];
        }
    }
    if (isset($_POST['selectsem'])) {
        $Ssem = $_POST["selectsem"];
        if ($Scourse === "") {
            $Serrsem = "Please select an semester";
        } else {
            $selectsem = $_POST['selectsem'];
        }
    }
    //student section
    if (isset($_POST['section']) && !empty($_POST['section']) && trim($_POST['section'])) {
        $Ssection = trim($_POST['section']);
        if (!preg_match('/^[A-Z]+$/', $Ssection)) {
            $error++;
            $stderrsection = 'section word should be In Uppercase';
        }
    } else {
        $error++;
        $stderrsection = 'Enter your section';
    }

    //student registration no.
    if (isset($_POST['regno']) && !empty($_POST['regno']) && trim($_POST['regno'])) {
        $Sregister = trim($_POST['regno']);
        if (!preg_match('/^[0-9]+/', $Sregister)) {
            $error++;
            $stderrreg = 'registration No. should be interger';
        }
    } else {
        $error++;
        $stderrreg = 'Enter your registration No.';
    }

    //rollno
    if (isset($_POST['rollno']) && !empty($_POST['rollno']) && trim($_POST['rollno'])) {
        $Sroll = trim($_POST['rollno']);
        if (filter_var($Sroll, FILTER_VALIDATE_INT) == false) {
            $error++;
            $stderrroll = 'Roll No. should be interger';
        }
    } else {
        $error++;
        $stderrroll = 'Enter your roll No.';
    }

    //address
    if (isset($_POST['address']) && !empty($_POST['address']) && trim($_POST['address'])) {
        $Saddress = trim($_POST['address']);
        if (!preg_match('/^[A-Za-z0-9\s\.,#\-]+$/', $Saddress)) {
            $error++;
            $stderraddress = 'invalid address';
        }
    } else {
        $error++;
        $stderraddress = 'Enter your address';
    }
    //image upload
    include '../registration form/image_upload.php';

    //student gender
    if (isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    } else {
        $error++;
        $stderrgender = "Choose your gender";
    }


    if ($error == 0) {
        echo '<script>alert("updated ");</script>';
        $update_query = " UPDATE  student_table SET  Name ='$stdname', Email ='$Semail', Phone ='$Sphone', login_pwd ='$password', DOB ='$Sdob', course_type ='$courseType', std_course ='$selectcourse', year ='$selectyear', semester ='$selectsem', section ='$Ssection', RegistrationNo ='$Sregister', RollNo ='$Sroll', address  ='$Saddress', Gender ='$gender', image ='$image' WHERE id=$id";
        if (mysqli_query($con, $update_query)) {
            echo "Record updated successfully.";
            header("location:5.1_form_list.php");
        } else {
            echo '<script>alert("check the error ");</script>';
            echo "Error updating record: " . mysqli_error($con);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student registration form</title>
    <link rel="stylesheet" href="../registration form/registration_css.css" />
</head>

<body>
    <!--student registration-->
    <div>
        <form id="id_std_register" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <span class="std_regclose" onclick="hidestdreg()">&times;</span>
            <h1>Student regestration panel</h1>
            <div>
                <label class="stdreglbl" id="stdname" for="idstdinputname">Student name:</label>
                <input type="text" class="stdregister" id="idstdinputname" name="stdinputname"
                    placeholder="enter your full name" value="<?php echo $student_data['Name']; ?>" />
                <span class="reg_err" id="std_reg_name_err">
                    <?php echo isset($stderrName) ? $stderrName : '' ?>
                </span>
            </div>
            <div>
                <label class="stdreglbl" id="stdemail" for="idstdemail">student email:</label>
                <input type="email" class="stdregister" id="idstdemail" name="stdemail"
                    value="<?php echo $student_data['Email']; ?>" placeholder="enter your eamil" />
                <span class="reg_err" id="std_reg_email_err">
                    <?php echo isset($stderremail) ? $stderremail : '' ?>
                </span>
            </div>
            <div>
                <label class="stdreglbl" id="stdphone" for="idstdphone"> Phone number:</label>
                <input type="number" class="stdregister" id="idstdphone" name="stdphone"
                    placeholder="student contact number" value="<?php echo $student_data['Phone']; ?>" />
                <span class="reg_err" id="std_reg_name_err">
                    <?php echo isset($stderrphone) ? $stderrphone : '' ?>
                </span>
            </div>

            <div>
                <label class="stdreglbl" id="iddob" for="idstddob">Student DOB:</label>
                <input type="date" class="stdregister" id="idstddob" name="date"
                    placeholder="enter student's date of birth" value="<?php echo $student_data['DOB']; ?>" />
                <span class="reg_err" id="std_reg_dob_err">
                    <?php echo isset($stderrdate) ? $stderrdate : '' ?>
                </span>
            </div>
            <div>
                <label class="stdreglbl" id="pwdlbl" for="password">password:</label>
                <input type="password" class="stdregister" id="password" name="password"
                    placeholder="chnage your password" value="<?php echo isset($password) ? $password : ''; ?>" />
                <img src="images/pwd_hide1.png" id="pwd_hide" onclick="pwdhide()"><img src="images/pwd_show.png"
                    id="pwd_show" onclick="pwdshow()">
                <span class="reg_err" id="std_reg_pwd_err">
                    <?php echo isset($stderrpwd) ? $stderrpwd : '' ?>
                </span>
            </div>
            <div>
                <label class="stdreglbl" id="pwdlbl" for="cpassword">confirm password:</label>
                <input type="password" class="stdregister" id="cpassword" name="cpassword"
                    placeholder="chnage your cpassword" value="<?php echo isset($cpassowrd) ? $cpassowrd : ''; ?>" />
                <img src="images/pwd_hide1.png" id="cpwd_hide" onclick="cpwdhide()"><img src="images/pwd_show.png"
                    id="cpwd_show" onclick="cpwdshow()">
                <span class="reg_err" id="std_reg_pwd_err">
                    <?php echo isset($stderrcpwd) ? $stderrcpwd : '' ?>
                </span>
            </div>

            <div>
                <label class="stdreglbl" id="idstd_course_type_lbl">select course type:</label>
                <div class="outstd_course_typer">
                    yearly<input type="radio" class="stdcourse_type" id="idstdyearly" name="courseType"
                        onclick="yearlycourse()" />
                    semester wise<input type="radio" class="stdcourse_type" id="idstdsem_wise" name="courseType"
                        onclick="semcourse()" />
                    <span class="reg_err" id="std_reg_Ctype_err">
                        <?php echo isset($stderrCtype) ? $stderrCtype : '' ?>
                    </span>
                </div>
            </div>
            <div class="selectcourse">
                <div>
                    <label class="stdcourselbl" id="idstdcourseyear" for="idselectyear">choose course</label>
                    <label class="stdcourselbl" id="idstdyear" for="idselectyear">Select year</label>
                    <label class="stdcourselbl" id="idstdsem" for="idselectsem">select semester(if semester)</label>
                </div>
                <div>
                    <select id="idselectcourse" name="selectcourse">
                        <option value="">select course</option>
                        <?php
                        // Query to fetch course data from the database
                        $query = "SELECT DISTINCT std_course FROM student_table";
                        $result = mysqli_query($connect, $query);

                        // Loop through the results and generate options
                        while ($row = mysqli_fetch_assoc($result)) {
                            $course = $row['std_course'];
                            $selected = ($row['std_course'] == $course) ? "selected" : ""; // Check if current course matches student's course
                            echo '<option value="' . $course . '" ' . $selected . '>' . $course . '</option>';
                        }
                        ?>
                    </select>

                    <select id="idselectyear" name="selectyear">
                        <option value=" ">select year</option>
                        <option value="first year">first year</option>
                        <option value="second year">second year </option>
                        <option value="third year">third year </option>
                        <option value="fourth year"> fourth year</option>
                    </select>
                    <select id="idselectsem" name="selectsem">
                        <option value=" ">select semester</option>
                        <option value="First semester" value="<?php if ($student_data['semester'])
                            echo "selected"; ?>>first semester</option>
                        <option value=" second semester" value="<?php if ($student_data['semester'])
                            echo "selected"; ?>>second semester</option>
                        <option value=" third semester" value="<?php if ($student_data['semester'])
                            echo "selected"; ?>>third semester</option>
                        <option value=" fourth semester" value="<?php if ($student_data['semester'])
                            echo "selected"; ?>> fourth semester</option>
                        <option value=" fifth semester" value="<?php if ($student_data['semester'])
                            echo "selected"; ?>>fifth semester</option>
                        <option value=" sixth semester" value="<?php if ($student_data['semester'])
                            echo "selected"; ?>>sixth semester </option>
                        <option value=" seventh semester" value="<?php if ($student_data['semester'])
                            echo "selected"; ?>>seventh semester </option>
                        <option value=" eignth semester" value="<?php if ($student_data['semester'])
                            echo "selected"; ?>> eighth semester</option>
                    </select>
                </div>
                <span class=" reg_err" id="std_reg_course_err">
                            <?php echo isset($Serrcourse) ? $Serrcourse : '' ?></span>
                            <span class="reg_err" id="std_reg_year_err">
                                <?php echo isset($Serryear) ? $Serryear : '' ?>
                            </span>
                            <span class="reg_err" id="std_reg_sem_err">
                                <?php echo isset($Serrsem) ? $Serrsem : '' ?>
                            </span>
                </div>

            </div>
            <div class="std_sec_reg_rooll_lbl">
                <label class="stdreglbl" id="idsectionlbl" for="idsection">Section:</label>
                <label class="stdreglbl" id="idregnolbl" for="idregno">Registration No.:</label>
                <label class="stdreglbl" id="idrolllbl" for="idrollno">Roll No.:</label>
            </div>
            <div>
                <div class="std_sec_roll_reg">
                    <input type="text" class="stdregister" id="idsection" name="section" placeholder="enter section"
                        value="<?php echo $student_data['section']; ?>" />
                </div>
                <div class="std_sec_roll_reg_err">
                    <div class="std_sec_roll_reg">
                        <input type="number" class="stdregister" id="regno" name="regno"
                            placeholder="enter registration No."
                            value="<?php echo $student_data['RegistrationNo']; ?>" />
                    </div>
                    <div class="std_sec_roll_reg">
                        <input type="number" class="stdregister" id="idrollno" name="rollno"
                            placeholder="enter calss roll No." value="<?php echo $student_data['RollNo']; ?>" />

                    </div>
                </div>
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
                    placeholder="enter temporary address" value="<?php echo $student_data['address']; ?>" />
                <span class="reg_err" id="std_reg_adres_err">
                    <?php echo isset($stderraddress) ? $stderraddress : '' ?>
                </span>
            </div>
            <div>
                <label for="ppimage">Image : </label>
                <input type="file" name="ppimage" id="ppimage" class="stdregister"
                    value="<?php echo (isset($_FILES['ppimage'])) ? $_FILES['ppimage'] : '' ?>" />
                <span class="reg_err" id="std_reg_img_err">
                    <?php echo isset($std_img_err) ? $std_img_err : '' ?>
                </span>
            </div>
            <div>
                <label class="stdreglbl" id="idstdgenderlbl" for="std_gen">Student gender:</label>
                <div class="outstdgender" id="std_gen">
                    Male<input type="radio" class="stdgender" id="idstdmale" name="gender" value="Male" value="<?php echo $student_data['Gender']; ?>/>
                    Female<input type=" radio" class="stdgender" id="idstdfemale" name="gender" value="Female" value="<?php echo $student_data['Gender']; ?>/>
                    Others<input type=" radio" class="stdgender" id="idstdothers" name="gender" value="others" value="<?php echo $student_data['Gender']; ?>/>
                    <span class=" reg_err" id="std_reg_gen_err">
                    <?php echo isset($stderrgender) ? $stderrgender : '' ?></span>
                </div>
            </div>
            <div>
                <button class="stdregclick" name="std_reg_cancel" id="idstdregcancel" onclick="stdregcancel()"
                    class="stdregclick">cancel</button>

                <button class="stdregclick" name="std_regclk" id="idstdregsubmit"
                    onclick="stdregsubmit()">Update</button>
            </div>
        </form>
    </div>
    <script src="register_script.js"></script>
    <script>
        document.getElementById('pwd_show').style.display = 'none';//for enter pwd
        document.getElementById('cpwd_show').style.display = 'none';// for cnfirm pwd

        //enter pwd
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

        //confirm pwd
        function cpwdshow() {
            document.getElementById('cpwd_hide').style.display = 'inline';
            document.getElementById('cpwd_show').style.display = 'none';
            document.getElementById('cpassword').type = 'password';

        }
        function cpwdhide() {
            document.getElementById('cpwd_show').style.display = 'inline';
            document.getElementById('cpwd_hide').style.display = 'none';
            document.getElementById('cpassword').type = 'text';
        }
        document.getElementById('password').addEventListener('contextmenu', function (event) {
            event.preventDefault();

        });
        document.getElementById('cpassword').addEventListener('contextmenu', function (event) {
            event.preventDefault();

        });
    </script>
</body>

</html>