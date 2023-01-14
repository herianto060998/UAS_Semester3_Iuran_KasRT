<?php
include '../templates/partials/sidebar.php';

$sql = "SELECT * FROM users";
$query_users = mysqli_query($conn, $sql);


if (!empty($_POST)) {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
    $nama = $_POST['nama'] ?? null;
    $email = $_POST['email'] ?? null;
    $status = $_POST['status'] ?? null;
    $role = $_POST['role'] ?? null;
    $id = $_POST['id'] ?? null;

    if (isset($_POST['save'])) {
        $password = md5($password);
        mysqli_query($conn, "INSERT INTO users VALUES('','$username', '$password', '$nama', '$email', '$status', '$role')");
    }
    if (isset($_POST['update'])) {
        if($password != null){
            $password = md5($password);
            mysqli_query($conn, "UPDATE users SET username='$username', password='$password', email='$email', status='$status', role='$role' WHERE id = $id");
        }else{
            mysqli_query($conn, "UPDATE users SET username='$username', email='$email', status='$status', role='$role' WHERE id = $id");
        }
       
    }
    if (isset($_POST['delete'])) {
        mysqli_query($conn, "DELETE FROM users WHERE id = $id");
    }
    header("location:../user");
}

include 'view.php';
include '../templates/partials/footer.php';
?>