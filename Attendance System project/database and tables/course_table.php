<?php
try {
    include 'create_database.php';
    // creating the Course_table
    $course_tbl = "CREATE TABLE IF NOT EXISTS Course_table(
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    course_type varchar(30)
)";
    // Execute the query  Course_table
    if (mysqli_query($connect, $course_tbl)) {
        echo '';
    } else {
        echo 'Failed to create table: ' . mysqli_error($connect);
    }
    $insert_course = "INSERT INTO Course_table(Name, course_type) VALUES ('$course_name', '$course_type')";
    if (mysqli_query($connect, $insert_course)) {
        echo '<script>alert("course is inserted seccessfully");</script>';
    } else {
        echo "<script>alert('Failed to insert data.')</script>";
    }

} catch (Exception $exc) {
    die("course create table error:" . $exc->getMessage());
}
?>