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
    <div class="wrapper">
        <form id="id_std_register" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
            enctype="multipart/form-data">
            <a href="../index page/index_pge.php"
                class="std_regclose">&times;</a>
            <h2>Student update panel</h2>
            <div>
                <label class="stdreglbl" id="stdname" for="idstdinputname">Student name:</label>
                <input type="text" class="stdregister" id="idstdinputname" name="stdinputname"
                    placeholder="enter your full name" value="<?php echo $student_data['Name']; ?>" />
                <span class="reg_err" id="std_reg_name_err">
                    <?php echo isset($stderrName) ? $stderrName : '' ?>
                </span>
            </div>
            <div>
                <label class="stdreglbl" for="stdemail">student email:</label>
                <input type="email" class="stdregister" id="stdemail" name="stdemail" value="<?php echo $student_data['Email']; ?>"
                    placeholder="enter your eamil" />
                <span class="reg_err" id="std_reg_email_err">
                    <?php echo isset($stderremail) ? $stderremail : '' ?>
                </span>
            </div>
            <div>
                <label class="stdreglbl" for="stdphone"> Phone number:</label>
                <input type="text" class="stdregister" id="stdphone" name="stdphone"
                    placeholder="student contact number" value="<?php echo $student_data['Phone']; ?>" />
                <span class="reg_err" id="std_reg_phone_err">
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
                <label class="stdreglbl" id="idstd_course_type_lbl">select course type:</label>
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
                <div>
                    <label class="stdcourselbl" id="idstdcourseyear" for="idselectyear">choose course</label>
                    <label class="stdcourselbl" id="idstdyear" for="idselectyear">Select year</label>
                    <label class="stdcourselbl" id="idstdsem" for="idselectsem">select semester(if semester)</label>
                </div>
                <div>
                    <select id="idselectcourse" name="selectcourse">
                        <option value="">Select course</option>
                        <option value="BCA" <?php if ($student_data['std_course'] == "BCA")
                            echo "selected"; ?>>BCA</option>
                        <option value="BBA" <?php if ($student_data['std_course'] == "BBA")
                            echo "selected"; ?>>BBA</option>
                        <option value="BIT" <?php if ($student_data['std_course'] == "BIT")
                            echo "selected"; ?>>BIT</option>
                        <option value="BSCsIT" <?php if ($student_data['std_course'] == "BSCsIT")
                            echo "selected"; ?>>Bsc.CSIT</option>
                        <option value="BBS" <?php if ($student_data['std_course'] == "BBS")
                            echo "selected"; ?>>BBS</option>
                        <option value="BA" <?php if ($student_data['std_course'] == "BA")
                            echo "selected"; ?>>BA</option>
                    </select>

                    <select id="idselectyear" name="selectyear">
                        <option value=" ">select year</option>
                        <option value="first year" <?php if ($student_data['year'] == "first year")
                            echo "selected"; ?>>first year
                        </option>
                        <option value="second year" <?php if ($student_data['year'] == "second year")
                            echo "selected" ?>>second year
                            </option>
                            <option value="third year" <?php if ($student_data['year'] == "third year")
                            echo "selected" ?>>third year
                            </option>
                            <option value="fourth year" <?php if ($student_data['year'] == "fourth year")
                            echo "selected" ?>> fourth year
                            </option>
                        </select>
                        <select id="idselectsem" name="selectsem">
                            <option value=" " disabled selected>select semester</option>
                            <option value="First semester" <?php if ($student_data['semester'] == "First semester")
                            echo "selected" ?>>first
                                semester</option>
                            <option value="second semester" <?php if ($student_data['semester'] == "second semester")
                            echo "selected" ?>>second
                                semester</option>
                            <option value="third semester" <?php if ($student_data['semester'] == "third semester")
                            echo "selected" ?>>third
                                semester</option>
                            <option value="fourth semester" <?php if ($student_data['semester'] == "fourth semester")
                            echo "selected" ?>> fourth
                                semester</option>
                            <option value="fifth semester" <?php if ($student_data['semester'] == "fifth semester")
                            echo "selected" ?>>fifth
                                semester</option>
                            <option value="sixth semester" <?php if ($student_data['semester'] == "sixth semester")
                            echo "selected" ?>>sixth
                                semester </option>
                            <option value="seventh semester" <?php if ($student_data['semester'] == "seventh semester")
                            echo "selected" ?>>seventh
                                semester </option>
                            <option value="eighth semester" <?php if ($student_data['semester'] == "eighth semester")
                            echo "selected" ?>> eighth
                                semester</option>
                        </select>
                    </div>
                    <span class="reg_err" id="std_reg_course_err">
                    <?php echo isset($Serrcourse) ? $Serrcourse : ''; ?>
                </span>
                <span class="reg_err" id="std_reg_year_err">
                    <?php echo isset($Serryear) ? $Serryear : ''; ?>
                </span>
                <span class="reg_err" id="std_reg_sem_err">
                    <?php echo isset($Serrsem)?$Serrsem : ''; ?>
                </span>
            </div>
            <div class="std_sec_reg_rooll_lbl">
                <label class="stdreglbl" id="idsectionlbl" for="idsection">Section:</label>
                <label class="stdreglbl" id="idregnolbl" for="idregno">Registration No.:</label>
                <label class="stdreglbl" id="idrolllbl" for="idrollno">Roll No.:</label>
            </div>

            <div class="std_sec_roll_reg">
                <input type="text" class="stdregister" id="idsection" name="section" placeholder="enter section"
                    value="<?php echo $student_data['section']; ?>" />
                <input type="number" class="stdregister" id="regno" name="regno" placeholder="enter registration No."
                    value="<?php echo $student_data['RegistrationNo']; ?>" />
                <input type="number" class="stdregister" id="idrollno" name="rollno" placeholder="enter calss roll No."
                    value="<?php echo $student_data['RollNo']; ?>" />
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
                <label class="stdreglbl" id="idstdgenderlbl" for="std_gen">Student gender:</label>
                <div class="outstdgender" id="std_gen">
                    Male<input type="radio" class="stdgender" id="idstdmale" name="gender" value="Male" <?php if ($student_data['Gender'] == "Male")
                        echo "checked"; ?> />
                    Female<input type="radio" class="stdgender" id="idstdfemale" name="gender" value="Female" <?php if ($student_data['Gender'] == "Female")
                        echo "checked"; ?> />
                    Others<input type="radio" class="stdgender" id="idstdothers" name="gender" value="others" <?php if ( $student_data['Gender']== "others")
                        echo "checked"; ?> />
                    <span class="reg_err" id="std_reg_gen_err">
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
                <input type="file" name="ppimage" id="ppimage" class="stdregister"
                    value="<?php echo $student_data['image']; ?>"/>
                <span class="reg_err" id="std_reg_img_err">
                    <?php echo isset($std_img_err) ? $std_img_err : '' ?>
                </span>
            </div>
            <div>
                <button class="stdregclick" name="std_reg_cancel" id="idstdregcancel"
                    onclick="stdregcancel()">cancel</button>
                <button class="stdregclick" name="std_regclk" id="idstdregsubmit"
                    onclick="stdregsubmit()">update</button>
            </div>
        </form>
    </div>
    <script src="register_script.js"></script>
    <script src="../title bar/menu_berjs.js"></script>

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