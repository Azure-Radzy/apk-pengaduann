<?php
$nama_petugas     = $_POST['nama_petugas'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$telp  = $_POST['telp'];
$level = $data['level']=="petugas";

include '../koneksi.php';

$sql = "INSERT INTO petugas ( nama_petugas, username, pass, telp, level) VALUES('$nama_petugas', '$username', '$pass', '$telp', 'petugas')";

$query = mysqli_query($conn, $sql);

if($query){
    echo"<script>alert('anda berhasil mendaftar!'); window.location.assign('admin.php');</script>";
}else{
    echo"<script>alert('maaf anda tidak berhasil mendaftar!'); window.location.assign('register2.php');</script>";
}
