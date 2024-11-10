<?php
try {

    include('create_database.php');
    //include('Student_table.php');
    // include('../registration form/student_register_validate.php');

    $insert = " INSERT INTO Student_request_details(Name, Email, Phone,login_pwd, DOB,course_type, std_course, year, semester, batch_id, Section, RegistrationNO, RollNo,Gender, address,Image, request_date, status)
    VALUES('$stdname', '$Semail', '$Sphone','$password', '$Sdob', '$courseType','$selectcourse', '$Syear', '$selectsem', '$batch', '$Ssection', '$Sregister', '$Sroll','$gender', '$Saddress','$filename','$request_date','$status')";

     mysqli_select_db($connect, "Attendance_system");
     $connect->select_db("Attendance_system");

    if (mysqli_query($connect, $insert)) {
        echo '<script>alert("your registration request has been sended");</script>';
    } else {
        echo "<script>alert('Failed to insert data')</script>";
    }
} catch (Exception $e) {
    die("insert errror:" . $e->getMessage());
}
?>