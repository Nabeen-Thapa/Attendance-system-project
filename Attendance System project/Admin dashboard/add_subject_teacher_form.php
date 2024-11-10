<?php  
include ("admin_title_bar.php");
include ("admin_side_bar.php");
?>
<?php
include ('../database and tables/create_database.php');
try {
    $course_select = "SELECT * from course_table ";
    $result_course = mysqli_query($connect, $course_select);
    $assign_courses = [];
    if (mysqli_num_rows($result_course) > 0) {
        while ($assign_course = mysqli_fetch_assoc($result_course)) {
            array_push($assign_courses, $assign_course);
    }

    $batch_select = "SELECT * from batch_table ";
    $result_batch = mysqli_query($connect, $batch_select);
    $assign_batchs = [];
    if (mysqli_num_rows($result_batch) > 0) {
        while ($assign_batch = mysqli_fetch_assoc($result_batch)) {
            array_push($assign_batchs, $assign_batch);
        }
    }

    $semester_select = "SELECT * from semester_table ";
    $result_semester = mysqli_query($connect, $semester_select);
    $assign_sems = [];
    if (mysqli_num_rows($result_semester) > 0) {
        while ($assign_sem = mysqli_fetch_assoc($result_semester)) {
            array_push($assign_sems, $assign_sem);
        }
    }

    $teacher_select = "SELECT * from teacher_details ";
    $result_teacher = mysqli_query($connect, $teacher_select);
    $teachers = [];
    if (mysqli_num_rows($result_teacher) > 0) {
        while ($teacher = mysqli_fetch_assoc($result_teacher)) {
            array_push($teachers, $teacher);
        }
    }

    $subject_select = "SELECT * from subjects_table ";
    $result_subject = mysqli_query($connect, $subject_select);
    $subjects = [];
    if (mysqli_num_rows($result_subject) > 0) {
        while ($subject = mysqli_fetch_assoc($result_subject)) {
            array_push($subjects, $subject);
        }
    }

    
    }
} catch (Exception $exts) {
    die("teacher and subjest relation error:" . $exts->getMessage());
}


$teacher_subject_err = 0;

    try {
        if (isset($_POST['teacher_subject_btn'])) {
        //course choose check
        if (isset($_POST['assign_course']) && !empty($_POST['assign_course'])) {
            $assign_course = $_POST['assign_course'];
        } else {
            $assign_course_err = "choose course";
            $teacher_subject_err++;
        }

        //course choose check
        if (isset($_POST['assign_batch']) && !empty($_POST['assign_batch'])) {
            $assign_batch = $_POST['assign_batch'];
        } else {
            $assign_batch_err = "choose the batch";
            $teacher_subject_err++;
        }

        //course choose check
        if (isset($_POST['assign_sem']) && !empty($_POST['assign_sem'])) {
            $assign_sem = $_POST['assign_sem'];
        } else {
            $assign_sem_err = "choose the semester";
            $teacher_subject_err++;
        }

        if (isset($_POST['teacher']) && !empty($_POST['teacher'])) {
            $teacher = $_POST['teacher'];
        } else {
            $teacher_subject_err++;
            $teacher_err = "choose the teaher";
        }

        if (isset($_POST['subject']) && !empty($_POST['subject'])) {
            $subject = $_POST['subject'];
        } else {
            $teacher_subject_err++;
            $subject_err = "choose the subject";
        }

        if (isset($_POST['subject_start_date']) && !empty($_POST['subject_start_date'])) {
            $subject_start_date = $_POST['subject_start_date'];
        } else {
            $subject_start_date_err = "choose the subject class atart date";
            $teacher_subject_err++;
        }

        if (isset($_POST['subject_end_date']) && !empty($_POST['subject_end_date'])) {
            $subject_end_date = $_POST['subject_end_date'];
        } else {
            $subject_end_date_err = "choose the subject class end date";
            $teacher_subject_err++;
        }
        if($teacher_subject_err == 0){
            include ('../database and tables/create_database.php');
            include ('../database and tables/Teacher_subject.php');
        }
    }
    } catch (Exception $exst) {
        die("teacher and subjest validation error:" . $exst->getMessage());
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacher subject form</title>
    <link rel="stylesheet" href="admin_forms_css.css">
</head>

<body>

    <form action="" method="post">
        <div class="add_teacher_subject_form">
            <h2>assign subjects</h2>
        <div>
                <label for="assign_course">Choose assign_courses:</label>
                <select name="assign_course" id="assign_course" class="assign_course">
                    <option value="">assign courses</option>
                    <?php foreach ($assign_courses as $assign_course) { ?>
                        <option value="<?php echo $assign_course['id'] ?>"<?php echo (isset($_POST['assign_course']) && $_POST['assign_course'] == $assign_course['id']) ? 'selected' : ''; ?>>
                            <?php echo $assign_course['Name'] ?>
                        </option>
                    <?php } ?>
                </select>
                <span><?php echo isset($assign_course_err) ? $assign_course_err : ''; ?></span>
            </div>
            <div>
                <label for="assign_batch">Choose assign_batchs:</label>
                <select name="assign_batch" id="assign_batch" class="assign_batch">
                    <option value="">assign batchs</option>
                    <?php foreach ($assign_batchs as $assign_batch) { ?>
                        <option value="<?php echo $assign_batch['id'] ?>"<?php echo (isset($_POST['assign_batch']) && $_POST['assign_batch'] == $assign_batch['id']) ? 'selected' : ''; ?>>
                            <?php echo $assign_batch['Title'] ?>
                        </option>
                    <?php } ?>
                </select>
                <span><?php echo isset($assign_batch_err) ? $assign_batch_err : ''; ?></span>
            </div>
            <div>
                <label for="assign_sem">Choose assign_sems:</label>
                <select name="assign_sem" id="assign_sem" class="assign_sem">
                    <option value="">assign semester</option>
                    <?php foreach ($assign_sems as $assign_sem) { ?>
                        <option value="<?php echo $assign_sem['id'] ?>"<?php echo (isset($_POST['assign_sem']) && $_POST['assign_sem'] == $assign_sem['id']) ? 'selected' : ''; ?>>
                            <?php echo $assign_sem['Name'] ?>
                        </option>
                    <?php } ?>
                </select>
                <span><?php echo isset($assign_sem_err) ? $assign_sem_err : ''; ?></span>
            </div>
            <div>
                <label for="teacher">Choose teachers:</label>
                <select name="teacher" id="teacher" class="teacher">
                    <option value="">teachers</option>
                    <?php foreach ($teachers as $teacher) { ?>
                        <option value="<?php echo $teacher['id'] ?>"<?php echo (isset($_POST['teacher']) && $_POST['teacher'] == $teacher['id']) ? 'selected' : ''; ?>>
                            <?php echo $teacher['Name'] ?>
                        </option>
                    <?php } ?>
                </select>
                <span><?php echo isset($teacher_err) ? $teacher_err : ''; ?></span>
            </div>
            <div>
                <label for="subject">Choose your subject:</label>
                <select name="subject" id="subject" class="subject">
                    <option value="">subjects</option>
                    <?php foreach ($subjects as $subject) { ?>
                        <option value="<?php echo $subject['id'] ?>"<?php echo (isset($_POST['subject']) && $_POST['subject'] == $subject['id']) ? 'selected' : ''; ?>>
                            <?php echo $subject['Title'] ?>
                        </option>
                    <?php } ?>
                </select>
                <span><?php echo isset($subject_err) ? $subject_err : ''; ?></span>
            </div>
            <div>
                <label for="subject_start_date">enter subject class start date:</label>
                <input type="date" id="subject_start_date" name="subject_start_date"
                    value="<?php echo $subject_start_date; ?>">
                <span><?php echo isset($subject_start_date_err) ? $subject_start_date_err : '' ;?></span>
            </div>
            <div>
                <label for="subject_end_date">enter subject class end date:</label>
                <input type="date" id="subject_end_date" name="subject_end_date"
                    value="<?php echo $subject_end_date; ?>">
                <span><?php echo isset($subject_end_date_err) ? $subject_end_date_err : ''; ?></span>
            </div>
            <button class="teacher_subject_btn" name="teacher_subject_btn">assign</button>
        </div>
    </form>

</body>

</html>