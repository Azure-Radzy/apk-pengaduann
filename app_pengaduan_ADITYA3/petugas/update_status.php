<?php
include '../koneksi.php';
session_start();
// Periksa apakah form telah dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = htmlspecialchars($_POST['id_pengaduan']);
    $status = htmlspecialchars($_POST['status']);

    // Update status di database
    $sql = "UPDATE pengaduan SET status = '$status' WHERE id_pengaduan = '$id'";
    $query = mysqli_query($conn, $sql);

    // Redirect kembali ke halaman daftar laporan
    if ($query) {
        echo "<script>
                alert('Status berhasil diperbarui!');
                document.location.href = 'admin.php?page=daftar-laporan';
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui status!');
                document.location.href = 'admin.php?page=daftar-laporan';
              </script>";
    }
}
?>
