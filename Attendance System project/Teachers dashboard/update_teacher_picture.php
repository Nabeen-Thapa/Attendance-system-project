<?php
//teacher image validate

$teacher_error = 0;
if (isset($_POST['teacher_pic_update'])) {
    if (isset($_FILES['ppimage'])) {
        if ($_FILES['ppimage']['error'] == 0) {
            if ($_FILES["ppimage"]["size"] < 5000000) { // Limiting to 50MB
                $filetype = ['image/jpeg', 'image/png', 'image/svg+xml', 'image/bmp'];
                if (in_array($_FILES['ppimage']['type'], $filetype)) {
                    $filename = uniqid() . '.' . pathinfo($_FILES['ppimage']['name'], PATHINFO_EXTENSION);
                    if (move_uploaded_file($_FILES['ppimage']['tmp_name'], '../Admin dashboard/teacher_images/' . $filename)) {
                        $teacher_image = $filename;
                        $img_type = $_FILES['ppimage']['type'];
                    } else {
                        $teacher_error++;
                        $teacher_img_err = 'Upload failed';
                    }
                } else {
                    $teacher_error++;
                    $teacher_img_err = "File type must be jpeg/png/svg/bmp";
                }
            } else {
                $teacher_error++;
                $teacher_img_err = "Your image is too big in size";
            }
        }
    }
    if ($teacher_error == 0) {
        include '../database and tables/create_database.php';
        $teacher_id=$_GET['id'];
        $update_teacher = "UPDATE teacher_details SET  Image= '$teacher_image' where id = '$teacher_id'";
        if (mysqli_query($connect, $update_teacher)) {
            echo '<script>alert("Your image are updated");</script>';
            header("location:./view_teacher_profile.php");
        } else {
            echo '<script>alert("Check the error");</script>';
        }
    } else {
        echo '<script>alert("check the error validation ");</script>';

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload teachers image</title>
    <link rel="stylesheet" href="../Admin dashboard/update_admin_picture_css.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="teacher_upload_image">
            <label for="ppimage">Image : </label>
            <input type="file" name="ppimage" id="ppimage" />
            <span>
                <?php echo isset($teacher_img_err) ? $teacher_img_err : '' ?>
            </span>
            <button name="teacher_pic_update">update</button>
        </div>
    </form>
</body>

</html>