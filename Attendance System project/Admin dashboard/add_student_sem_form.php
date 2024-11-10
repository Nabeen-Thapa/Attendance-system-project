<?php  
include ("admin_title_bar.php");
include ("admin_side_bar.php");
?>
<?php
include ('../database and tables/create_database.php');
try {
    $student_select = "SELECT * from student_table ";
    $result_student = mysqli_query($connect, $student_select);
    $students_id = [];
    if (mysqli_num_rows($result_student) > 0) {
        while ($student_id = mysqli_fetch_assoc($result_student)) {
            array_push($students_id, $student_id);
        }
    }

    $semester_select = "SELECT * from semester_table ";
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


$student_semester_err = 0;

try {
    if (isset($_POST['student_semester_btn'])) {
        if (isset($_POST['student']) && !empty($_POST['student'])) {
            $student = $_POST['student'];
        } else {
            $student_semester_err++;
            $student_err = "choose the student";
        }

        if (isset($_POST['semester']) && !empty($_POST['semester'])) {
            $semester = $_POST['semester'];
        } else {
            $student_semester_err++;
            $semester_err = "choose the semester";
        }

        if (isset($_POST['enroll_date']) && !empty($_POST['enroll_date'])) {
            $enroll_date = $_POST['enroll_date'];
        } else {
            $enroll_date_err = "choose enroll date";
            $student_semester_err++;
        }


        if ($student_semester_err == 0) {
            include ('../database and tables/create_database.php');
            include ('../database and tables/Student_semester.php');

        }
    }
} catch (Exception $exst) {
    die("student and subjest validation error:" . $exst->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student semester form</title>
    <link rel="stylesheet" href="admin_forms_css.css">
</head>

<body>

    <form action="" method="post">
        <div class="add_student_semester_form">
            <div>
                <label for="student">Choose students:</label>
                <select name="student" id="student" class="student">
                    <option value="">students</option>
                    <?php foreach ($students_id as $student_id) { ?>
                        <option value="<?php echo $student_id['id'] ?>">
                            <?php echo $student_id['Name'] ?>
                        </option>
                    <?php } ?>
                </select>
                <span><?php echo isset($student_err) ? $student_err : ''; ?></span>
            </div>
            <div>
                <label for="semester">Choose your semester:</label>
                <select name="semester" id="semester" class="semester">
                    <option value="">semesters</option>
                    <?php foreach ($semesters_id as $semester_id) { ?>
                        <option value="<?php echo $semester_id['id'] ?>">
                            <?php echo $semester_id['Name'] ?>
                        </option>
                    <?php } ?>
                </select>
                <span><?php echo isset($semester_err) ? $semester_err : ''; ?></span>
            </div>
            <div>
                <label for="enroll_date">enroll date:</label>
                <input type="date" id="enroll_date" name="enroll_date" value="<?php echo $enroll_date; ?>">
                <span><?php echo isset($enroll_date_err) ? $enroll_date_err : ''; ?></span>
            </div>
            <button class="student_semester_btn" name="student_semester_btn">add</button>
        </div>
    </form>

</body>

</html>