<?php
session_start();
if(!isset($_SESSION['teacher_email'])){
    header('location:https://localhost/Attendance%20System%20project/Teachers%20dashboard/teacher_login.php');
}
if(!isset($_SESSION['admin_email'])){
    header('location:https://localhost/Attendance%20System%20project/Admin%20dashboard/Admin_login.php');
}
try {
    $connection = mysqli_connect('localhost', 'root', '', 'Attendance_system');

    $sem_DBselect = "SELECT * from semester_table ";
    $result_sem = mysqli_query($connection, $sem_DBselect);
    $semesters = [];
    if (mysqli_num_rows($result_sem) > 0) {
        while ($sem = mysqli_fetch_assoc($result_sem)) {
            array_push($semesters, $sem);
        }
    }
    $year_DBselect = "SELECT * from year_table ";
    $result_year = mysqli_query($connection, $year_DBselect);
    $years = [];
    if (mysqli_num_rows($result_year) > 0) {
        while ($year = mysqli_fetch_assoc($result_year)) {
            array_push($years, $year);
        }
    }
    $course_DBselect = "SELECT DISTINCT * from course_table";
    $result_course = mysqli_query($connection, $course_DBselect);
    $courses = [];
    if (mysqli_num_rows($result_course) > 0) {
        while ($course = mysqli_fetch_assoc($result_course)) {
            array_push($courses, $course);
        }
    }
    $course_type_DBselect = "SELECT DISTINCT * from subjects_table ";
    $result_course_type = mysqli_query($connection, $course_type_DBselect);
    $course_types = [];
    if (mysqli_num_rows($result_course_type) > 0) {
        while ($course_type = mysqli_fetch_assoc($result_course_type)) {
            array_push($course_types, $course_type);
        }
    }
} catch (Exception $ex) {
    die ('Database Error: ' . $ex->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="title_bar_css.css" />
</head>

<body>
    <div id="dash_topbar">
        <div class="Alogo"><img src="../logo/system logo.png" alt="" class="alogo_pic"></div>
        <form action="" class="dropdown_lists">
            <select name="course_type" id="course_type" class="DDselect">
                <option value="">course type</option>
                <?php foreach ($course_types as $course_type) { ?>
                    <option value="<?php echo $course_type['id'] ?>">
                        <?php echo $course_type['Course_type'] ?>
                    </option>

                <?php } ?>
            </select>
            <select name="course" id="course" class="DDselect">
                <option value="">Course</option>
                <?php foreach ($courses as $course) { ?>
                    <option value="<?php echo $course['id'] ?>">
                        <?php echo $course['Name'] ?>
                    </option>

                <?php } ?>
            </select>
            <!-- <label for="">year</label> -->
            <select name="year" id="year" class="DDselect">
                <option value="">Year</option>
                <?php foreach ($years as $year) { ?>
                    <option value="<?php echo $year['id'] ?>">
                        <?php echo $year['Name'] ?>
                    </option>

                <?php } ?>
            </select>
            <!-- <label for="">Semester</label> -->
            <select name="semester" id="semester" class="DDselect">
            <option value="">Semester</option>
            </select>
            </select>
            <!-- <label for="">Subject</label> -->
            <select name="subject" id="subject" class="DDselect">
                <option value="">Subject</option>
            </select>
        </form>
        <?php
        //checking for admin/teacher login
        if(isset($_SESSION['teacher_email'])){
            echo '
        <a href="https://localhost/Attendance%20System%20project/title%20bar/teacher_logout.php"
            class="logout_btn">T logout</a>'; 
    }else if(isset($_SESSION['admin_email'])){
        echo '
        <a href="https://localhost/Attendance%20System%20project/title%20bar/admin_logout.php"
            class="logout_btn">A logout</a>';
    }
            ?>
        <!--teachers pfofile part-->
        <div id="idteacher_profile_part">
            <div id="idteacher_pic_part">
           
                <img src="../images/teacher profile.png" alt="" class="teacherPP">
                <div id="idprofile_text">
                    <?php if(isset($_SESSION['teacher_email'])) {echo $_SESSION['teacher_username'];
                    }
                    else if(isset($_SESSION['admin_email'])){echo $_SESSION['admin_username'];
                    } ?></div>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#year').change(function () {
                var year = $(this).val();
                // ajax call
                $.ajax('../title bar/load_semester.php', {
                    data: { 'year': year },
                    dataType: 'text',
                    method: 'post',
                    success: function (response) {
                        $('#semester').html(response);
                    }
                });
            });
            $('#semester').change(function () {
                var sem = $(this).val();
                // ajax call
                $.ajax('../title bar/load_subject.php', {
                    data: { 'semester': sem },
                    dataType: 'text',
                    method: 'post',
                    success: function (response) {
                        $('#subject').html(response);
                    }
                });
            });   
        });
    </script>
</body>

</html>
<!-- <img src="../Admin dashboard/teacher_images/<?php if(isset($_SESSION['teacher_email'])) {
                echo $_SESSION['image'] ;
            }
            else if(isset($_SESSION['admin_email'])){
                echo ' ';
            } ?>" class="studentPP"> -->