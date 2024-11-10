<?php
    
    error_reporting();
try{
    $register_no = $_POST['regno'];
    $log_err = 0 ;
   $connection = mysqli_connect('localhost','root','','Attendance_system');
    $register_sql = "SELECT RegistrationNo from student_table where RegistrationNo ='$register_no'";
    $result_reg = mysqli_query($connection,$register_sql);
    if(mysqli_num_rows($result_reg)  == 1){
        $log_err++;
        echo 'register no. already taken';
    } else {
        echo ' ';
    }
}catch(Exception $ex){
    die('Database Error: ' . $ex->getMessage());
}

?>