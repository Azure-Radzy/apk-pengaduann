<?php
include 'koneksi.php';


$id = $_GET['id'] ?? null;


if (empty($id)) {
    echo "<script>alert('ID Pengaduan tidak ditemukan!'); window.location.assign('?url=lihat-pengaduan');</script>";
    exit;
}


$id = mysqli_real_escape_string($conn, $id);


$deleteTanggapan = "DELETE FROM tanggapan WHERE id_pengaduan = '$id'";
if (!mysqli_query($conn, $deleteTanggapan)) {
    echo "Error saat menghapus data di tabel tanggapan: " . mysqli_error($conn);
    exit;
}


$sql = "DELETE FROM pengaduan WHERE id_pengaduan = '$id'";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Laporan berhasil dihapus!'); window.location.assign('masyarakat.php?url=lihat-pengaduan');</script>";
} else {
    echo "Error saat menghapus data di tabel pengaduan: " . mysqli_error($conn);
}
?>
