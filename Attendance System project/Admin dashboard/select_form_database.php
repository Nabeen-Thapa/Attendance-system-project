<?php
try {
    include('../database and tables/create_database.php');

    // Select courses from database for id
    $batch_course_select = "SELECT * FROM Course_table";
    $result_course = mysqli_query($connect, $batch_course_select);
    $batch_courses = [];
    if (mysqli_num_rows($result_course) > 0) {
        while ($batch_course = mysqli_fetch_assoc($result_course)) {
            array_push($batch_courses, $batch_course);
        }
    }

    // Select year from database for id
    $batch_year_select = "SELECT * FROM Year_table";
    $result_year = mysqli_query($connect, $batch_year_select);
    $batch_years = [];
    if (mysqli_num_rows($result_year) > 0) {
        while ($batch_year = mysqli_fetch_assoc($result_year)) {
            array_push($batch_years, $batch_year);
        }
    }

    // Select semester from database for id
    $sem_select = "SELECT * FROM Semester_table";
    $result_sem = mysqli_query($connect, $sem_select);
    $batch_semesters = [];
    if (mysqli_num_rows($result_sem) > 0) {
        while ($sem = mysqli_fetch_assoc($result_sem)) {
            array_push($batch_semesters, $sem);
        }
    }
} catch (Exception $exy) {
    die(' course id select error:' . $exy->getMessage());
}
?>