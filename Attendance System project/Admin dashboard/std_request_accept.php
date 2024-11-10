<?php
error_reporting(0);
try {
    include '../database and tables/create_database.php';
    $id = $_GET['acc_id'];
    $select_request = "SELECT * FROM Student_request_details where id= '$id'";
    $req_result = $connect->query($select_request);
    //check for row Student_request_details table
    if (mysqli_num_rows($req_result) > 0) {
        //print value to store in another table
        while ($std_req_row = mysqli_fetch_assoc($req_result)) {
            $stdname = $std_req_row['Name'];
            $Semail = $std_req_row['Email'];
            $Sphone = $std_req_row['Phone'];
            $password = $std_req_row['login_pwd'];
            $Sdob = $std_req_row['DOB'];
            $courseType = $std_req_row['course_type'];
            $selectcourse = $std_req_row['std_course'];
            $selectyear = $std_req_row['year'];
            $selectsem = $std_req_row['semester'];
            $batch = $std_req_row['batch_id'];
            $Ssection = $std_req_row['section'];
            $Sregister = $std_req_row['RegistrationNo'];
            $Sroll = $std_req_row['RollNo'];
            $gender = $std_req_row['Gender'];
            $Saddress = $std_req_row['address'];
            $filename = $std_req_row['image'];
            $status = 1;
            $reg_date = date("Y-m-d");//current date

            $req_insert = " INSERT INTO Student_table( Name, Email, Phone,login_pwd, DOB,course_type, std_course, year, semester,batch_id, Section, RegistrationNO, RollNo,Gender, address,Image,  	Registered_date, status)
            VALUES( '$stdname', '$Semail', '$Sphone','$password', '$Sdob', '$courseType','$selectcourse', '$selectyear', '$selectsem','$batch', '$Ssection', '$Sregister', '$Sroll','$gender', '$Saddress','$filename','$reg_date','$status')";
        }
    
    if (mysqli_query($connect,$req_insert)) {
        echo "<script>alert('insert students data')</script>"; 
        $delete_req = "DELETE from Student_request_details where id= $id";
        if(mysqli_query($connect,$delete_req)){
        header('location:./std_request_accept_tbl.php');
        }
    } else {
        echo "<script>alert('Failed to insert data')</script>";
    }
}
} catch (Exception $e) {
    die("insert errror:" . $e->getMessage());
}
?>
