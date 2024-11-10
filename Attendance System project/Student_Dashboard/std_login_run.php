<?php  
 include 'student_login.php';
 $select_student = "SELECT id FROM student_table WHERE Name='$username' AND Email='$email' AND login_pwd='$password'";
        $result_name = mysqli_query($connect, $select_student);

        if (mysqli_num_rows($result_name) == 1) {
            $row = $result_name->fetch_assoc();
        }
     echo '
     <script> 
    alert("welcome to your dashborad");
    <a onclick="return href="std_req_reject.php?id=' . $row['id'] . '">ok</a>
     </script>
     ';
?>