<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance Records</title>
    <link rel="stylesheet" href="../Admin dashboard/admin_view_css.css">
    <link rel="stylesheet" href="../Admin dashboard/std_record_tblcss.css">
</head>
<body>
    <form method="post" action="report_generator.php">
        <input type="hidden" name="sem_id" value="<?php echo $sem_id; ?>">
        <input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
        <input type="hidden" name="sub_title" value="<?php echo $sub_tilte; ?>">
        <button type="submit">Download CSV Report</button>
    </form>
</body>
</html>
