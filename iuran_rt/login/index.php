<?php

include '../config.php';

if (isset($_SESSION['email'])) {
    header("Location: ../dashboard");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'] ?? null;
    $password = md5($_POST['password']) ?? null;

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' and status = 1";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'] == 1 ? "admin" : "user";;
        header("Location: ../dashboard");
    } else {
        echo "<script>alert('Data yang dimasukkan salah atau akun anda telah di non aktifkan!')</script>";
    }
}


include 'view.php';
