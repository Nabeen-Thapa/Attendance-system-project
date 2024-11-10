<?php

error_reporting(E_ALL);
try 
{
    include '../database and tables/create_database.php';
    include ("admin_title_bar.php");
     include ("admin_side_bar.php");
    // Fetch data
    // $select_years = "SELECT year_table.*, course_table.Name AS course_name, 
    // batch_table.Title AS batch_name
    // FROM year_table 
    // INNER JOIN course_table ON year_table.course_id = course_table.id
    // INNER JOIN batch_table ON year_table.batch_id = batch_table.id";

    $select_years = "SELECT * from year_table";
    $result_years = mysqli_query($connect, $select_years);

    if (mysqli_num_rows($result_years) > 0) {
        echo"<div class='admin_years_view_tables'>";
        echo "<h2 class='year_title'>Attendance edit table</h2>";
        echo '<table border="1">
                <tr> 
                    <th>Name</th>
                    <th>Rank</th>
                    
                    <th colspan="2">operation</th>
                </tr>
            ';
        while ($year_row = mysqli_fetch_assoc($result_years)) {
            echo '<tr>
                <td>' . $year_row['Name'] . '</td>
                <td>' . $year_row['Rank'] . '</td>
                
                <td>
                    <a onclick="return confirm(\'are you sure for delete?\')" href="delete_student.php?id=' . $year_row['id'] . '"><img src="../images/deleted.png" id="std_delete" onclick ="Sdelete()" class="std_edit"  title="delete"> </a>
                </td>
                    
            </tr>
            ';
        }
        echo '</table>';
        echo'</div>';
    } else {
        echo 'Data not found';
    }
    mysqli_close($connect);
} catch (Exception $e) {
    die('student edit table: ' . $e->getMessage());
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student edit table</title>
    <link rel="stylesheet" href="admin_view_css.css">
</head>
<body>
</body>
</html>

