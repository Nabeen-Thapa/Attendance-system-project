<?php
//admin image validate


if (isset($_POST['student_pic_update'])) {
    $student_error = 0;
    if (isset($_FILES['ppimage'])) {
        if ($_FILES['ppimage']['error'] == 0) {
            if ($_FILES["ppimage"]["size"] < 5000000) { // Limiting to 50MB
                $filetype = ['image/jpeg', 'image/png', 'image/svg+xml', 'image/bmp'];
                if (in_array($_FILES['ppimage']['type'], $filetype)) {
                    $filename = uniqid() . '.' . pathinfo($_FILES['ppimage']['name'], PATHINFO_EXTENSION);
                    if (move_uploaded_file($_FILES['ppimage']['tmp_name'], '../registration form/student_images/' . $filename)) {
                        $student_image = $filename;
                        $img_type = $_FILES['ppimage']['type'];
                    } else {
                        $student_error++;
                        $student_img_err = 'Upload failed';
                    }
                } else {
                    $student_error++;
                    $student_img_err = "File type must be jpeg/png/svg/bmp";
                }
            } else {
                $student_error++;
                $student_img_err = "Your image is too big in size";
            }
        }
    }

    if ($student_error == 0) {
        include '../database and tables/create_database.php';
        $student_id = $_GET['id'];
        $update_student = "UPDATE student_table SET  image= '$student_image' where id = '$student_id'";
        if (mysqli_query($connect, $update_student)) {
            echo '<script>alert("Your image updated");</script>';
            header("location:./student_details.php");
        } else {
            echo '<script>alert("picture update");</script>';
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
    <title>update student image</title>
    <link rel="stylesheet" href="../Admin dashboard/update_admin_picture_css.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="student_upload_image">
            <label for="ppimage">Image : </label>
            <input type="file" name="ppimage" id="ppimage" />
            <span>
                <?php echo isset($student_img_err) ? $student_img_err : '' ?>
            </span>
            <button name="student_pic_update">update</button>
        </div>
    </form>
</body>

</html>