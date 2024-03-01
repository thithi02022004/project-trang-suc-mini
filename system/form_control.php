<?php
function validateEmail($email)
{
    $validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$validEmail) {
        return false; // Invalid email format
    }

    $domain = explode('@', $email)[1];
    return checkdnsrr($domain, 'MX');
}
function validatePassword($password, $repassword = null)
{
    $errors = [];

    if (empty($password)) {
        $errors[] = "Vui lòng nhập mật khẩu.";
    }

    if ($repassword !== null && $password !== $repassword) {
        $errors[] = "Mật khẩu nhập lại không khớp.";
    }

    if (strlen($password) < 8) {
        $errors[] = "Mật khẩu phải có ít nhất 8 ký tự.";
    }

    // Kiểm tra có ít nhất một chữ cái viết hoa, một chữ cái viết thường, một số và một ký tự đặc biệt
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#\$%\^&\*\(\)_\+\-=\[\]\{\};:\'",<>\.\?\/\\|`~])/', $password)) {
        $errors[] = "Mật khẩu phải có ít nhất một chữ cái viết hoa, một chữ cái viết thường, một số và một ký tự đặc biệt.";
    }

    return $errors;
}
