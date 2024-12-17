<?php
if (isset($_GET['url'])){
    switch ($_GET['url']) {
            case 'tulis-laporan';
            include 'tulis-laporan.php';
            break;

            case 'lihat-pengaduan';
            include 'lihat-pengaduan.php';
            break;

            case 'prodelete';
            include 'prodelete.php';
            break;

            case 'detail-pengaduan':
                include 'detail-pengaduan.php';
                break;
            case 'lihat-tanggapan';
                include 'lihat-tanggapan.php';
                break;

        default:
          echo "halaman tidak ditemukan";
            break;
    }
}else{
    echo "Selamat Datang! <h1>". $_SESSION['nama'] ."</h1> Di Aplikasi Pelaporan Masyarakat <br> Aplikasi berbasis web ini dibuat dengan tujuan agar masyarakat bisa melaporkan keluh kesah yang dialami di lingkungan";
}
?>