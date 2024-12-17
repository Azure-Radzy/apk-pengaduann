<?php

$nik  = $_POST['nik'];
$pass = $_POST['pass'];

include 'koneksi.php';

$sql   = "SELECT*FROM masyarakat WHERE nik = '$nik' AND pass = '$pass'";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query)>0){
    session_start();
    $_SESSION['nik'] = $nik;
    $data = mysqli_fetch_array($query);
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['username'] = $data['username'];

    header("Location:masyarakat.php");
}else{
    echo "<script>alert('anda gagal login'); window.location.assign('login.php');</script>";
}