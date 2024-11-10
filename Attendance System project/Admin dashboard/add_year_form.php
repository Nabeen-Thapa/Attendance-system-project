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
} catch (Exception $exy) {
    die(' course id select error:' . $exy->getMessage());
}
?>
<?php
$year_name = $year_type = '';
$year_name_err = '';
$year_err = 0;
try {
    if (isset($_POST['year_btn'])) {

        // Year name validation
        if (isset($_POST['year_name']) && !empty($_POST['year_name']) && trim($_POST['year_name'])) {
            $year_name = $_POST['year_name'];
        } else {
            $year_err++;
            $year_name_err = "enter the year name";
        }

        // Year rank validation
        if (isset($_POST['year_rank']) && !empty($_POST['year_rank']) && trim($_POST['year_rank'])) {
            $year_rank = $_POST['year_rank'];
        } else {
            $year_err++;
            $year_rank_err = "enter the year rank";
        }

        // Year course validation
        if (isset($_POST['year_course'])) {
            $year_course = $_POST['year_course'];
            if ($year_course == " ") {
                $year_err++;
                $year_course_err = "choose the year_course";
            }else{
                $year_course = $_POST['year_course'];
            }
        }

        // Year batch validation
        if (isset($_POST['year_batch'])) {
            $year_batch = $_POST['year_batch'];
            if ($year_batch == " ") {
                $year_err++;
                $year_batch_err = "choose the year_batch";
            }else{
                $year_batch = $_POST['year_batch'];
            }
        }

        if ($year_err == 0) {
            // include ('../database and tables/create_database.php');
            // include ('../database and tables/Year_table.php');
            
        } else {
            echo '<script>alert("year added validation error");</script>';
        }
    }
} catch (Exception $ex) {
    die("year insert errror:" . $ex->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add year form</title>
    <link rel="stylesheet" href="admin_forms_css.css">
</head>

<body>
    <form action="" method="post">
        <div class="add_year">
            <div>
                <label for="year_name">year Name:</label>
                <input type="text" name="year_name" id="year_name" class="year_name" value="<?php echo $year_name; ?>">
                <?php echo isset($year_name_err) ? $year_name_err : ''; ?>
            </div>
            <div>
    <label for="year_rank">Year Rank:</label>
    <input type="number" name="year_rank" id="year_rank" class="year_rank" value="<?php echo $year_rank; ?>">
    <?php echo isset($year_rank_err) ? $year_rank_err : ''; ?>
</div>


            <div>
                <label for="year_course">choose course type:</label>
                <select name="year_course" id="year_course" class="year_course">
                    <option value="">Course</option>
                    <?php foreach ($courses as $course) { ?>
                        <option value="<?php echo $course['id'] ?>">
                            <?php echo $course['Name'] ?>
                        </option>
                    <?php } ?>
                </select>
                <?php echo isset($year_course_err) ? $year_course_err : ''; ?>
            </div>
            <div>
                <label for="year_batch">choose year batch type:</label>
                <select name="year_batch" id="year_batch" class="year_batch">
                    <option value="">choose batch</option>
                    <?php foreach ($batchs as $batch) { ?>
                        <option value="<?php echo $batch['id'] ?>">
                            <?php echo $batch['Title'] ?>
                        </option>

                    <?php } ?>
                </select>
                <?php echo isset($year_batch_err) ? $year_batch_err : ''; ?>
            </div>
            <button name="year_btn" class="year_btn">add</button>
        </div>

    </form>
</body>

</html>