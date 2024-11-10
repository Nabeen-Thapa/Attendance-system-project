<?php
include '../database and tables/create_database.php';
try {
    $id = $_GET['id'];
    $select_update = "SELECT Student_table.*, batch_table.Title as batch_name, course_table.Name as course_name , Year_table.Name As year_name, Semester_table.Name as semester_name
FROM Student_table 
INNER JOIN batch_table ON Student_table.batch_id = batch_table.id
INNER JOIN course_table ON Student_table.std_course = course_table.id
INNER JOIN Year_table ON Student_table.year = Year_table.id
INNER JOIN semester_table ON Student_table.semester = semester_table.id
WHERE student_table.id = '$id'";
    $result_update = mysqli_query($connect, $select_update);

    if (mysqli_num_rows($result_update) > 0) {
        $student_data = mysqli_fetch_assoc($result_update);
    } else {
        echo " ";
    }
} catch (Exception $exs) {
    die("studdent load error: " . $exs->getMessage());
}
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
$stdname = $Semail = $Sphone = $Ssection = $Saddress = $courseType = $Scourse = $Syear = $Ssem = $gender = $cpassword = $pwd = '';

//student name
$status = '1';
if (isset($_POST['student_update_btn'])) {
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
    
    // Check if the checkboxes are checked

    if (isset($_POST["courseType"])) {
        $courseType = $_POST["courseType"];
    } else {
        $error++;
        $stderrCtype = "Choose your course type";
    }
    //setudent select course
    if (isset($_POST['course'])) {
    $Scourse = $_POST["course"];
    if ($Scourse === "") {
        $Serrcourse = "Please select an course";
    } else {
        $selectcourse = $_POST['course'];
    }
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
    if (isset($_POST['semester'])) {
        $Ssem = $_POST["semester"];
        if ($Ssem === "") {
            $Serrsem = "Please select an semester";
        } else {
            $selectsem = $_POST['semester'];
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
    // // for passowrd
    // if (isset($_POST['std_old_pwd']) && !empty($_POST['std_old_pwd']) && trim($_POST['std_old_pwd'])) {
    //     $pwd = trim($_POST['std_old_pwd']);
    //     if (strlen($pwd) > 8) {
    //         $std_old_pwd = trim($_POST['std_old_pwd']);
    //     } else {
    //         $error++;
    //         $stderrpwd = 'std_old_pwd must be 8 character';
    //     }
    // }
    // //for confirm password
    // if (isset($_POST['std_new_pwd']) && !empty($_POST['std_new_pwd']) && trim($_POST['std_new_pwd'])) {
    //     $cpwd = trim($_POST['std_new_pwd']);
    //     if (strlen($pwd) > 8) {
    //         $std_old_pwd = trim($_POST['std_old_pwd']);
    //     } else {
    //         $error++;
    //         $stderrcpwd = 'password not match';
    //     }
    // } 


    if ($error == 0) { 
        $update_query = " UPDATE  student_table SET  Name ='$stdname', Email ='$Semail', Phone ='$Sphone', DOB ='$Sdob', course_type ='$courseType', std_course ='$selectcourse', year ='$selectyear', semester ='$selectsem', section ='$Ssection', RegistrationNo ='$Sregister', RollNo ='$Sroll', address  ='$Saddress', Gender ='$gender',  WHERE id='$id'";
        if (mysqli_query($connect, $update_query)) {
            echo '<script>alert("record updated ");</script>';
            header("location:student_edit_table.php");
        } else {
            echo '<script>alert("check the error ");</script>';
            echo "Error updating record: " . mysqli_error($conect);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update form</title>
    <link rel="stylesheet" href="../Student_Dashboard/student_details_update_css.css" />
    <!-- <link rel="stylesheet" href="student_update_css_backup.css" /> -->
</head>

<body>
    <!--student registration-->
    <div class="wrapper">
        <form class="student_registration" action="<?php echo $_SERVER['PHP_SELF'] ?>"
            method="post" enctype="multipart/form-data">
            <a href="student_edit_table.php"
                class="std_regclose">&times;</a>
            <h2>Update detail panel</h2>
            <div>
                <label for="idstdinputname">Student name:</label>
                <input type="text" class="stdregister" id="idstdinputname" name="stdinputname"
                    placeholder="enter your full name" value="<?php echo $student_data['Name']; ?>" />
                <span class="reg_err" id="std_reg_name_err">
                    <?php echo isset($stderrName) ? $stderrName : '' ?>
                </span>
            </div>
            <div>
                <label for="stdemail">student email:</label>
                <input type="email" class="stdregister" id="stdemail" name="stdemail"
                    value="<?php echo $student_data['Email']; ?>" placeholder="enter your eamil" />
                <span class="reg_err" id="std_reg_email_err">
                    <?php echo isset($stderremail) ? $stderremail : '' ?>
                </span>
            </div>
            <div>
                <label for="stdphone"> Phone number:</label>
                <input type="text" class="stdregister" id="stdphone" name="stdphone"
                    placeholder="student contact number" value="<?php echo $student_data['Phone']; ?>" />
                <span>
                    <?php echo isset($stderrphone) ? $stderrphone : '' ?>
                </span>
            </div>
            <div>
                <label for="idstddob">Student DOB:</label>
                <input type="date" class="stdregister" id="idstddob" name="date"
                    placeholder="enter student's date of birth" value="<?php echo $student_data['DOB']; ?>" />
                <span><?php echo isset($stderrdate) ? $stderrdate : '' ?></span>
            </div>

            <div>
                <label>select course type</label>
                <div class="outstd_course_typer">
                    yearly<input type="radio" class="stdcourse_type" id="idstdyearly" name="courseType"
                        onclick="yearlycourse()" value="yearly" <?php if ($student_data['course_type'] == "yearly")
                            echo "checked"; ?> />
                    semester wise<input type="radio" class="stdcourse_type" id="idstdsem_wise" name="courseType"
                        onclick="semcourse()" value="semester-wise" <?php if ($student_data['course_type'] == "semester-wise")
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
                        <?php foreach ($courses_id as $course) { ?>
                            <option value="<?php echo $course['id']; ?>" <?php echo ($course['id'] == $student_data['std_course']) ? 'selected' : ''; ?>>
                                <?php echo $course['Name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span><?php echo isset($course_err) ? $course_err : ''; ?></span>
                </div>
                <div class="std_year" id="std_year">
                    <label for="idselectyear">Choose year:</label>
                    <select name="selectyear" id="idselectyear">
                        <option value="">years</option>
                        <?php foreach ($years_id as $year) { ?>
                            <option value="<?php echo $year['id']; ?>" <?php echo ($year['id'] == $student_data['year']) ? 'selected' : ''; ?>>
                                <?php echo $year['Name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span><?php echo isset($Serryear) ? $Serryear : ''; ?></span>
                </div>
                <div class="std_semester" id="std_semester">
                    <label for="semester">Choose semester:</label>
                    <select name="semester" id="semester" class="semester">
                        <option value="">semesters</option>
                        <?php foreach ($semesters_id as $semester) { ?>
                            <option value="<?php echo $semester['id']; ?>" <?php echo ($semester['id'] == $student_data['semester']) ? 'selected' : ''; ?>>
                                <?php echo $semester['Name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <span><?php echo isset($semester_err) ? $semester_err : ''; ?></span>
                </div>
                <div class="std_batch">
                    <label for="batch">Choose batch:</label>
                    <select name="batch" id="batch" class="batch">
                        <option value="">batchs</option>
                        <?php foreach ($batchs_id as $batch) { ?>
                            <option value="<?php echo $batch['id']; ?>" <?php echo ($batch['id'] == $student_data['Batch_id']) ? 'selected' : ''; ?>>
                                <?php echo $batch['Title']; ?>
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
                        value="<?php echo $student_data['section']; ?>" />
                    <span><?php echo isset($stderrsection) ? $stderrsection : '' ?></span>
                </div>

                <div class="std_regno">
                    <label for="idregno">Registration No.:</label>
                    <input type="number" class="stdregister" id="regno" name="regno"
                        placeholder="enter registration No." value="<?php echo $student_data['RegistrationNo']; ?>" />
                    <span><?php echo isset($stderrreg) ? $stderrreg : '' ?></span>
                </div>
                <div class="std_roll">
                    <label for="idrollno">Roll NO</label>
                    <input type="number" class="stdregister" id="idrollno" name="rollno"
                        placeholder="enter calss roll No." value="<?php echo $student_data['RollNo']; ?>" />
                    <span><?php echo isset($stderrroll) ? $stderrroll : '' ?></span>
                </div>
                <div class="std_address">
                    <label for="idstdadrs">Address:</label>
                    <input type="text" class="stdregister" id="idstdadrs" name="address"
                        placeholder="enter temporary address" value="<?php echo $student_data['address']; ?>" />
                    <span> <?php echo isset($stderraddress) ? $stderraddress : '' ?>
                    </span>
                </div>
            </div>

            <div>
                <label for="std_gen">Student gender:</label>
                <div>
                    Male<input type="radio" id="idstdmale" name="gender" value="Male" <?php if ($student_data['Gender'] == "Male")
                        echo "checked"; ?> />
                    Female<input type="radio" id="idstdfemale" name="gender" value="Female" <?php if ($student_data['Gender'] == "Female")
                        echo "checked"; ?> />
                    Others<input type="radio" id="idstdothers" name="gender" value="others" <?php if ($student_data['Gender'] == "others")
                        echo "checked"; ?> />
                    <span>
                        <?php echo isset($stderrgender) ? $stderrgender : '' ?>
                    </span>
                </div>
            </div>
            <!-- <div>
                <label for="std_old_pwd">old password:</label>
                <input type="text" id="std_old_pwd" name="std_old_pwd" placeholder="enter your old password" />
                <span ></span>
            </div>
            <div>
                <label for="std_new_pwd">new passwrod:</label>
                <input type="text" id="std_new_pwd" name="std_new_pwd" placeholder="snter your password" />
                <span></span>
            </div> -->
            <div>
                <button class="stdregclick" name="student_update_btn" id="idstdregsubmit"
                    onclick="stdregsubmit()">update</button>
            </div>

        </form>
    </div>


    <script>
        //student course type choose radio buttion
        function yearlycourse() {
            let yearly = document.getElementById("idstdyearly");
            if (yearly.checked) {
                document.getElementById("std_semester").style.display = 'none';
                document.getElementById("std_year").style.display = 'inline-block';

            }
        }
        function semcourse() {
            let sem = document.getElementById("idstdsem_wise");
            if (sem.checked) {
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
                    dataType: 'text',
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