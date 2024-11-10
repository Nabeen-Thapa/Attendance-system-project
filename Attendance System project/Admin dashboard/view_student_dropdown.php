<?php
try {
    include '../database and tables/create_database.php';   
    $sem_DBselect = "SELECT * from semester_table ";
    $result_sem = mysqli_query($connect, $sem_DBselect);
    $semesters = [];
    if (mysqli_num_rows($result_sem) > 0) {
        while ($sem = mysqli_fetch_assoc($result_sem)) {
            array_push($semesters, $sem);
        }
    }
    $year_DBselect = "SELECT * from year_table ";
    $result_year = mysqli_query($connect, $year_DBselect);
    $years = [];
    if (mysqli_num_rows($result_year) > 0) {
        while ($year = mysqli_fetch_assoc($result_year)) {
            array_push($years, $year);
        }
    }
    $course_DBselect = "SELECT DISTINCT * from course_table";
    $result_course = mysqli_query($connect, $course_DBselect);
    $courses = [];
    if (mysqli_num_rows($result_course) > 0) {
        while ($course = mysqli_fetch_assoc($result_course)) {
            array_push($courses, $course);
        }
    }
    $course_type_DBselect = "SELECT DISTINCT * from subjects_table ";
    $result_course_type = mysqli_query($connect, $course_type_DBselect);
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
<head>
    <link rel="stylesheet" href="admin_view_css.css" />
</head>

<body>
    <div class="student_dropdown">
        <form action="" class="dropdown_lists">
            <select name="course" id="course" class="DDselect">
                <option value="">Course</option>
                <?php foreach ($courses as $course) { ?>
                    <option value="<?php echo $course['id'] ?>">
                        <?php echo $course['Name'] ?>
                    </option>
                <?php } ?>
            </select>
            
            <select name="year" id="year" class="DDselect">
                <option value="">Year</option>
                <?php foreach ($years as $year) { ?>
                    <option value="<?php echo $year['id'] ?>">
                        <?php echo $year['Name'] ?>
                    </option>
                <?php } ?>
            </select>
           
            <select name="semester" id="semester" class="DDselect">
                <option value="">Semester</option>
            </select>

            <select name="subject" id="subject" class="DDselect">
                <option value="">Subject</option>
            </select>
            <select name="month" id="month">
                <option value=" ">months</option>
                <option value="01">January</option>
                <option value="02">february</option>
                <option value="03">march</option>
                <option value="04">april</option>
                <option value="05">may</option>
                <option value="06">june</option>
                <option value="07">july</option>
                <option value="08">august</option>
                <option value="09">september</option>
                <option value="10">octomber</option>
                <option value="11">november</option>
                <option value="12">december</option>

            </select>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#year').change(function () {
                var year = $(this).val();
                // AJAX call to load semesters based on selected year
                $.ajax('load_semester.php', {
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
                var course = $('#course').val();
                $.ajax('load_subject.php', {
                    data: { 'semester': sem, 'course': course },
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

<!-- <select name="course_type" id="course_type" class="DDselect">
                <option value="">course type</option>
                <?php foreach ($course_types as $course_type) { ?>
                    <option value="<?php echo $course_type['id'] ?>">
                        <?php echo $course_type['Course_type'] ?>
                    </option>

                <?php } ?>
            </select> -->