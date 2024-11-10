// $student_select = "SELECT * FROM Student_table ORDER BY RollNo ASC";
    // $student_select = "SELECT Student_table.*, course_table.Name as course_name , semester_table.Name as semester_name, batch_table.Title as batch_name , subject_assign_teacher.batch_id sub_batch_id, subject_assign_teacher.sem_id as sub_sem_id,  subject_assign_teacher.teacehr_id as sub_teacher_id FROM Student_table ORDER BY RollNo ASC
    //     INNER JOIN course_table ON Student_table.std_course = course_table.id
    //     INNER JOIN semester_table ON Student_table.semester = semester_table.id 
    //     INNER JOIN batch_table ON Student_table.batch_id = batch_table.id
    //     WHERE 
    //     INNER JOIN batch_table.sem_id = $session_teacher_id";

    // $student_select = "SELECT from subject_assign_teacher.*, Student_table.Name as student_name, student_table.image as student_image, student_table.RollNo as student_roll, student_table.RegistrationNo as student_reg, student_table.Email as student_email, semester_talbe.Name as semester_name , course_table.Name as course_name from Student_table 
    // INNER JOIN batch_table on  Student_table.batch_id = batch_table.id
    // INNER JOIN semester_table on student_table.semester = semester_table.id 
    // where
    // subject_assign_teacher.Teacher_id = '$session_teacher_id' and 
    // subject_assign_teacher.subject_id = subjects_table.id and
    // subjects_table.id = '$subject_id' ";
    // $subject_id = $_GET['sub_id'];
    // $student_select = "SELECT student_table.*, semester_table.Name as semester_name, batch_table.Title as batch_name from student_table
    // INNER JOIN semester_table on student_table.semester = semester_table.id 
    // INNER JOIN batch_table on student_table.batch_id = batch_table.id 
    // INNER JOIN semester_table on subjects_table.Semester_id = semester_table.id
    // where student_table.semester = subject_table.Semester_id and
    // subject_table.id = '$subject_id'
    //";