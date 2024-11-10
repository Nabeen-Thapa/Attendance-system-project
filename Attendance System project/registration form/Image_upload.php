<?php
if(isset($_FILES['ppimage'])){
    if ($_FILES['ppimage']['error'] == 0) {
        if ($_FILES["ppimage"]["size"] < 5000000) { // Limiting to 50MB
            $filetype = ['image/jpeg', 'image/png', 'image/svg+xml', 'image/bmp'];
            if (in_array($_FILES['ppimage']['type'], $filetype)) {
                $filename = uniqid() . '.' . pathinfo($_FILES['ppimage']['name'], PATHINFO_EXTENSION);
                if (move_uploaded_file($_FILES['ppimage']['tmp_name'], 'student_images/' . $filename)) {
                    $image =  $filename;
                    $img_type = $_FILES['ppimage']['type'];
                } else {
                    $error++;
                    $std_img_err = 'Upload failed';
                }
            } else {
                $error++;
                $std_img_err = "File type must be jpeg/png/svg/bmp";
            }
        } else {
            $error++;
            $std_img_err = "Your image is too big in size";
        }
    } else {
        $error++;
        $std_img_err = "File upload error";
    }
}
?>