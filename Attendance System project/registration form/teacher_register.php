<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher registration form</title>
    <link rel="stylesheet" href="registration_css.css" />
</head>
<body>
     <!--teacher registration-->
     <div>
        <form id="id_teacher_register">
            <span class="teacherregclose" onclick="hideteacherreg()">&times;</span>
            <h1>Teachers registration panel</h1>
            <div>
                <label class="teacherreglbl" id="teacherregname">Name:</label>
                <input type="text" class="teacherregister" id="idteacherregname" placeholder="enter name" />
                <span class="reg_err" id="teacher_reg_name_err"></span>
            </div>
            <div>
                <label class="teacherreglbl" id="teacherregemail">E-mail:</label>
                <input type="email" class="teacherregister" id="idteacherregemail" placeholder="enter email" />
                <span class="reg_err" id="teacher_reg_email_err"></span>
            </div>
            <div>
                <label class="teacherreglbl" id="teacherregcontact">contact:</label>
                <input type="number" class="teacherregister" id="idteacherregcontact" placeholder="Enter contacts number" />
                <span class="reg_err" id="teacher_reg_phone_err"></span>
            </div>
            <div>
                <label class="teacherreglbl" id="teacherregadrs">Address:</label>
                <input type="text" class="teacherregister" id="idteacherregadrs" placeholder="Enter temporary" />
                <span class="reg_err" id="teacher_reg_adrs_err"></span>
            </div>
            <div>
                <label class="teacherreglbl" id="teacherreglicence">license No.</label>
                <input type="number" class="teacherregister" id="idteacherreglicence" placeholder="enter teaching licence number" />
                <span class="reg_err" id="teacher_reg_licence_err"></span>
            </div>

            <div>
                <label class="teacherreglbl" id="idteachergenderlbl">Gender:</label>
                <div class="outteachergender">
                    Male<input type="radio" class="teachergender" id="idteachermale" name="gender" />
                    Female<input type="radio" class="teachergender" id="idteacherfemale" name="gender" />
                    Others<input type="radio" class="teachergender" id="idteacherothers" name="gender" />
                    <span class="reg_err" id="teacher_reg_gen_err"></span>
                </div>
            </div>
            <div>
                <div>
                    <label class="teacherreglbl" id="teacheruname">create username:</label>
                    <input type="text" class="teacherregister" id="idteacherregUname" placeholder="set a username yourself for login"/>
                    <span class="reg_err" id="teacher_reg_Uname_err"></span>
                </div>
                <div>
                    <label class="teacherreglbl" id="teacherregpwd">Create Password:</label>
                    <input type="password" class="teacherregister" id="idteacherregpwd" placeholder="set a passwrod for login" />
                    <span class="reg_err" id="teacher_reg_upwd_err"></span>
                </div>
                <div>
                    <label class="teacherreglbl" id="adteacherregpwdconform">conform password:</label>
                    <input type="password" class="teacherregister" id="idteacherregpwdconform"
                        placeholder="conform your password" />
                        <span class="reg_err" id="teacher_reg_matchpwd_err"></span>
                </div>
            </div>
            <div>
                <button class="teacherregclick" id="idteacherregcancel" onclick="teacherregcancel()">cancel</button>
                <button class="teacherregclick" id="idteacherregsubmit" onclick="teacherregsubmit()">Submit</button>
            </div>
        </form>
    </div>
    <script src="register_script.js"></script>
</body>
</html>