<?php
session_start();
$tgl_pengaduan = $_POST['tgl_pengaduan'];
$nik           = $_SESSION['nik'];
$isi_laporan   = $_POST['isi_laporan'];
$lokasi_foto   = $_FILES['foto']['tmp_name'];
$nama_foto     = $_FILES['foto']['name'];
$status        = 0;

if(move_uploaded_file($lokasi_foto, 'foto/'. $nama_foto)){
    $sql = "INSERT INTO Pengaduan(tgl_pengaduan,nik,isi_laporan,foto,status) VALUES('$tgl_pengaduan','$nik','$isi_laporan','$nama_foto','$status')";

    include 'koneksi.php';
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('anda berhasil membuat laporan'); window.location.assign('masyarakat.php?url=lihat-pengaduan');</script>";
    }else{
        echo "<script>alert('anda gagal membuat laporan'); window.location.assign('masyarakat.php?url=tulis-laporan');</script>";
    }
};
