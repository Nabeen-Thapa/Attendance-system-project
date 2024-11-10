
//studnet attendance file sheet and and record
document.getElementById('student_edit').style.display = "none";
document.getElementById('student_record').style.display='none';
document.getElementById('student_sheet').style.display='none';
document.getElementById('id_std_register').style.display = "none";
document.getElementById('teacher_dash').style.display = "inline";
document.getElementById('id_teacher_choose').style.display = "none";

function Tdashboard(){
    document.getElementById('teacher_dash').style.display = "inline";
    document.getElementById('id_std_register').style.display = "none";
    document.getElementById('student_sheet').style.display='none';
    document.getElementById('student_record').style.display = "none";
    document.getElementById('student_edit').style.display = "none";
    document.getElementById('id_teacher_choose').style.display = "none";
}

//all student edit and delete table
function students(){
    document.getElementById('teacher_dash').style.display = "none";
    document.getElementById('student_edit').style.display = "inline";
    document.getElementById('student_record').style.display = "none";
    document.getElementById('student_sheet').style.display='none';
    document.getElementById('id_std_register').style.display = "none";
    document.getElementById('id_teacher_choose').style.display = "none";
}
//student record talbe
function Arecord(){
    document.getElementById('teacher_dash').style.display = "none";
    document.getElementById('student_record').style.display = "inline";
    document.getElementById('student_sheet').style.display='none';
    document.getElementById('id_std_register').style.display = "none";
    document.getElementById('student_edit').style.display = "none";
    document.getElementById('id_teacher_choose').style.display = "none";
}
//student attendance table
function Afile(){
    document.getElementById('teacher_dash').style.display = "none";
    document.getElementById('student_record').style.display = "none";
    document.getElementById('student_sheet').style.display='inline';
    document.getElementById('id_std_register').style.display = "none";
    document.getElementById('student_edit').style.display = "none";
    document.getElementById('id_teacher_choose').style.display = "none";
}

//student add form from teacher dashboard
function addstd(){
    document.getElementById('teacher_dash').style.display = "none";
    document.getElementById('id_std_register').style.display = "inline";
    document.getElementById('student_sheet').style.display='none';
    document.getElementById('student_record').style.display = "none";
    document.getElementById('student_edit').style.display = "none";
    document.getElementById('id_teacher_choose').style.display = "none";
}
// add subject from teacher dashboard
function addsubject(){
    document.getElementById('id_teacher_choose').style.display = "inline";
    document.getElementById('id_std_register').style.display = "none";
}