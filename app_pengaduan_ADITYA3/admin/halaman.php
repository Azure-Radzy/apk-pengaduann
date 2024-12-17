<?php
include '../koneksi.php';
if (isset($_GET['url'])){
    switch ($_GET['url']) {
            case 'tulis-laporan';
            include 'tulis-laporan.php';
            break;

            case 'verifikasi';
            include 'verifikasi.php';
            break;

            case 'beri-tanggapan';
            include 'beri-tanggapan.php';
            break;

            case 'detail-tanggapan2':
                include 'detail-tanggapan2.php';
                break;

            case 'register2':
                include 'register2.php';
                 break;

            case 'daftar-petugas':
                include 'daftar-petugas.php';
                break;

                case 'prodelete2':
                    include 'prodelete2.php';
                    break;

        default:
          echo "halaman tidak ditemukan";
            break;
    }
}else{
    echo "Selamat Datang! <h1>". $_SESSION['nama_petugas'] ."</h1> Di Aplikasi Pelaporan Masyarakat <br> Aplikasi berbasis web ini dibuat dengan tujuan agar masyarakat bisa melaporkan keluh kesah yang dialami di lingkungan";
}
?>