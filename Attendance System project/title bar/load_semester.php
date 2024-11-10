<?php
$year_id = $_POST['year'];
try{
    $connection = mysqli_connect('localhost','root','','Attendance_system');
     $select_sem = " SELECT * from semester_table where year_id=$year_id";
     $result = mysqli_query($connection,$select_sem);
     $subject = "<option value=''>Semesters</option>";
     if(mysqli_num_rows($result)  > 0){
        while ($sem = mysqli_fetch_assoc($result)) {
            $subject .= "<option value='" . $sem['id'] . "'>" . $sem['Name'] ."</option>";
        }
     }
     echo $subject;

    //  $sem_std = $_POST['Name'];
    //  $select_sem_std = "SELECT * from student_table where semester ='$sem_std'; 
 }catch(Exception $ex){
     die('Database Error: ' . $ex->getMessage());
 }
?>