<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin reg</title>
    <link rel="stylesheet" href="registration_css.css" />
</head>
<body>
<div>
        <form id="id_admin_register">
            <span class="adminregclose" onclick="hideadminreg()">&times;</span>
            <h1>Admin regestration panel</h1>
            <div>
                <div>
                    <label class="adminreglbl" id="idadminreglbl">Name:</label>
                    <input type="text" class="adminreg" id="idadminreg" placeholder="enter your full name"/>
                    <span class="reg_err" id="admin_reg_name_err"></span>
                </div>
                <div>
                    <label class="adminreglbl" id="adminemaillbl">E-mail:</label>
                    <input type="email" class="adminreg" id="idadminregemail" placeholder="enter your email" />
                    <span class="reg_err" id="admin_reg_email_err"></span>
                </div>
                <div>
                    <label class="adminreglbl" id="adminregphone">Contact No.:</label>
                    <input type="number" class="adminreg" id="idadminregphone" placeholder="enter your phone number" />
                    <span class="reg_err" id="admin_reg_phone_err"></span>
                </div>
                <div>
                    <label class="adminreglbl" id="adminuname">create username:</label>
                        <input type="text" class="adminreg" id="idadminregUname"
                        placeholder="set a username yourself for login" />
                        <span class="reg_err" id="admin_reg_setUname_err"></span>
                </div>
                <div>
                    <label class="adminreglbl" id="adminregpwd">Create Password:</label>
                    <input type="password" class="adminreg" id="idadminregpwd" placeholder="set a passwrod for login" />
                    <span class="reg_err" id="admin_reg_setpwd_err"></span>
                </div>
                <div>
                    <label class="adminreglbl" id="adminregpwdconform">conform password:</label>
                    <input type="password" class="adminreg" id="idadminregpwdconform"
                        placeholder="conform your password" />
                        <span class="reg_err" id="admin_reg_matchpwd_err"></span>
                </div>
                <div>
                    <button class="adminregclick" id="idadminregcancel" onclick="adminregcancel()">cancel</button>
                    <button class="adminregclick" id="idadminregsubmit" onclick="adminregsubmit()">submit</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>