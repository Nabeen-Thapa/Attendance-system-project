<?php
try {
    $connection = mysqli_connect('localhost', 'root', '', 'Attendance_system');
    $subject_select = " SELECT * from subjects_table";
    $std_result = mysqli_query($connection,$subject_select);
    
    $std_subjects = [];
    if (mysqli_num_rows($std_result) > 0) {
        while ($std_sub = mysqli_fetch_assoc($std_result)) {
            array_push($std_subjects, $std_sub);
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
            <!-- <label for="">course type</label> -->
            <select name="course_type" id="course_type" class="DDselect">
                <option value="">subjects</option>
                <?php foreach ($std_subjects as $std_subject) { ?>
                    <option value="<?php echo $std_subject['id'] ?>">
                        <?php echo $std_subject['Title'] ?>
                    </option>

                <?php } ?>
            </select>
        </form>
        <!--teachers pfofile part-->
        <div id="idteacher_profile_part">
            <div id="idteacher_pic_part">
                <img src="../images/teacher profile.png" alt="" class="teacherPP">
                <div id="idprofile_text">Teacher</div>
            </div>
        </div>

    </div>
    
</body>

</html>