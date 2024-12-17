<?php
$username  = $_POST['username'];
$pass = $_POST['pass'];

include 'koneksi.php';

$sql   = "SELECT*FROM petugas WHERE username = '$username' AND pass = '$pass'";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query)>0){
    session_start();
    $_SESSION['username'] = $username;
    $data = mysqli_fetch_array($query);
    $_SESSION['id_petugas'] = $data['id_petugas'];
    $_SESSION['nama_petugas'] = $data['nama_petugas'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];
    if($data['level']=="admin"){
     header("Location:admin/admin.php");  

    }elseif($data['level']=="petugas"){
     header("Location:petugas/petugas.php"); 
    }


   
}else{
    echo "<script>alert('anda gagal login'); window.location.assign('login2.php');</script>";
}