
<?php
error_reporting(E_ALL);
try{
    //connection to database
    include 'create_database.php';
    
    //sql to create database table
    $admin_tbl = "CREATE TABLE IF NOT EXISTS Admin_details(
        id INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(255) NOT NULL,
        Email VARCHAR(255) NOT NULL,
        username VARCHAR(255),
        password varchar(20),
        Phone VARCHAR(20) NOT NULL,
        Image varchar(250),
        status boolean)";
    if(mysqli_query($connect,$admin_tbl)){
        echo '';
    } else {
        echo 'Failed to create table';
    }

    //insert admmin into databse table 
    $insert_admin ="INSERT INTO Admin_details(Name, Email, username, password, Phone, Image, status) values('$admin_name','$admin_email','$admin_uname','$admin_pwd', '$admin_phone','$image','1')";
    if(mysqli_query($connect,$insert_admin)){
        echo '<script> alert("new admin is added"); </script>';
    }else{
        echo '<script> alert("faile to add new admin"); </script>';
    }
}catch(Exception $e){
    die('student table creating error :' .$e->getMessage());
}

?>