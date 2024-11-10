<?php  
include ("admin_title_bar.php");
include ("admin_side_bar.php");
?>
<?php
include('../database and tables/create_database.php');
$course_select = "SELECT * FROM Course_table";
    $result_course = mysqli_query($connect, $course_select);
    if (mysqli_num_rows($result_course) > 0) {
        $course = mysqli_fetch_assoc($result_course); 
    }

    $course_name = $course_type = '';
    $course_name_err = $course_type_err = '';
    $course_err = 0;
try {
    if (isset($_POST['course_btn'])) {
       
        // Course name validation
        if (isset($_POST['course_name']) && !empty($_POST['course_name']) && trim($_POST['course_name'])) {
            $course_name  = $_POST['course_name'];
            if($course_name == $course['Name']){
                $course_err++;
                $course_name_err = "this course is already added";
            }
        } else {
            $course_err++;
            $course_name_err = "Enter the course name";
        }

        // Course type validation
        if (isset($_POST['course_type'])) {
            $course_type = $_POST['course_type'];
            if ($course_type == "") {
                $course_err++;
                $course_type_err = "Choose the course type";
            }
        }

        if ($course_err == 0) {
            include('../database and tables/create_database.php');
            include('../database and tables/course_table.php');
        } else {
            echo '<script>alert("Check the errors")</script>';
        }
    }
} catch (Exception $ex) {
    die("Course insert error: " . $ex->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add course form</title>
    <link rel="stylesheet" href="admin_forms_css.css">
</head>

<body>
    <form action="" method="post">
        <div class="add_course">
            <h2>add course</h2>
            <div>
                <label for="course_name">Course Name:</label>
                <input type="text" name="course_name" id="course_name" class="course_name"
                    value="<?php echo $course_name; ?>">
                <?php echo isset($course_name_err) ? $course_name_err : ''; ?>
            </div>
            <div>
                <label for="course_type">choose type:</label>
                <select name="course_type" id="course_type">
                    <option value="">choose course type</option>
                    <option value="yearly" <?php if ($course_type == "yearly")
                        echo "selected" ?>>yearly</option>
                        <option value="semester wise" <?php if ($course_type == "semester wise")
                        echo "selected"; ?>>semester
                        wise</option>
                </select>
                <?php echo isset($course_type_err) ? $course_type_err : ''; ?>
            </div>
            <button name="course_btn" class="course_btn">add</button>
        </div>

    </form>
</body>

</html>