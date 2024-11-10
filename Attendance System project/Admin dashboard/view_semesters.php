<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student edit table</title>
    <link rel="stylesheet" href="admin_view_css.css">

</head>

<body>

    <div>
        <?php

        error_reporting(E_ALL);
        try {
            include '../database and tables/create_database.php';
            include ("admin_title_bar.php");
            include ("admin_side_bar.php");
            // Fetch data
            // $select_semesters = "SELECT semester_table.*, course_table.Name AS course_name, year_table.Name AS year_name, batch_table.Title AS batch_name 
            // FROM semester_table 
            // INNER JOIN course_table ON semester_table.course_id = course_table.id
            // INNER JOIN year_table ON semester_table.year_id = year_table.id
            // INNER JOIN batch_table ON semester_table.batch_id = batch_table.id";
        
            $select_semesters = "SELECT semester_table.*,  year_table.Name AS year_name
    FROM semester_table 
    INNER JOIN year_table ON semester_table.year_id = year_table.id";
            $result_semesters = mysqli_query($connect, $select_semesters);

            if (mysqli_num_rows($result_semesters) > 0) {
                echo "<div class='admin_semester_view_tables'>";
                echo "<h2>semester list</h2>";
                echo '<table border="1">
        
                <tr> 
                    <th>Name</th>
                    <th>Rank</th>
                    <th>year</th>
                    
                    <th colspan="2">operation</th>
                </tr>
            ';
                while ($semester_row = mysqli_fetch_assoc($result_semesters)) {
                    echo '<tr>
                <td>' . $semester_row['Name'] . '</td>
                <td>' . $semester_row['Rank'] . '</td>
                <td>' . $semester_row['year_name'] . '</td>
                
                <td>
                    <a onclick="return confirm(\'are you sure for delete?\')" href="delete_student.php?id=' . $semester_row['id'] . '"><img src="../images/deleted.png" id="std_delete" onclick ="Sdelete()" class="std_edit"  title="delete"> </a>
                </td>
                    
            </tr>
            ';
                }
                echo '</table>';
                echo '</div>';
            } else {
                echo 'Data not found';
            }
            mysqli_close($connect);
        } catch (Exception $e) {
            die('student edit table: ' . $e->getMessage());
        }
        ?>
    </div>
</body>

</html>