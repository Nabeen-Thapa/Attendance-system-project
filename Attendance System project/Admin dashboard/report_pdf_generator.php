<?php
require('fpdf/fpdf.php');
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
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 12);
    
    $pdf->Cell(0, 10, 'Attendance Record', 1, 1, 'C');
    $pdf->Cell(0, 10, 'Subject: ' . $sub_tilte, 1, 1, 'C');
    $pdf->Ln(10);
    
    // $pdf->Cell(30, 10, 'Profile', 1);
    $pdf->Cell(20, 10, 'Roll No', 1);
    $pdf->Cell(60, 10, 'Name', 1);
    $pdf->Cell(35, 10, 'Batch', 1);
    $pdf->Cell(35, 10, 'Semester', 1);
    $pdf->Cell(20, 10, 'Present', 1);
    $pdf->Cell(20, 10, 'Absent', 1);
    $pdf->Ln();

    while ($attendance_row = mysqli_fetch_assoc($attendance_result)) {
        // $pdf->Cell(30, 10, $attendance_row['std_img'], 1);
        $pdf->Cell(20, 10, $attendance_row['std_roll'], 1);
        $pdf->Cell(60, 10, $attendance_row['std_name'], 1);
        $pdf->Cell(35, 10, $attendance_row['batch_name'], 1);
        $pdf->Cell(35, 10, $attendance_row['semester_name'], 1);
        $pdf->Cell(20, 10, $attendance_row['present_count'], 1);
        $pdf->Cell(20, 10, $attendance_row['absent_count'], 1);
        $pdf->Ln();
    }

    $pdf->Output('D', 'attendance_report.pdf');
} else {
    echo 'Data not found';
}
?>
