<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacher details page</title>
    <link rel="stylesheet" href="view_teacher_profile _css.css">
</head>

<body class="teacher_profile_body">
    <?php
    include ('../database and tables/create_database.php');
    error_reporting(0);
    try {
        $teacher_id = $_SESSION['teacher_id'];
        $select_teacher_datail = " SELECT * FROM teacher_details where id= ' $teacher_id'";
        $teacher_detail_result = mysqli_query($connect, $select_teacher_datail);
        if (mysqli_num_rows($teacher_detail_result) > 0) {
            while ($teacher_row = mysqli_fetch_assoc($teacher_detail_result)) {
                echo '
                <div class="teacher_view_detail">
                    <a  href="./teacher_dashboard.php" class="teacher_profile_back">back</a>
                    <h2>your details</h2>
                    <div class="teacher_view_image">
                        <img src="../Admin dashboard/teacher_images/' . $teacher_row['image'] . '"> 
                        <a href="update_teacher_picture.php?id=' . $teacher_row['id'] . '" class="teacher_picture_update">change profile</a><br>
                    </div>
                    <div class="teacher_details">   
                        <p> Name:' . $teacher_row['Name'] . '</p>
                        <p>Email:' . $teacher_row['Email'] . '</p>
                        <p>Username:' . $teacher_row['username'] . '</p>
                        <p>Phone:' . $teacher_row['Phone'] . '</p>
                        <p>Address:' . $teacher_row['address'] . '</p>
                    </div> 
                
                <a onclick="return confirm(\'are you sure for edit\')" href="./edit_teacher_profile.php?id=' . $teacher_row['id'] .'" class="teacher_details_update">edit my details</a>
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