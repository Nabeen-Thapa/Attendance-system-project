<?php

include ('../database and tables/create_database.php');
try {
    $batch_select = "SELECT * from batch_table ";
    $result_batch = mysqli_query($connect, $batch_select);
    $batchs_id = [];
    if (mysqli_num_rows($result_batch) > 0) {
        while ($batch_id = mysqli_fetch_assoc($result_batch)) {
            array_push($batchs_id, $batch_id);
        }
    }

    $course_select = "SELECT * from Course_table";
    $result_course = mysqli_query($connect, $course_select);
    $courses_id = [];
    if (mysqli_num_rows($result_course) > 0) {
        while ($course_id = mysqli_fetch_assoc($result_course)) {
            array_push($courses_id, $course_id);
        }
    }

    $year_select = "SELECT * from year_table";
    $result_year = mysqli_query($connect, $year_select);
    $years_id = [];
    if (mysqli_num_rows($result_year) > 0) {
        while ($year_id = mysqli_fetch_assoc($result_year)) {
            array_push($years_id, $year_id);
        }
    }

    $semester_select = "SELECT * from semester_table";
    $result_semester = mysqli_query($connect, $semester_select);
    $semesters_id = [];
    if (mysqli_num_rows($result_semester) > 0) {
        while ($semester_id = mysqli_fetch_assoc($result_semester)) {
            array_push($semesters_id, $semester_id);
        }
    }
} catch (Exception $exts) {
    die("student and subjest relation error:" . $exts->getMessage());
}


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
    <div class="wrapper">
        <form id="id_std_register" class="student_registraation" action="<?php echo $_SERVER['PHP_SELF'] ?>"
            method="post" enctype="multipart/form-data">
            <a href="http://localhost/Attendance%20System%20project/index%20page/index_pge.php"
                class="std_regclose">&times;</a>
            <h2>Student regestration panel</h2>
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
                <span>
                    <?php echo isset($stderrphone) ? $stderrphone : '' ?>
                </span>
            </div>
            <div>
                <label class="stdreglbl" id="iddob" for="idstddob">Student DOB:</label>
                <input type="date" class="stdregister" id="idstddob" name="date"
                    placeholder="enter student's date of birth" value="<?php echo $Sdob; ?>" />
                <span><?php echo isset($stderrdate) ? $stderrdate : '' ?></span>
            </div>

            <div>
                <label>select course type</label>
                <div class="outstd_course_typer">
                    yearly<input type="radio" class="stdcourse_type" id="idstdyearly" name="courseType"
                        onclick="yearlycourse()" value="yearly" <?php if ($courseType == "yearly")
                            echo "checked"; ?> />
                    semester wise<input type="radio" class="stdcourse_type" id="idstdsem_wise" name="courseType"
                        onclick="semcourse()" value="semester-wise" <?php if ($courseType == "semester-wise")
                            echo "checked"; ?> />
                    <span class="reg_err" id="std_reg_Ctype_err">
                        <?php echo isset($stderrCtype) ? $stderrCtype : '' ?>
                    </span>
                </div>
            </div>
            <div class="selectcourse">
                <div class="std_course">
                    <label for="course">Choose course:</label>
                    <select name="course" id="course" class="course">
                        <option value="">courses</option>
                        <?php foreach ($courses_id as $course_id) { ?>
                            <option value="<?php echo $course_id['id']; ?>" <?php echo (isset($_POST['course']) && $_POST['course'] == $course_id['id']) ? 'selected' : ''; ?>>
                                <?php echo $course_id['Name'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span><?php echo isset($course_err) ? $course_err : ''; ?></span>
                </div>
                <div class="std_year" id="std_year">
                    <label for="idselectyear">Choose year:</label>
                    <select name="selectyear" id="idselectyear">
                        <option value="">years</option>
                        <?php foreach ($years_id as $year_id) { ?>
                            <option value="<?php echo $year_id['id']; ?>" <?php echo (isset($_POST['selectyear']) && $_POST['selectyear'] == $year_id['id']) ? 'selected' : ''; ?>><?php echo $year_id['Name'] ?></option>
                        <?php } ?>
                    </select>
                        <span><?php echo isset($Serryear) ? $Serryear : ''; ?></span>
                </div>
                <div class="std_semester" id="std_semester">
                    <label for="semester">Choose semester:</label>
                    <select name="semester" id="semester" class="semester">
                        <option value="">semesters</option>
                        <?php foreach ($semesters_id as $semester_id) { ?>
                            <option value="<?php echo $semester_id['id']; ?>" <?php echo (isset($_POST['semester']) && $_POST['semester'] == $semester_id['id']) ? 'selected' : ''; ?>>
                                <?php echo $semester_id['Name'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span><?php echo isset($semester_err) ? $semester_err : ''; ?></span>
                </div>
                <div class="std_batch">
                    <label for="batch">Choose your batch:</label>
                    <select name="batch" id="batch" class="batch">
                        <option value="">batchs</option>
                        <?php foreach ($batchs_id as $batch_id) { ?>
                            <option value="<?php echo $batch_id['id'] ?>" <?php echo (isset($_POST['batch']) && $_POST['batch'] == $batch_id['id']) ? 'selected' : ''; ?>>
                                <?php echo $batch_id['Title'] ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span><?php echo isset($batch_err) ? $batch_err : ''; ?></span>
                </div>
            </div>
            <div class="std_sec_roll_reg">
                <div class="std_section">
                    <label for="idsection">Section:</label>
                    <input type="text" class="stdregister" id="idsection" name="section" placeholder="enter section"
                        value="<?php echo $Ssection; ?>" />
                    <span><?php echo isset($stderrsection) ? $stderrsection : '' ?></span>
                </div>

                <div class="std_regno">
                    <label for="idregno">Registration No.:</label>
                    <input type="number" class="stdregister" id="regno" name="regno"
                        placeholder="enter registration No." value="<?php echo $Sregister; ?>" />
                    <span><?php echo isset($stderrreg) ? $stderrreg : '' ?></span>
                </div>
                <div class="std_roll">
                    <label for="idrollno">Roll NO</label>
                    <input type="number" class="stdregister" id="idrollno" name="rollno"
                        placeholder="enter calss roll No." value="<?php echo $Sroll; ?>" />
                    <span><?php echo isset($stderrroll) ? $stderrroll : '' ?></span>
                </div>
                <div class="std_address">
                    <label for="idstdadrs">Address:</label>
                    <input type="text" class="stdregister" id="idstdadrs" name="address"
                        placeholder="enter temporary address" value="<?php echo $Saddress; ?>" />
                    <span> <?php echo isset($stderraddress) ? $stderraddress : '' ?>
                    </span>
                </div>
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
                    <span>
                        <?php echo isset($stderrgender) ? $stderrgender : '' ?>
                    </span>
                </div>
            </div>
            <!--<div>
                <label class="stdreglbl" id="idstdpwdlbl" for="idstdpwd">Create password:</label>
                <input type="password" class="stdregister" id="idstdpwd" name="stdpwd" placeholder="create your password for login" />
                <span class="reg_err" id="std_reg_setpwd_err"></span>
            </div>
            <div>
                <label class="stdreglbl" id="idstdconformpwdlbl" for="idstdconfirmpwd">confirm passwrod:</label><input type="password" class="stdregister" id="idstdconfirmpwd" name="idstdconfirmpwd" placeholder="confirm your password" />
                <span class="reg_err" id="std_reg_matchpwd_err"></span>
            </div>-->

            <!-- stndent image for frofile  -->
            <div>
                <label for="ppimage">Image : </label>
                <input type="file" name="ppimage" id="ppimage" class="stdregister" accept="<?php echo $filename; ?>" />
                <span><?php echo isset($std_img_err) ? $std_img_err : '' ?></span>
            </div>
            <div>
                <button class="stdregclick" name="std_reg_cancel" id="idstdregcancel"
                    onclick="stdregcancel()">cancel</button>
                <button class="stdregclick" name="std_regclk" id="idstdregsubmit"
                    onclick="stdregsubmit()">Submit</button>
            </div>
            <div class="reg_login">
                <label for="reg_log">alrady registered ? </label>
                <a href="https://localhost/Attendance%20System%20project/Student_Dashboard/student_login.php"
                    id="log_reg" name="login_reg">login</a>
            </div>
        </form>
    </div>


    <script>
        //student course type choose radio buttion
    function yearlycourse(){
      let yearly = document.getElementById("idstdyearly");
      if(yearly.checked){
         document.getElementById("std_semester").style.display = 'none';
        document.getElementById("std_year").style.display = 'inline-block';

      }
    }
    function semcourse(){
      let sem = document.getElementById("idstdsem_wise");
      if(sem.checked){
        document.getElementById("std_semester").style.display = 'inline-block';
        document.getElementById("std_year").style.display = 'inline-block';
      }
    }
    </script>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#stdphone').change(function () {
                var contact = $(this).val();
                // ajax call
                $.ajax('registered_phone.php', {
                    data: { 'stdphone': contact },
                    dataType: 'number',
                    method: 'post',
                    success: function (response) {
                        $('#std_reg_phone_err').html(response);
                    }
                });
            });
        });
        $(document).ready(function () {
            $('#stdemail').change(function () {
                var email = $(this).val();
                // ajax call
                $.ajax('registered_email.php', {
                    data: { 'stdemail': email },
                    dataType: 'text',
                    method: 'post',
                    success: function (response) {
                        $('#std_reg_email_err').html(response);
                    }
                });
            });
        });
        $(document).ready(function () {
            $('#regno').change(function () {
                var register = $(this).val();
                // ajax call
                $.ajax('registered_reg_no.php', {
                    data: { 'regno': register },
                    dataType: 'text',
                    method: 'post',
                    success: function (response) {
                        $('#std_reg_regno_err').html(response);
                    }
                });
            });
        });
    </script>
</body>

</html>