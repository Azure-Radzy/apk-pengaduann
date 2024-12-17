<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pengaduan Masyarakat.xls");

?>

<style>
    h1{
        font-size: 34px;
        text-align: center;
        font-weight: 300;
    }
</style>
<h1>Data Pengaduan Masyarakat</h1>
<table border="1" style="border-collapse: collapse; padding: 2px; font-size: 24px">
<thead>
<th>No</th>
<th>Tanggal</th>
<th>Nik</th>
<th>Laporan</th>
<th>Status</th>
</thead>
<tbody>
<?php
include_once"../koneksi.php";
$sql = "SELECT tgl_pengaduan, nik, isi_laporan, status FROM pengaduan";
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->store_result();  

$stmt->bind_result($tgl_pengaduan, $nik, $isi_laporan, $status);

$number = 0;
while ($stmt->fetch()) {
    echo "<tr>
            <td>" . ++$number . "</td>
            <td>" . $tgl_pengaduan . "</td>
            <td>" . $nik . "</td>
            <td>" . $isi_laporan . "</td>
            <td>" . $status . "</td>
          </tr>";
}

$stmt->close();
?>
</tbody>
</table>


</tbody>

</table>