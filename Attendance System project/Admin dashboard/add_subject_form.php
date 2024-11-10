<?php  
include ("admin_title_bar.php");
include ("admin_side_bar.php");
?>
<?php
include ('../database and tables/create_database.php');
try {
    //choosing courses form database for dropdown box
    $course_select = "SELECT * from Course_table ";
    $result_course = mysqli_query($connect, $course_select);
    $subject_courses = [];
    if (mysqli_num_rows($result_course) > 0) {
        while ($subject_course = mysqli_fetch_assoc($result_course)) {
            array_push($subject_courses, $subject_course);
        }
    }

    //choosing years form database for dropdown box
    $year_select = "SELECT * from year_table ";
    $result_year = mysqli_query($connect, $year_select);
    $subject_years = [];
    if (mysqli_num_rows($result_year) > 0) {
        while ($subject_year = mysqli_fetch_assoc($result_year)) {
            array_push($subject_years, $subject_year);
        }
    }

    //choosing semesters form database for dropdown box
    $semester_select = "SELECT * from semester_table ";
    $result_semester = mysqli_query($connect, $semester_select);
    $subject_semesters = [];
    if (mysqli_num_rows($result_semester) > 0) {
        while ($subject_semester = mysqli_fetch_assoc($result_semester)) {
            array_push($subject_semesters, $subject_semester);
        }
    }
} catch (Exception $exy) {
    die(' course id select error:' . $exy->getMessage());
}



$subject_name = $subject_code = '';
// add subject form validation
$subject_error = 0;
if (isset($_POST["subject_add_btn"])) {
    //subject name validation
    if (isset($_POST["subject_name"]) && !empty($_POST['subject_name']) && trim($_POST['subject_name'])) {
        $subject_name = $_POST['subject_name'];
    } else {
        $subject_error++;
        $subject_name_err = 'enter subject name';
    }

    //subject code validation
    if (isset($_POST["subject_code"]) && !empty($_POST['subject_code']) && trim($_POST['subject_code'])) {
        $subject_code = $_POST['subject_code'];
    } else {
        $subject_error++;
        $subject_code_err = 'enter subject code';
    }
    //course valivation
    if (isset($_POST["subject_course"]) && !empty($_POST['subject_course'])) {
        $subject_course = $_POST['subject_course'];
    } else {
        $subject_error++;
        $subject_course_err = 'select subject course';
    }

    //year validation
    if (isset($_POST["subject_year"]) && !empty($_POST['subject_year'])) {
        $subject_year = $_POST['subject_year'];
    } else {
        $subject_error++;
        $subject_year_err = 'select subject year';
    }

    //semester validation
    if (isset($_POST['subject_semester']) && !empty($_POST['subject_semester'])) {
        $subject_semester = $_POST['subject_semester'];
    } else {
        $subject_error++;
        $subject_semester_err = 'select subject semester';
    }

    //database connection and insertion
    if ($subject_error == 0) {
        include '../database and tables/create_database.php';
        include '../database and tables/Subject_table.php';
    } else {
        echo '<script>alert("check the subject validation error");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add subject</title>
    <link rel="stylesheet" href="admin_forms_css.css">
</head>

<body>

    <!--teacher attendenca file create form-->
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="subject_add_form">
        <div class="add_subject">
            <!-- <span class="teach_create_hide" onclick="hideteachcreate()">&times;</span> -->
            <h2 class="subject_form_head">subject add registration</h2>
            <div>
                <label class="subject_name">Subject Name:</label>
                <input type="text" id="subject_name" class="subject_name" placeholder="enter your subject name"
                    name="subject_name" value="<?php echo $subject_name; ?>">
                <span><?php echo isset($subject_name_err) ? $subject_name_err : '' ?></span>
            </div>

            <div>
                <label class="subject_code">Subject code:</label>
                <input type="text" id="subject_code" class="subject_code" placeholder="enter your subject code "
                    name="subject_code" value="<?php echo $subject_code; ?>">
                <span><?php echo isset($subject_code_err) ? $subject_code_err : '' ?></span>
            </div>
            <div>
                <label for="subject_course">Choose your subject_course:</label>
                <select name="subject_course" id="subject_course" class="subject_course">
                    <option value="">subject course</option>
                    <?php foreach ($subject_courses as $subject_course) { ?>
                        <option value="<?php echo $subject_course['id'] ?>"<?php echo (isset($_POST['subject_course']) && $_POST['subject_course'] == $subject_course['id']) ? 'selected' : ''; ?>>
                            <?php echo $subject_course['Name'] ?>
                        </option>
                    <?php } ?>
                </select>
                <span><?php echo isset($subject_course_err) ? $subject_course_err : ''; ?></span>
            </div>
            <div>
                <label for="subject_year">Choose your subject_year:</label>
                <select name="subject_year" id="subject_year" class="subject_year">
                    <option value="">subject year</option>
                    <?php foreach ($subject_years as $subject_year) { ?>
                        <option value="<?php echo $subject_year['id'] ?>"<?php echo (isset($_POST['subject_year']) && $_POST['subject_year'] == $subject_year['id']) ? 'selected' : ''; ?>>
                            <?php echo $subject_year['Name'] ?>
                        </option>

                    <?php } ?>
                </select>
                <span><?php echo isset($subject_year_err) ? $subject_year_err : ''; ?></span>
            </div>
            <div>
                <label for="subject_semester">Choose your subject_semester:</label>
                <select name="subject_semester" id="subject_semester" class="subject_semester">
                    <option value="">subject semester</option>
                    <?php foreach ($subject_semesters as $subject_semester) { ?>
                        <option value="<?php echo $subject_semester['id'] ?>"<?php echo (isset($_POST['subject_semester']) && $_POST['subject_semester'] == $subject_semester['id']) ? 'selected' : ''; ?>>
                            <?php echo $subject_semester['Name'] ?>
                        </option>

                    <?php } ?>
                </select>
                <span> <?php echo isset($subject_semester_err) ? $subject_semester_err : ''; ?></span>
            </div>


            <!-- <button class="sub_add_cancel">back</button> -->
            <button class="subject_add_btn" id="subject_add_btn" name="subject_add_btn">Add</button>
        </div>
    </form>
    <!-- <script src="add_subjectjs.js"></script> -->
    <!-- <script src="../title bar/menu_barjs.js"></script> -->
    <!-- <script>
        //for semester dropdown box
document.getElementById('idselect_teach_sem').style.display = 'inline';
//for yealy radio button 
function yearlycreate(){
    document.getElementById('idselect_teach_sem').style.display = 'none';
    document.getElementById('idcreate_semlbl').style.display = 'none';
}
//for semester wise radoi button
function semcreate(){
    document.getElementById('idselect_teach_sem').style.display = 'inline';
}
    </script> -->
</body>

</html>