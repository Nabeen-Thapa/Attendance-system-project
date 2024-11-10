
<?php
try{
    //connection to database
    include 'create_database.php';
    
    //sql to create course table on database
    $course_type_tbl = "CREATE TABLE IF NOT EXISTS Course_type(
        id INT AUTO_INCREMENT PRIMARY KEY,
        course_type VARCHAR(255) NOT NULL
    )";
    if(mysqli_query($connect,$course_type_tbl)){
        echo ' ';
    } else {
        echo 'Failed to create table' . mysqli_error($connect);
    }

    //iseret into course table
    $insert_course = "INSERT INTO Course_type(course_type)VALUES('yearly'),('Semester wise')";
    if(mysqli_query($connect,$insert_course)){
        echo ' ';
    } else {
        echo 'Failed to create table' . mysqli_error($connect);
    }

}catch(Exception $e){
    die('course table creating error:' .$e->getMessage());
}

?>