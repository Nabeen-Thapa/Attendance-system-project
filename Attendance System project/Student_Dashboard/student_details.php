<?php
include ("student_title_bar.php")
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student details page</title>
    <link rel="stylesheet" href="student_details_css.css">
</head>

<body class="student_profile_body">
    <?php
    include ('../database and tables/create_database.php');
    error_reporting(0);
    try {
        $std_session_email = $_SESSION['student_email'];
        $select_std_datail = "SELECT Student_table.*, batch_table.Title as batch_name, course_table.Name as course_name , Year_table.Name As year, Semester_table.Name as semester
        FROM Student_table 
        INNER JOIN batch_table ON Student_table.batch_id = batch_table.id
        INNER JOIN course_table ON Student_table.std_course = course_table.id
        INNER JOIN Year_table ON Student_table.year = Year_table.id
        INNER JOIN semester_table ON Student_table.semester = semester_table.id
        where student_table.Email ='$std_session_email'";
        $std_detail_result = mysqli_query($connect, $select_std_datail);
        if (mysqli_num_rows($std_detail_result) > 0) {
            while ($row = mysqli_fetch_assoc($std_detail_result)) {
                echo '
                <div class="student_view_detail">
                    <h2>Your details</h2>
                    <div class="student_view_image">
                        <img src="../registration form/student_images/' . $row['image'] . '"> 
                        <a href="student_picture_update.php?id=' . $row['id'] . '" class="student_picture_update">change profile</a><br> 
                    </div>
                    <div class="student_details">   
                        <p>Name: ' . $row['Name'] . '</p>
                        <p>Roll No.:' . $row['RollNo'] . '</p>
                        <p>Email:' . $row['Email'] . '</p>
                        <p>Phone:' . $row['Phone'] . '</p>
                        <p>Date of birth:' . $row['DOB'] . '</p>
                        <p>Course:' . $row['course_name'] . '</p>
                        <p>Year:' . $row['year'] . '</p>
                        <p>batch:' . $row['batch_name'] . '</p>
                        <p>Semester: ' . $row['semester'] . '</p>
                        <p>Section:' . $row['section'] . '</p>
                        <p>Registration No.:' . $row['RegistrationNo'] . '</p>
                        <p>Address:' . $row['address'] . '</p>
                        <p>Registered date:' . $row['Registered_date'] . '</p>
                        <p>Gender: ' . $row['Gender'] . '</p>
                    </div> 
                    <a onclick="return confirm(\'are you sure for edit\')" href="student_details_update.php?id=' . $row['id'] . '" class="std_details_update">update my details</a>
                </div>
                ';
            }
        } else {
            echo '<script>alert("Data not found")</script>';
        }

    } catch (Exception $ex) {
        die("student dashborad erorr:" . $ex->getMessage());
    }
    ?>
</body>

</html>