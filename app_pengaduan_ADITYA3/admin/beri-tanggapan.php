<?php
session_start();
include '../koneksi.php';


if (!isset($_SESSION['id_petugas'])) {
    echo "<script>alert('Anda harus login terlebih dahulu.'); window.location.assign('login2.php');</script>";
    exit;
}

$id = $_GET['id_pengaduan'] ?? null;

$id = isset($_GET['id']) ? intval($_GET['id']) : 0; 


if ($id > 0) {
    $query = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id_pengaduan = $id");
    
    if ($query) {

    } else {

        echo "Error: " . mysqli_error($conn);
    }
} else {

    echo "Invalid ID!";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tgl_tanggapan = date('Y-m-d');
    $tanggapan = $_POST['tanggapan'];
    $id_petugas = $_SESSION['id_petugas'];


    $stmt = $conn->prepare("INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $id, $tgl_tanggapan, $tanggapan, $id_petugas);

    if ($stmt->execute()) {

        mysqli_query($conn, "UPDATE pengaduan SET status = 'Selesai' WHERE id_pengaduan = '$id'");

        echo "<script>alert('Tanggapan berhasil disimpan.'); window.location.assign('admin.php');</script>";
    } else {
        echo "<script>alert('Gagal menyimpan tanggapan.'); window.location.assign('admin.php?id=$id');</script>";
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beri Tanggapan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Beri Tanggapan</h2>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="tgl_tanggapan" class="form-label">Tanggal Tanggapan</label>
                    <input type="text" class="form-control" value="<?= $tgl_tanggapan = date('Y-m-d'); ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="tanggapan" class="form-label">Tanggapan</label>
                    <textarea class="form-control" id="tanggapan" name="tanggapan" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Tanggapan</button>
                <a href="admin.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
