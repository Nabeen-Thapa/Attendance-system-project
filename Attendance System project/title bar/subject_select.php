<?php
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
    $course_DBselect = "SELECT * from course_table ";
    $result_course = mysqli_query($connection, $course_DBselect);
    $courses = [];
    if (mysqli_num_rows($result_course) > 0) {
        while ($course = mysqli_fetch_assoc($result_course)) {
            array_push($courses, $course);
        }
    }
    $course_type_DBselect = "SELECT DISTINCT * from Course_type ";
    $result_course_type = mysqli_query($connection, $course_type_DBselect);
    $course_types = [];
    if (mysqli_num_rows($result_course_type) > 0) {
        while ($course_type = mysqli_fetch_assoc($result_course_type)) {
            array_push($course_types, $course_type);
        }
    }
    $section_DBselect = "SELECT DISTINCT * from subjects_table";
    $result_section = mysqli_query($connection, $section_DBselect);
    $sections = [];
    if (mysqli_num_rows($result_section) > 0) {
        while ($section = mysqli_fetch_assoc($result_section)) {
            array_push($sections, $section);
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
    <title>Ajax For Dropdown</title>
</head>

<body>
    <h1>Dropdown Ajax</h1>
    <form action="">
    <!-- <label for="">course type</label> -->
        <select name="course_type" id="course_type">
            <option value="">course type</option>
            <?php foreach ($course_types as $course_type) { ?>
                <option value="<?php echo $course_type['id'] ?>">
                    <?php echo $course_type['Course_type'] ?>
                </option>

            <?php } ?>
        </select>
        <!-- <label for="">course</label> -->
        <select name="course" id="course">
            <option value="">Course</option>
            <?php foreach ($courses as $course) { ?>
                <option value="<?php echo $course['id'] ?>">
                    <?php echo $course['Name'] ?>
                </option>

            <?php } ?>
        </select>
        <!-- <label for="">year</label> -->
        <select name="year" id="year">
            <option value="">years</option>
            <?php foreach ($years as $year) { ?>
                <option value="<?php echo $year['id'] ?>">
                    <?php echo $year['Name'] ?>
                </option>

            <?php } ?>
        </select>
        <!-- <label for="">Semester</label> -->
        <select name="semester" id="semester">
            <option value="">Semesters</option>

        </select>
        </select>
        <!-- <label for="">Section</label> -->
        <!-- <select name="section" id="section">
            <option value="">Sections</option>

        </select> -->
        
        <!-- <label for="">Subject</label> -->
        <select name="subject" id="subject">
            <option value="">Select Subject</option>
        </select>
    </form>
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
                        $('#section').html(response);
                    }
                });
            });
            $('#section').change(function () {
                var section = $(this).val();
                // ajax call
                $.ajax('../title bar/load_section.php', {
                    data: { 'section': section },
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