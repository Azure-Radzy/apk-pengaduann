<?php
include 'koneksi.php';


$id = $_GET['id'] ?? null;


if (!isset($_SESSION['id_petugas'])) {
    echo "<script>alert('Anda harus login terlebih dahulu.'); window.location.assign('login2.php');</script>";
    exit;
}


$id = mysqli_real_escape_string($conn, $id);


$DeletePetugas = "DELETE FROM petugas WHERE id_petugas = '$id'";
if (!mysqli_query($conn, $DeletePetugas)) {
    echo "Error saat menghapus data petugas: " . mysqli_error($conn);
    exit;
}


$sql = "DELETE FROM petugas WHERE id_petugas = '$id'";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Petugas berhasil dihapus!'); window.location.assign('admin.php?url=daftar-petugas');</script>";
} else {
    echo "Error saat menghapus data petugas: " . mysqli_error($conn);
}
?>
