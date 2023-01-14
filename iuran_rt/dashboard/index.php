<?php
include '../templates/partials/sidebar.php';

$sql = "SELECT * from users";
$query_user = mysqli_query($conn, $sql);
$count_user = mysqli_num_rows($query_user);

$sql = "SELECT * from iuran";
if ($_SESSION['role'] == 'user') {
    $user_id = $_SESSION['id'];
    $sql = "SELECT * from iuran where iuran.users_id = $user_id";
}

$query_iuran = mysqli_query($conn, $sql);
$count_iuran = mysqli_num_rows($query_iuran);

$sql = "SELECT * from warga";
$query_warga = mysqli_query($conn, $sql);
$count_warga = mysqli_num_rows($query_warga);

include 'view.php';
include '../templates/partials/footer.php';
