<?php
error_reporting(E_ALL);
try {
    include '../database and tables/create_database.php';

    $sem_id = $_POST['sem_id'];
    $sub_id = $_POST['sub_id'];
    $sub_tilte = $_POST['sub_title'];
    $attendance_select = "SELECT 
        student_table.Name AS std_name, 
        student_table.RollNo AS std_roll, 
        student_table.image AS std_img,
        batch_table.Title AS batch_name, 
        semester_table.Name AS semester_name,
        COUNT(CASE WHEN attendence_record_table.status = 1 THEN 1 END) AS present_count,
        COUNT(CASE WHEN attendence_record_table.status = 0 THEN 1 END) AS absent_count
    FROM attendence_record_table
    INNER JOIN 
        student_table ON attendence_record_table.student_id = student_table.id
    INNER JOIN 
        batch_table ON student_table.batch_id = batch_table.id
    INNER JOIN 
        semester_table ON student_table.semester = semester_table.id

        WHERE student_table.semester = '$sem_id'
         AND attendence_record_table.subject_id = '$sub_id'
    GROUP BY 
        student_table.id, student_table.Name, student_table.RollNo, student_table.image, batch_table.Title, semester_table.Name";

    $attendance_result = mysqli_query($connect, $attendance_select);

    if (mysqli_num_rows($attendance_result) > 0) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="attendance_report.csv"');

        $output = fopen('php://output', 'w');
        fputcsv($output, array('Profile', 'Roll No', 'Name', 'Batch', 'Semester', 'Present Days', 'Absent Days'));

        while ($attendance_row = mysqli_fetch_assoc($attendance_result)) {
            fputcsv($output, array(
                $attendance_row['std_img'],
                $attendance_row['std_roll'],
                $attendance_row['std_name'],
                $attendance_row['batch_name'],
                $attendance_row['semester_name'],
                $attendance_row['present_count'],
                $attendance_row['absent_count']
            ));
        }

        fclose($output);
    } else {
        echo 'Data not found';
    }
} catch (Exception $e) {
    die('Table display error: ' . $e->getMessage());
}
?>
