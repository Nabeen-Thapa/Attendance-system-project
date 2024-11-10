<?php
$stdname = $Semail = $Sphone = $Ssection = $Saddress = $courseType = $Scourse = $Syear = $Ssem = $gender = '';
//student name
// $password ='nabin123';
$status = '1';
$error = 0;
if (isset($_POST['std_regclk'])) {
    $connection = mysqli_connect('localhost', 'root', '', 'Attendance_system');
    
    //for student name validation
    if (isset($_POST['stdinputname']) && !empty($_POST['stdinputname']) && trim($_POST['stdinputname'])) {
        $stdname = trim($_POST['stdinputname']);
        if (!preg_match('/^[A-Z][a-z\s]+([A-Z][a-z\s]+)*[A-Z][a-z\s]+$/', $stdname)) {
            $error++;
            $stderrName = 'your name is not valid';
        }
    } else {
        $error++;
        $stderrName = 'Enter your name';
    }
    // student email
    $stdemailcheck = filter_var($_POST['stdemail'], FILTER_SANITIZE_EMAIL);
    if (isset($_POST['stdemail']) && !empty($_POST['stdemail']) && trim($_POST['stdemail'])) {
        $Semail = trim($_POST['stdemail']);
        if (!filter_var($Semail, FILTER_VALIDATE_EMAIL)) {
            $error++;
            $stderremail = "Do you mean " . $stdemailcheck . '?';
        }
        else {
            try {
                $email_sql = "SELECT Email from student_table where Email='$Semail'";
                $result_eml = mysqli_query($connection, $email_sql);
                if (mysqli_num_rows($result_eml) == 1) {
                    $error++;
                    $stderremail = 'email already registered';
                } else {
                    $stderremail = ' ';
                }
            } catch (Exception $ex) {
                die('Database Error: ' . $ex->getMessage());
            }
        }
    } else {
        $error++;
        $stderremail = 'Enter your email';
    }
    // studnet phone
    $phone_pattern = '/^(98|97)\d{8}$/';
    if (isset($_POST['stdphone']) && !empty($_POST['stdphone']) && trim($_POST['stdphone'])) {
        $Sphone = trim($_POST['stdphone']);
        if (!preg_match($phone_pattern, $Sphone)) {
            $error++;
            $stderrphone = "enter the validate phone";
        }
        else {
            try {

                $phone_sql = "SELECT Phone from student_table where Phone='$Sphone'";
                $result_phone = mysqli_query($connection, $phone_sql);
                if (mysqli_num_rows($result_phone) == 1) {
                    $error++;
                    $stderrphone = 'Phone already registered';
                } else {
                    $stderrphone = '  ';
                }
            } catch (Exception $ex) {
                die('Database Error: ' . $ex->getMessage());
            }
        }
    } else {
        $error++;
        $stderrphone = "enter your phone number";
    }
    //studnet dob
    $currentDate = date("Y-m-d");
    if (isset($_POST['date']) && !empty($_POST['date']) && trim($_POST['date'])) {
        $Sdob = $_POST['date'];
        if (strtotime($Sdob) <= strtotime($currentDate)) {
            $Sdob = $_POST['date'];
        } else {
            $error++;
            $stderrdate = "invalid DOB.";
        }

    } else {
        $error++;
        $stderrdate = 'Select birth Date';
    }

    // Check if the checkboxes are checked
    if (isset($_POST["courseType"])) {
        $courseType = $_POST["courseType"];
    } else {
        $error++;
        $stderrCtype = "Choose your course type";
    }
    
    //student course choose
    if (isset($_POST['course']) && !empty($_POST['course'])) {
        $selectcourse = $_POST['course'];
    } else {
        $error++;
        $course_err = "choose the course";
    }
    //setudent select year
    if (isset($_POST['selectyear'])&& !empty($_POST['selectyear'])) {
        $Syear = $_POST["selectyear"];
     } else {
            $error++;
            $Serryear = "select your year";
        }
    

    //semester
    if (isset($_POST['semester']) && empty($_POST['semester'])) {
        $error++; 
        $semester_err = "choose the semester";
            
    }
    else if(!isset($_POST['semester'])&& empty($_POST['semester'])){
        $selectsem = "-";
        $semester_err = " ";
    }
    else {
        $selectsem = $_POST['semester'];  
    }
    
    //student batch choose
    if (isset($_POST['batch']) && !empty($_POST['batch'])) {
        $batch = $_POST['batch'];
    } else {
        $error++;
        $batch_err = "choose the batch";
    }
    
    //student section
    if (isset($_POST['section']) && !empty($_POST['section']) && trim($_POST['section'])) {
        $Ssection = trim($_POST['section']);
        if (!preg_match('/^[A-Z]+$/', $Ssection)) {
            $error++;
            $stderrsection = 'section should be In Uppercase';
        }
    } else {
        $error++;
        $stderrsection = '*your section';
    }

    //student registration no.
    require_once ('registered_reg_no.php');
    if (isset($_POST['regno']) && !empty($_POST['regno']) && trim($_POST['regno'])) {
        $Sregister = trim($_POST['regno']);
        if (!preg_match('/^[0-9]+/', $Sregister)) {
            $error++;
            $stderrreg = 'registration No. should be interger';
        }
        else {
            try {
                $register_sql = "SELECT * from student_table where RegistrationNo ='$Sregister'";
                $result_reg = mysqli_query($connection, $register_sql);
                if (mysqli_num_rows($result_reg) == 1) {
                    $error++;
                    $stderrreg = 'register no. already taken';
                }
            } catch (Exception $ex) {
                die('Database Error: ' . $ex->getMessage());
            }
        }
    } else {
        $error++;
        $stderrreg = '*registration No.';
    }

    //rollno
    if (isset($_POST['rollno']) && !empty($_POST['rollno']) && trim($_POST['rollno'])) {
        $Sroll = trim($_POST['rollno']);
        if (filter_var($Sroll, FILTER_VALIDATE_INT) == false) {
            $error++;
            $stderrroll = 'Roll No. should be interger';
        }
    } else {
        $error++;
        $stderrroll = '*Roll number';
    }

    //address
    if (isset($_POST['address']) && !empty($_POST['address']) && trim($_POST['address'])) {
        $Saddress = trim($_POST['address']);
        if (!preg_match('/^[A-Za-z0-9\s\.,#\-]+$/', $Saddress)) {
            $error++;
            $stderraddress = 'invalid address';
        }
    } else {
        $error++;
        $stderraddress = '*your address';
    }

    //student gender
    if (isset($_POST["gender"])) {
        $gender = $_POST["gender"];
    } else {
        $error++;
        $stderrgender = "Choose your gender";
    }

    //image upload
    include 'image_upload.php';
    if ($error == 0) {
        //password venerator
        $request_date = date("Y-m-d");
        include 'password_generator.php';
        //include database to store student regsitered data 
        include '../database and tables/create_database.php';
        include '../database and tables/student_request_detail.php';
        include '../database and tables/std_request_insert.php';
    } else {
        echo '<script>alert("check the error ");</script>';

    }
}
?>