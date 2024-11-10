<?php
    error_reporting(0);
    try{
        $log_err = 0;
        $email = $_POST['stdemail'];
   $connection = mysqli_connect('localhost','root','','Attendance_system');
    $email_sql = "SELECT Email from student_table where Email='$email'";
    $result_eml = mysqli_query($connection,$email_sql);
    if(mysqli_num_rows($result_eml)  == 1 ){
        $log_err++;
        echo 'email already registered';
    } else {
        
            echo ' ';
    }
}catch(Exception $ex){
    die('Database Error: ' . $ex->getMessage());
}
?>