<?php
$id = $_GET['id'];
$std_status = $_GET['status'];
 error_reporting(E_ALL);
try{
    //connection to database
    include('../database and tables/create_database.php');
    //sql to delete record for single row
   if($std_status == 1){
      $change_status = "UPDATE Student_table set status ='0' where id= '$id'";
   }else{
    $change_status = "UPDATE Student_table set status ='1' where id= '$id'";
   }
    if(mysqli_query($connect,$change_status)){
        header('location:student_edit_table.php');
    } else {
        echo 'Failed to delete product';
    }
}catch(Exception $ex){
    die('Database Error: ' . $ex->getMessage());
}

?>