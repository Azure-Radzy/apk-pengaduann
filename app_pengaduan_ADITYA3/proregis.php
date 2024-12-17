<?php

$nik      = $_POST['nik'];
$nama     = $_POST['nama'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$telp  = $_POST['telp'];

include 'koneksi.php';

$sql = "INSERT INTO masyarakat (nik, nama, username, pass, telp) VALUES('$nik', '$nama', '$username', '$pass', '$telp')";

$query = mysqli_query($conn, $sql);

if($query){
    echo"<script>alert('anda berhasil mendaftar!'); window.location.assign('login.php');</script>";
}else{
    echo"<script>alert('maaf anda tidak berhasil mendaftar!'); window.location.assign('register.php');</script>";
}
