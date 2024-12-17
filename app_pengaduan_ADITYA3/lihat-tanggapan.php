<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: masyarakat.php");
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM pengaduan 
                              LEFT JOIN tanggapan 
                              ON pengaduan.id_pengaduan = tanggapan.id_pengaduan 
                              WHERE pengaduan.id_pengaduan = '$id'");

if (!$query) {
    die("Query Error: " . mysqli_error($conn));
}

$data = mysqli_fetch_assoc($query);
?>

<div class="card-shadow">
    <div class="card-header">
        <a href="?url=lihat-pengaduan" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-5">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card-body">
        <?php if (!$data || !$data['tanggapan']) : ?>
            <div class="alert alert-danger">Pengaduan Anda belum ditanggapi</div>
        <?php else : ?>
            <form method="post" action="propengaduan.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Tanggal Pengaduan</label>
                    <input type="text" name="tgl_tanggapan" class="form-control" readonly value="<?= $data['tgl_tanggapan']; ?>">
                </div>
                <div class="form-group">
                    <label>Tanggapan</label>
                    <script src="https://cdn.tiny.cloud/1/uw6sctw86pieiay7ghbdf3akttfg6xkx2bjynoib3626ojr2/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    menubar: false, // Hilangkan menu dropdown
    toolbar: 'bold italic underline | alignleft aligncenter alignright', // Atur toolbar
    plugins: 'autolink lists link', // Tambahkan plugin sesuai kebutuhan
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap ',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
   
  });
</script>
                    <textarea name="tanggapan" id="tanggapan" required><?= $data['tanggapan']; ?></textarea>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>
