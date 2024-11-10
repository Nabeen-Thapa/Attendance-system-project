<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student edit table</title>
    <link rel="stylesheet" href="std_request_view_css.css">
</head>
<body>
    <?php
    include ("admin_title_bar.php");
    include ("admin_side_bar.php");
    error_reporting(E_ALL);
    try {
        include '../database and tables/create_database.php';
        
        // Fetch data
        $id = $_GET['id'];
        $std_request_view = "SELECT * FROM Student_request_details WHERE id='$id'";
        $std_req_result = mysqli_query($connect, $std_request_view);

        if (mysqli_num_rows($std_req_result) > 0) {
            echo "<div class='std_view_tbl'>";
            echo ' <div class="std_req_view_back">
            <a href="./std_request_accept_tbl.php"> 
            back</a> 
        </div>';
            echo "<center><h2>student detail</h2></center>";
            while ($row = mysqli_fetch_assoc($std_req_result)) {
                echo '
                <div class="std_req_view_img">
                    <img src="../registration form/student_images/' . $row['image'] . '">  
                </div>
                <div class="std_req_view_detail">   
                    <p>Name:' . $row['Name'] . '</p>
                    <p>Roll No.:' . $row['RollNo'] . '</p>
                    <p>Email:' . $row['Email'] . '</p>
                    <p>Phone:' . $row['Phone'] . '</p>
                    <p>Date of birth:' . $row['DOB'] . '</p>
                    <p>Course:' . $row['std_course'] . '</p>
                    <p>Year:' . $row['year'] . '</p>
                    <p>Semester: ' . $row['semester'] . '</p>
                    <p>Section:' . $row['section'] . '</p>
                    <p>Registration No.:' . $row['RegistrationNo'] . '</p>
                    <p>Address:' . $row['address'] . '</p>
                    <p>Gender: ' . $row['Gender'] . '</p>
               </div> 
            ';
            }

            echo '</div>';
        } else {
            echo '<script>alert("Data not found")</script>';
        }
        mysqli_close($connect);
    } catch (Exception $e) {
        die('student edit table: ' . $e->getMessage());
    }
    ?>


</body>

</html>