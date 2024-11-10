<?php
    
    error_reporting();
try{
    $log_err = 0 ;
    $Phone = $_POST['stdphone'];
   $connection = mysqli_connect('localhost','root','','Attendance_system');
    $phone_sql = "SELECT * from student_table where Phone='$Phone'";
    $result_phone = mysqli_query($connection,$phone_sql);
    if(mysqli_num_rows($result_phone)  == 1){
        echo 'Phone already registered';
    } else {
        echo ' ';
    }
}catch(Exception $ex){
    die('Database Error: ' . $ex->getMessage());
}

?>