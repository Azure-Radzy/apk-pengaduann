<?php

include '../koneksi.php';



if (!isset($_SESSION['id_petugas'])) {
    echo "<script>alert('Anda harus login terlebih dahulu.'); window.location.assign('login2.php');</script>";
    exit;
}

$query = "SELECT * FROM pengaduan ORDER BY tgl_pengaduan DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pengaduan</title>
</head>
<body>
<div class="card shadow mb-4">
<div class="card-header py-3">
<div class="container mt-2" style="font-size: 14px;">
<h6 class="m-0 font-weight-bold text-primary">Daftar Laporan</h6>
    <div class="card-header">
        <a href="export.php" class="btn btn-primary btn-icon-split" >
            <span class="text">Export Data</span>
        </a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pengaduan</th>
                <th>NIK</th>
                <th>Isi Laporan</th>
                <th>Verifikasi</th>
                <th>Action</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $data['tgl_pengaduan']; ?></td>
                    <td><?= $data['nik']; ?></td>
                    <td><?= $data['isi_laporan']; ?></td>
                    <td>
                        <form method="POST" action="update_status.php">
                            <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan']; ?>">
                            <select name="status" class="btn btn-primary btn-sm" onchange="this.form.submit()">
                                <option value="Pending" <?= $data['status'] == 'Menunggu' ? 'selected' : ''; ?>>Menunggu</option>
                                <option value="Proses" <?= $data['status'] == 'Proses' ? 'selected' : ''; ?>>Proses</option>
                                <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : ''; ?>>Selesai</option>
                            </select>
                        </form>
                    </td>
                    <td>
                      <a href="beri-tanggapan.php?id=<?= $data['id_pengaduan']; ?>" class="btn btn-primary btn-sm" style="margin: 2px;">Beri Tanggapan</a>
                      <a href="?url=detail-tanggapan2&id=<?= $data['id_pengaduan'] ?>" class="btn btn-primary btn-sm">
                        <span class="icon text-white-5">
                        <i class="fa fa-info"></i>
                        </span>
                        <span class="text">Detail</span>
                        </a>
                        <td><?=$data['status'];?></td>
                    </td>
                </tr>
                
                <?php
            }
            ?>
                
        </tbody>
    </table>
</div>
</div>
</div>
</body>
</html>
