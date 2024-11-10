<?php  
include ("admin_title_bar.php");
include ("admin_side_bar.php");
?>
<?php
try {
    include ('../database and tables/create_database.php');
    $course_select = "SELECT * from Course_table ";
    $result_course = mysqli_query($connect, $course_select);
    $courses = [];
    if (mysqli_num_rows($result_course) > 0) {
        while ($course = mysqli_fetch_assoc($result_course)) {
            array_push($courses, $course);
        }
    }

    $batch_select = "SELECT * from batch_table ";
    $result_batch = mysqli_query($connect, $batch_select);
    $batchs = [];
    if (mysqli_num_rows($result_batch) > 0) {
        while ($batch = mysqli_fetch_assoc($result_batch)) {
            array_push($batchs, $batch);
        }
    }

    $year_select = "SELECT * from Year_table ";
    $result_year = mysqli_query($connect, $year_select);
    $years = [];
    if (mysqli_num_rows($result_year) > 0) {
        while ($year = mysqli_fetch_assoc($result_year)) {
            array_push($years, $year);
        }
    }
} catch (Exception $exy) {
    die(' course id select error:' . $exy->getMessage());
}
?>
<?php
$semester_name = $semester_type = '';
$semester_name_err = '';
$semester_err = 0;
try {
    if (isset($_POST['semester_btn'])) {

        //semester name validation
        if (isset($_POST['semester_name']) && !empty($_POST['semester_name']) && trim($_POST['semester_name'])) {
            $semester_name = $_POST['semester_name'];
        } else {
            $semester_err++;
            $semester_name_err = "enter the semester name";
        }

        //semester rank valivate
        if (isset($_POST['semester_rank']) && !empty($_POST['semester_rank']) && trim($_POST['semester_rank'])) {
            $semester_rank = $_POST['semester_rank'];
        } else {
            $semester_err++;
            $semester_rank_err = "enter the semester rank";
        }
        //semester name validation
        if (isset($_POST['semester_course'])) {
            $semester_course = $_POST['semester_course'];
            if ($semester_course == " ") {
                $semester_err++;
                $semester_course_err = "choose the semester_course";
            } else {
                $semester_course = $_POST['semester_course'];
            }
        }
        //semester year validation
        if (isset($_POST['semester_year'])) {
            $semester_year = $_POST['semester_year'];
            if ($semester_year == " ") {
                $semester_err++;
                $semester_year_err = "choose the semester_year";
            } else {
                $semester_year = $_POST['semester_year'];
            }
        }
        //semester batch validation
        if (isset($_POST['semester_batch'])) {
            $semester_batch = $_POST['semester_batch'];
            if ($semester_batch == " ") {
                $semester_err++;
                $semester_batch_err = "choose the semester_batch";
            } else {
                $semester_batch = $_POST['semester_batch'];
            }
        }
        if ($semester_err == 0) {
            // include ('../database and tables/create_database.php');
            // include ('../database and tables/semester_table.php');
        } else {
            echo '<script>alert("year added validation error");</script>';
        }
    }
} catch (Exception $ex) {
    die("semester insert errror:" . $ex->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add semester form</title>
    <link rel="stylesheet" href="admin_forms_css.css">
</head>

<body>
    <form action="" method="post">
        <div class="add_semester">
            <div>
                <label for="semester_name">semester Name:</label>
                <input type="text" name="semester_name" id="semester_name" class="semester_name"
                    value="<?php echo $semester_name; ?>">
                <?php echo isset($semester_name_err) ? $semester_name_err : ''; ?>
            </div>
            <div>
                <label for="semester_rank">semester Rank:</label>
                <input type="number" name="semester_rank" id="semester_rank" class="semester_rank"
                    value="<?php echo $semester_rank; ?>">
                <?php echo isset($semester_rank_err) ? $semester_rank_err : ''; ?>
            </div>

            <div>
                <label for="semester_course">choose course type:</label>
                <select name="semester_course" id="semester_course" class="semester_course">
                    <option value="">Course</option>
                    <?php foreach ($courses as $course) { ?>
                        <option value="<?php echo $course['id'] ?>">
                            <?php echo $course['Name'] ?>
                        </option>
                    <?php } ?>
                </select>
                <?php echo isset($semester_course_err) ? $semester_course_err : ''; ?>
            </div>
            <div>
                <label for="semester_year">choose semester year type:</label>
                <select name="semester_year" id="semester_year" class="semester_year">
                    <option value="">choose year</option>
                    <?php foreach ($years as $year) { ?>
                        <option value="<?php echo $year['id'] ?>">
                            <?php echo $year['Name'] ?>
                        </option>

                    <?php } ?>
                </select>
                <?php echo isset($semester_year_err) ? $semester_year_err : ''; ?>
            </div>
            <div>
                <label for="semester_batch">choose semester batch type:</label>
                <select name="semester_batch" id="semester_batch" class="semester_batch">
                    <option value="">choose batch</option>
                    <?php foreach ($batchs as $batch) { ?>
                        <option value="<?php echo $batch['id'] ?>">
                            <?php echo $batch['Title'] ?>
                        </option>

                    <?php } ?>
                </select>
                <?php echo isset($semester_batch_err) ? $semester_batch_err : ''; ?>
            </div>
            <button name="semester_btn" class="semester_btn">add</button>
        </div>

    </form>
</body>

</html>