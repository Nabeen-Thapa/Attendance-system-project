<!-- <?php
// displaying table for attendace (present/ absent talbe)
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
?>
<form action="" method="post">
    <div class="std_find">
        <div class="std_course">

            <!-- <label for="course">Choose your course:</label> -->
            <select name="course" id="course" class="course">
                <option value="">courses</option>
                <?php foreach ($courses_id as $course_id) { ?>
                    <option value="<?php echo $course_id['id']; ?>" <?php echo (isset($_POST['course']) && $_POST['course'] == $course_id['id']) ? 'selected' : ''; ?>>
                        <?php echo $course_id['Name'] ?>
                    </option>
                <?php } ?>
            </select>

        </div>
        <div class="std_batch">
            <label for="batch">Choose your batch:</label>
            <select name="batch" id="batch" class="batch">
                <option value="">batchs</option>
                <?php foreach ($batchs_id as $batch_id) { ?>
                    <option value="<?php echo $batch_id['id'] ?>" <?php echo (isset($_POST['batch']) && $_POST['batch'] == $batch_id['id']) ? 'selected' : ''; ?>>
                        <?php echo $batch_id['Title'] ?>
                    </option>
                <?php } ?>
            </select>
            <span class="reg_err" id="std_reg_sec_err"><?php echo isset($batch_err) ? $batch_err : ''; ?></span>
        </div>
        <div class="std_semester">

            <!-- <label for="semester">Choose your semester:</label> -->
            <select name="semester" id="semester" class="semester">
                <option value="">semesters</option>
                <?php foreach ($semesters_id as $semester_id) { ?>
                    <option value="<?php echo $semester_id['id']; ?>" <?php echo (isset($_POST['semester']) && $_POST['semester'] == $semester_id['id']) ? 'selected' : ''; ?>>
                        <?php echo $semester_id['Name'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
</form> -->