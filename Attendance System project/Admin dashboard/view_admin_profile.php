<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin details page</title>
    <link rel="stylesheet" href="view_admin_profile_css.css">
</head>

<body class="admin_profile_body">
    <?php
    include ('../database and tables/create_database.php');
    error_reporting(0);
    try {
        $admin_id = $_SESSION['admin_id'];
        $select_admin_datail = " SELECT * FROM admin_details where id= ' $admin_id'";
        $admin_detail_result = mysqli_query($connect, $select_admin_datail);
        if (mysqli_num_rows($admin_detail_result) > 0) {
            while ($admin_row = mysqli_fetch_assoc($admin_detail_result)) {
                echo '
                <div class="admin_dash_detail">
                    <a  href="./Admin_dashboard.php" class="admin_profile_back">back</a>
                    <h2>your details</h2>
                    <div class="admin_view_detail"> 
                        <div class="admin_view_image">
                            <img src="admin_images/' . $admin_row['Image'] . '"> 
                            <a href="update_admin_picture.php?id='. $admin_row['id'] . '"  class="admin_picture_update">change profile</a><br>
                        </div> 
                        <div class="admin_details"> 
                        <p>Name: ' . $admin_row['Name'] . '</p>
                       <p> Email:' . $admin_row['Email'] . '</p>
                        <p>Username: ' . $admin_row['username'] . '</p>
                        <p>Phone:  ' . $admin_row['Phone'] . '</p>
                        </div>
                    </div> 
                    <a onclick="return confirm(\'are you sure for edit\')" href="./edit_admin_profile.php?id=' . $admin_row['id'] . '" class="admin_details_update">edit my details</a>
                </div>
                ';
            }
        } else {
            echo '<script>alert("Data not found")</script>';
        }

    } catch (Exception $ex) {
        die("student dashborad erorr:" . $ex->getMessage());
    }
    ?>
</body>

</html>