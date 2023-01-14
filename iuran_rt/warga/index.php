<?php
include '../templates/partials/sidebar.php';

$sql = "SELECT * FROM warga";
$query_warga = mysqli_query($conn, $sql);


if (!empty($_POST)) {
    $nik = $_POST['nik'] ?? null;
    $nama = $_POST['nama'] ?? null;
    $kelamin = $_POST['kelamin'] ?? null;
    $alamat = $_POST['alamat'] ?? null;
    $no_rumah = $_POST['no_rumah'] ?? null;
    $status = $_POST['status'] ?? null;
    $id = $_POST['id'] ?? null;

    if (isset($_POST['save'])) {
        mysqli_query($conn, "INSERT INTO warga VALUES('','$nik', '$nama', '$kelamin', '$alamat', '$no_rumah', '$status)");
    }
    if (isset($_POST['update'])) {
        mysqli_query($conn, "UPDATE warga SET nik='$nik', nama='$nama', kelamin='$kelamin', alamat='$alamat', no_rumah='$no_rumah', status='$status' WHERE id = $id");
    }
    if (isset($_POST['delete'])) {
        mysqli_query($conn, "DELETE FROM warga WHERE id = $id");
    }
    header("location:../warga");
}

include 'view.php';
include '../templates/partials/footer.php';
