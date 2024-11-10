<?php  
include ("admin_title_bar.php");
include ("admin_side_bar.php");
?>
<?php
try {
    include('../database and tables/create_database.php');

    // Select courses from database for id
    $batch_course_select = "SELECT * FROM Course_table";
    $result_course = mysqli_query($connect, $batch_course_select);
    $batch_courses = [];
    if (mysqli_num_rows($result_course) > 0) {
        while ($batch_course = mysqli_fetch_assoc($result_course)) {
            array_push($batch_courses, $batch_course);
        }
    }

    // Select year from database for id
    $batch_year_select = "SELECT * FROM Year_table";
    $result_year = mysqli_query($connect, $batch_year_select);
    $batch_years = [];
    if (mysqli_num_rows($result_year) > 0) {
        while ($batch_year = mysqli_fetch_assoc($result_year)) {
            array_push($batch_years, $batch_year);
        }
    }

    // Select semester from database for id
    $sem_select = "SELECT * FROM Semester_table";
    $result_sem = mysqli_query($connect, $sem_select);
    $batch_semesters = [];
    if (mysqli_num_rows($result_sem) > 0) {
        while ($sem = mysqli_fetch_assoc($result_sem)) {
            array_push($batch_semesters, $sem);
        }
    }
} catch (Exception $exy) {
    die(' course id select error:' . $exy->getMessage());
}
?>

<?php
$batch_title = $batch_type = $batch_start = $batch_end = $batch_course='';
$batch_title_err = '';
$batch_err = 0;
try {
    if (isset($_POST['batch_btn'])) {
        // Batch name validation
        if (isset($_POST['batch_title']) && !empty($_POST['batch_title']) && trim($_POST['batch_title'])) {
            $batch_title = $_POST['batch_title'];
            try{
                $batch_title_check= "SELECT * from batch_table where Title='$batch_title'";
                $batch_title_result = mysqli_query($connect, $batch_title_check);
                if(mysqli_num_rows($batch_title_result)==1){
                    $batch_err++;
                $batch_title_err = "batch title already exist";
                }else{
                    $batch_title_err = " ";
                }

            }catch(Exception $ex){
                die('batch tittle name error: ' . $ex->getMessage());
            }
        } else {
            $batch_err++;
            $batch_title_err = "Enter the batch name";
        }

        // Batch start date validation
        if (isset($_POST['batch_start']) && !empty($_POST['batch_start']) && trim($_POST['batch_start'])) {
            $batch_start = $_POST['batch_start'];
        } else {
            $batch_err++;
            $batch_start_err = "Enter the start year";
        }

        // Batch end date validation
        if (isset($_POST['batch_end']) && !empty($_POST['batch_end']) && trim($_POST['batch_end'])) {
            $batch_end = $_POST['batch_end'];
        } else {
            $batch_err++;
            $batch_end_err = "Enter the batch end year";
        }

        // Batch course validation
        if (isset($_POST['course'])) {
            $batch_course = $_POST['course'];
            if ($batch_course == "") {
                $batch_err++;
                $batch_course_err = "Choose the course";
            }
        }

        // Batch year validation
        if (isset($_POST['year'])) {
            $batch_year = $_POST['year'];
            if ($batch_year == "") {
                $batch_err++;
                $batch_year_err = "Choose the year";
            }
        }

        // Batch semester validation
        if (isset($_POST['semester'])) {
            $batch_semester = $_POST['semester'];
            if ($batch_semester == "") {
                $batch_err++;
                $batch_semester_err = "Choose the semester";
            }
        }

        // If no errors, insert data into the database
        if ($batch_err == 0) {
            include('../database and tables/create_database.php');
             include('../database and tables/batch_table.php');
        }
    }
} catch (Exception $ex) {
    die("Batch insert error: " . $ex->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Batch Form</title>
    <link rel="stylesheet" href="admin_forms_css.css">
</head>

<body>
<div>
</div>    
    <div>
    <form action="" method="post">
        <div class="add_batch">
            <h2>batch form</h2>
            <div>
                <label for="batch_title">Batch Title:</label>
                <input type="text" name="batch_title" id="batch_title" class="batch_title"
                    value="<?php echo $batch_title; ?>">
                <span><?php echo isset($batch_title_err) ? $batch_title_err : ''; ?></span>
            </div>
            <div>
                <label for="batch_start">Batch Start Date:</label>
                <input type="text" name="batch_start" id="batch_start" class="batch_start"
                    value="<?php echo $batch_start; ?>">
                <span><?php echo isset($batch_start_err) ? $batch_start_err : ''; ?></span>
            </div>
            <div>
                <label for="batch_end">Batch End Date:</label>
                <input type="text" name="batch_end" id="batch_end" class="batch_end"
                    value="<?php echo $batch_end; ?>">
                <span><?php echo isset($batch_end_err) ? $batch_end_err : ''; ?></span>
            </div>

            <div>
                <label for="course">Choose Course:</label>
                <select name="course" id="course" class="course">
                    <option value="">Course</option>
                    <?php foreach ($batch_courses as $batch_course) { ?>
                        <option value="<?php echo $batch_course['id']; ?>" <?php if ($batch_course['id'] == $batch_course['Name']) echo "selected"; ?>>
                            <?php echo $batch_course['Name']; ?>
                        </option>
                    <?php } ?>
                </select>
                <span><?php echo isset($batch_course_err) ? $batch_course_err : ''; ?></span>
            </div>

            <div>
                <label for="year">Choose Year:</label>
                <select name="year" id="year" class="year">
                    <option value="">Year</option>
                    <?php foreach ($batch_years as $batch_year) { ?>
                        <option value="<?php echo $batch_year['id']; ?>">
                            <?php echo $batch_year['Name']; ?>
                        </option>
                    <?php } ?>
                </select>
                <span><?php echo isset($batch_year_err) ? $batch_year_err : ''; ?></span>
            </div>

            <div>
                <label for="semester">Choose Semester:</label>
                <select name="semester" id="semester" class="semester">
                    <option value="">Semester</option>
                    <?php foreach ($batch_semesters as $batch_semester) { ?>
                        <option value="<?php echo $batch_semester['id']; ?>">
                            <?php echo $batch_semester['Name']; ?>
                        </option>
                    <?php } ?>
                </select>
                <span><?php echo isset($batch_semester_err) ? $batch_semester_err : ''; ?></span>
            </div>
            <button name="batch_btn" class="batch_btn">Add</button>
        </div>
    </form>
    </div>
</body>

</html>
