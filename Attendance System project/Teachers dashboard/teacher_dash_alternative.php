<!-- 
    include '../registration form/student_register_validate.php';
    include '../database and tables/create_database.php';
    //include '../database and tables/Alter_student_DBtable.php'; 
    include '../database and tables/Student_table.php';
    
    -->
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teaches dash</title>
    <link rel="stylesheet" href="teacher_dashcss.css">
    <link rel="stylesheet" href="../title bar/title_bar_css.css">
    <link rel="stylesheet" href="../title bar/menu_barcss.css">
    <link rel="stylesheet" href="../Display Tables/student_attendance_tblcss.css">
    <link rel="stylesheet" href="../registration form/registration_css.css">
    <link rel="stylesheet" href="../registration form/add_subjectcss.css">
    <link rel="stylesheet" href="teacher_dashboard_displayscss.css">
    <link rel="stylesheet" href="teacher_dashcss.css">
    <link rel="stylesheet" href="../student attendance record tables/student_edit_tablecss.css">
</head>

<body>
    <div class="teacher_dash_dislpay">
    <?php
    echo "<div  id='title_bar_display'>";
    include ("../title bar/title_bar.php"); //title bar
    include ("../registration form/student_register_validate.php");
    echo "</div>";
    echo "<div  id='menu_display'>";
    include ("../title bar/menu_bar.php"); //menu or task bar
    echo "</div>";

    echo "<div class='teacher_dash_display dash_fix' id='Tdash_display'>";
    include ("teacher_dash.php");//attendance record sheet
    echo "</div>";

    echo "<div class='teacher_dash_display' id='Afile_display'>";
    //attendance sheet to make student present or absent
    include ("../Display Tables/student_attendance_table.php");
    echo "</div>";

    echo "<div class='teacher_dash_display' id='Arecord_display'>";
    include ("../student attendance record tables/std_record_tbl.php");//attendance record sheet
    echo "</div>";
    echo "<div class='teacher_dash_display' id='Aadd_display'>";
    include ("../registration form/student_register.php");//student add from teachar dashborad
    echo "</div>";
    echo "<div class='teacher_dash_display' id='Aedit_display'>";
    include ("../student attendance record tables/student_edit_table.php");//student add from teachar dashborad
    
    echo "</div>";

    echo "<div class='teacher_dash_display' id='Aadd_display'>";
    include ("../registration form/add_subject.php");//student add from teachar dashborad
    echo "</div>";

    ?>
    </div>
    <!-- <script src="teacher_dashboard_displaysjs.js"></script> -->
    <script src="../registration form/register_script.js"></script>
    <script src="../registration form/add_subjectjs.js"></script>
    <script src="../title bar/menu_berjs.js"></script>

</body>

</html>