<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index page</title>
    <link rel="stylesheet" type="text/css" href="index_css.css" />
</head>

<body class="index_body">
    <!--index form login and regsiter buttons-->

    <center>
        <form id="idchoosetype">
            <div id="idwelcome">Welcome!!</div>
            <h1>Student Attendance System</h1>
            <div id="idloginborder">
                <label class="loginfirst">Want to enter, login</label>
                <a href="../Admin dashboard/Admin_login.php" class="loginopen" id="idlogin-choose">Admin</a>
                <a href="../Teachers dashboard/teacher_login.php" class="loginopen" id="idlogin-choose">Teacher</a>
                <a href="../Student_Dashboard/student_login.php"
                    class="loginopen" id="idlogin-choose">student</a>
            </div>
            <div id="idregborder">
                <h2>Student registration form </h2><br>
                <div>
                    <label class="noreg">Want to login, Register first,</label>
                    <a href="../registration form/Student_register.php" class="index_reg_open"
                        id="idreg-choose">register</a>
                </div>
            </div>
        </form>
    </center>
    <!-- <script src="index_script.js"></script> -->
</body>

</html>