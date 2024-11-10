<?php
// Start session and include database connection if necessary
// session_start();
// include '../database and tables/create_database.php';

$admin_error = 0;
$admin_img_err = '';

if (isset($_POST['admin_pic_update'])) {
    if (isset($_FILES['ppimage'])) {
        if ($_FILES['ppimage']['error'] == 0) {
            if ($_FILES["ppimage"]["size"] < 5000000) { // Limiting to 5MB
                $filetype = ['image/jpeg', 'image/png', 'image/svg+xml', 'image/bmp'];
                if (in_array($_FILES['ppimage']['type'], $filetype)) {
                    $filename = uniqid() . '.' . pathinfo($_FILES['ppimage']['name'], PATHINFO_EXTENSION);
                    if (move_uploaded_file($_FILES['ppimage']['tmp_name'], 'admin_images/' . $filename)) {
                        $admin_image = $filename;
                        $img_type = $_FILES['ppimage']['type'];
                    } else {
                        $admin_error++;
                        $admin_img_err = 'Upload failed';
                    }
                } else {
                    $admin_error++;
                    $admin_img_err = "File type must be jpeg/png/svg/bmp";
                }
            } else {
                $admin_error++;
                $admin_img_err = "image is too big in size";
            }
        } else {
            $admin_error++;
            $admin_img_err = "image uplading error";
        }
    } else {
        $admin_error++;
        $admin_img_err = "No file was uploaded";
    }

    if ($admin_error == 0) {
        include '../database and tables/create_database.php';
        $admin_id = $_GET['id'];
        $update_admin = "UPDATE admin_details SET Image= '$admin_image' WHERE id = '$admin_id'";
        if (mysqli_query($connect, $update_admin)) {
            echo '<script>alert("Your image is updated");</script>';
            header("Location: ./view_admin_profile.php");
            exit();
        } else {
            echo '<script>alert("Check the error");</script>';
        }
    } else {
        echo '<script>alert("Check the error validation");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin Picture</title>
    <link rel="stylesheet" href="update_admin_picture_css.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="admin_upload_image">
            <label for="ppimage">Choose Image for Profile</label>
            <input type="file" name="ppimage" id="ppimage" />
            <span class="error-message">
                <?php echo isset($admin_img_err) ? $admin_img_err : ''; ?>
            </span>
            <button type="submit" name="admin_pic_update" class="admin_pic_btn">Update</button>
        </div>
    </form>
</body>

</html>
