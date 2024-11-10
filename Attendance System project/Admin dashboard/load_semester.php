<?php
$year_id = $_POST['year'];
try{
    include '../database and tables/create_database.php';
     $select_sem = " SELECT * from semester_table where year_id='$year_id'";
     $result = mysqli_query($connect,$select_sem);
     $subject = "<option value=''>Semesters</option>";
     if(mysqli_num_rows($result)  > 0){
        while ($sem = mysqli_fetch_assoc($result)) {
            $subject .= "<option value='" . $sem['id'] . "'>" . $sem['Name'] ."</option>";
        }
     }
     echo $subject;
 }catch(Exception $ex){
     die('Database Error: ' . $ex->getMessage());
 }
?>