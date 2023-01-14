<?php
include '../templates/partials/sidebar.php';

$sql = "SELECT iuran.*, iuran.keterangan as iuran_keterangan, warga.nama as user_nama from iuran join users on users.id = iuran.warga_id join warga on warga.warga_id = iuran.warga_id order by tanggal desc";

if ($_SESSION['role'] == 'user') {
    $user_id = $_SESSION['id'];
    $sql = "SELECT iuran.*, iuran.keterangan as iuran_keterangan, warga.nama as user_nama from iuran join users on users.id = iuran.warga_id join warga on warga.warga_id = iuran.warga_id where iuran.warga_id = $warga_id order by tanggal desc";
}
$query_iuran = mysqli_query($conn, $sql);

if (!empty($_POST)) {
    $keterangan = $_POST['keterangn'] ?? null;
    $tanggal = date("Y-m-d");
    $bulan = $_POST['bulan'] ?? null;
    $tahun = $_POST['tahun'] ?? null;
    $jumlah = $_POST['jumlah'] ?? null;
    $warga_id = $_POST['warga_id'] ?? null;
    if ($_SESSION['role'] == 'user') {
        $warga_id = $_SESSION['id'];
    }else{
        $warga_id = $_POST['warga_id'] ?? null;
    }
    $id = $_POST['id'] ?? null;

    if (isset($_POST['save'])) {
        mysqli_query($conn, "INSERT INTO iuran VALUES('','$keterangan', '$tanggal', '$bulan', '$tahun', '$jumlah', '$warga_id')");
    }
    if (isset($_POST['update'])) {
        mysqli_query($conn, "UPDATE iuran SET keterangan='$keterangan', tanggal='$tanggal', bulan='$bulan', tahun='$tahun', jumlah='$jumlah', warga_id='$warga_id' WHERE id = $id");
    }
    if (isset($_POST['delete'])) {
        mysqli_query($conn, "DELETE FROM iuran WHERE id = $id");
    }
    header("location:../iuran");
}

include 'view.php';
include '../templates/partials/footer.php';
