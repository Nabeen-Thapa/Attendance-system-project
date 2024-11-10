<?php
try {
    include('create_database.php');
    include('add_course_validate.php');
    

    $insert_course = " INSERT INTO Course_table(Name,course_type) VALUES
    ('$course_name ', '$course_type')";
    if (mysqli_query($connect, $insert_course)) {
        echo '<script>alert("your registration request has been sended");</script>';
    } else {
        echo "<script>alert('Failed to insert data')</script>";
    }
} catch (Exception $e) {
    die("insert errror:" . $e->getMessage());
}
?>