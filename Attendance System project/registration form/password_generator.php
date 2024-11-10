<?php
function generate_pwd($length = 8) {
    $pwd_char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_-+.?";
    $pwd_charLength = strlen($pwd_char);
    $pwd = '';

    do {
        $pwd = '';
        for ($i = 0; $i < $length; $i++) {
            $pwd .= $pwd_char[rand(0, $pwd_charLength - 1)];
        }
    } while (!isPasswordUnique($pwd)); // Check the password is unique

    return $pwd;
}

function isPasswordUnique($pwd) {
    return true;
}
$password = generate_pwd();
?>
