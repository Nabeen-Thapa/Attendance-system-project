<?php
error_reporting(E_ALL);
try {
    $connect = mysqli_connect("localhost", "root", "");

    //database creation
    $Attendance_DB = "CREATE DATABASE IF NOT EXISTS Attendance_system";
    if (mysqli_query($connect, $Attendance_DB)) {
        echo " ";
    } else {
        echo "failed";
    }
    mysqli_select_db($connect, "Attendance_system");
    $connect->select_db("Attendance_system");
} catch (Exception $e) {
    die("Database error:" . $e->getMessage());
}
?>