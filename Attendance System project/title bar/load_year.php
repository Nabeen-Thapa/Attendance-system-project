<?php
$semester_id = $_POST['semester'];
try{
    include('../database and tables/create_database.php');
     $sql = "select * from Semester_table where Sem_id=$Sem_id";
     $result = mysqli_query($connect,$sql);
     $subject = "<option value=''>Select Subject</option>";
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