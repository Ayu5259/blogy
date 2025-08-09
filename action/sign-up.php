<?php
require_once('../config/loader.php');

if (isset($_POST['signup'])) {
    try {
        // دریافت ورودی‌ها
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $mobile = trim($_POST['mobile']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

        // اعتبارسنجی ورودی‌ها
        if (empty($username) || empty($password) || empty($mobile) || !$email) {
            header('Location: ../index.php?signup=invalid');
            exit;
        }

        // بررسی تکراری نبودن کاربر
        $checkQuery = "SELECT * FROM users WHERE username = ? OR email = ? OR mobile = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->execute([$username, $email, $mobile]);

        if ($checkStmt->rowCount() > 0) {
            header('Location: ../index.php?signup=duplicate');
            exit;
        }

        // هش کردن رمز عبور
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // درج کاربر جدید
        $query = "INSERT INTO users (username, password, mobile, email, role, created_at) VALUES (?, ?, ?, ?, 'user', NOW())";
        $stmt = $conn->prepare($query);
        $stmt->execute([$username, $hashedPassword, $mobile, $email]);

        header('Location: ../index.php?signup=success');
        exit;
    } catch (PDOException $e) {
        error_log("Signup error: " . $e->getMessage());
        header('Location: ../index.php?signup=error');
        exit;
    }
}
