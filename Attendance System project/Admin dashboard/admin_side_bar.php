<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="admin_side_bar_css.css">
</head>

<body>
    <div class="menu_bar">
            <a href="../Admin dashboard/Admin_dashboard.php"
                class="menus">Dashboard<img src="../images/dashboards.png" alt="" class="teach_dashimg"></a>

            <a href="../Admin%20dashboard/student_edit_table.php"
                class="menus">Students<img src="../images/all students.jpg" alt="" class="teach_dashimg"
                    id="allstd"></a>
            <a href="../Admin%20dashboard/view_attendance_record.php"
                class="menus" id="Arecord"><img src="../images/present students.png" alt=""
                    class="teach_dashimg">Attendance
                records</a>
            <a href="view_subject_wise.php"
            class="menus" id="Arecord"><img src="../images/present students.png" alt=""class="teach_dashimg">subject wise</a>

            <a href="../Admin dashboard/std_request_accept_tbl.php"
                class="menus" id="add_sub"><img src="../images/std_request.png" id="addsub"
                    class="teach_dashimg">student
                request</a>
            <div id="admin_add_forms" onclick="adminaddforms()">
                <div class="add_forms menus" id="add_forms">add forms<img src="../images/add_forms.png" id="addsub"
                        class="teach_dashimg"></div>
                <div id="admin_forms">
                    <div id="forms_close" onclick="form_close()">&times;</div>
                    <a href="../Admin dashboard/add_admin_form.php"
                        class="menus" id="Arecord"><img src="../images/present students.png" alt=""
                            class="teach_dashimg">Add new admin</a>

                    <a href="../Admin dashboard/add_teacher_form.php"
                        class="menus" id="add_sub"><img src="../images/add_teacher.png" id="addsub"
                            class="teach_dashimg">add teachers</a>
                    <a href="../Admin dashboard/add_course_form.php"
                        class="menus" id="add_sub"><img src="../images/add subjects.png" id="addsub"
                            class="teach_dashimg">add course</a>
                    <a href="../Admin dashboard/add_batch_form.php"
                        class="menus" id="add_sub"><img src="../images/add subjects.png" id="addsub"
                            class="teach_dashimg">add batch</a>
                    <a href="../Admin dashboard/add_subject_form.php"
                        class="menus" id="add_sub"><img src="../images/add subjects.png" id="addsub"
                            class="teach_dashimg"> add subject</a>
                    <a href="../Admin dashboard/add_subject_teacher_form.php"
                        class="menus" id="add_sub"><img src="../images/add subjects.png" id="addsub"
                            class="teach_dashimg">assign subject</a>
                </div>
            </div>
        
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        
        function form_close() {
            document.getElementById('admin_forms').style.display = "none";
        }
        $(document).ready(function () {

            $('.add_forms').click(function () {
                $('#admin_forms').toggle();
            });
            $('#red').click(function () {
                $('p').css({ 'color': 'yellow', 'background-color': 'black' })
                $('p').attr('class', 'nepal');
            });
        });
    </script>
</body>

</html>