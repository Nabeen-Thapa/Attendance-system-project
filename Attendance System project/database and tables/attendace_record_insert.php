<?php
include ('create_database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_id = mysqli_real_escape_string($connect, $_POST['subject_id']);
    $current_date = date("Y-m-d");
    $attendance_record_check = "SELECT * FROM attendence_record_table WHERE subject_id = '$subject_id' AND date = '$current_date'";
    $attendance_record_result = mysqli_query($connect, $attendance_record_check);

    if (mysqli_num_rows($attendance_record_result) > 0) {
        echo "<script>alert('Attendance for this subject has already been recorded today.');</script>";
        echo "<script>window.location.href='../Teachers dashboard/view_attendance_table.php';</script>";
        // header("Location: ../Teachers dashboard/view_attendance_table.php");

        exit(); // Ensure script stops executing after redirect
    } else {
        // Insert present students
        if (isset($_POST['attendance_present'])) {
            foreach ($_POST['attendance_present'] as $stid => $value) {
                $stid = mysqli_real_escape_string($connect, $stid);
                $sql = "INSERT INTO attendence_record_table (subject_id, student_id, date, status) VALUES ('$subject_id', '$stid', '$current_date', 1)";
                if (!$connect->query($sql)) {
                    die("Error inserting present student: " . $connect->error);
                }
            }
        }

        // Insert absent students
        if (isset($_POST['attendance_absent'])) {
            foreach ($_POST['attendance_absent'] as $stid => $value) {
                $stid = mysqli_real_escape_string($connect, $stid);
                $sql = "INSERT INTO attendence_record_table (subject_id, student_id, date, status) VALUES ('$subject_id', '$stid', '$current_date', 0)";
                if (!$connect->query($sql)) {
                    die("Error inserting absent student: " . $connect->error);
                }
            }
        }

        // Redirect after inserting attendance
        header("Location: ../Teachers dashboard/view_attendance_table.php");
        exit(); // Ensure script stops executing after redirect
    }
}
?>
