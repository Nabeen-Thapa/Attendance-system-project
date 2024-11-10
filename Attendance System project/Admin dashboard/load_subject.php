<?php
$semester_id = $_POST['semester'];
$course_id = $_POST['course'];
try{
    include '../database and tables/create_database.php';
     $sql = " SELECT * from subjects_table where Semester_id='$semester_id' AND Course_id = '$course_id'";
     $result = mysqli_query($connect,$sql);
     $subject = "<option value=''>Subject</option>";
     if(mysqli_num_rows($result)  > 0){
        while ($sub = mysqli_fetch_assoc($result)) {
            $subject .= "<option value='" . $sub['id'] . "'>" . $sub['Title'] ."</option>";
        }
     }
     echo $subject;
 }catch(Exception $ex){
     die('Database Error: ' . $ex->getMessage());
 }
?>