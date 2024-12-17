<?php include '../koneksi.php';

$id = $_GET['id'];
if(empty($id)){
  header("Location:masyarakat.php");
}

$query = mysqli_query($conn, "SELECT*FROM pengaduan WHERE id_pengaduan= '$id'");
$data = mysqli_fetch_array($query);
?>


<div class="card-shadow">
    <div class="card-header">
        <a href="?url=verifikasi" class="btn btn-primary btn-icon-split" >
            <span class="icon text-white-5">
                <i class="fa fa-arrow-left"></i>
            </span>
            <span class="text">kembali</span>
        </a>
    </div>
    <div class="card-body">
        <form method="post" action="propengaduan.php" enctype="multipart/form-data">
            <div class="form-group">
                <label>Tanggal Pengaduan</label>
                <input type="text" name="tgl_pengaduan" class="form-control" 
                readonly value="<?= $data['tgl_pengaduan']; ?>">
            </div>
            <div class="form-group">
            <label>Isi Laporan</label>
           <!-- Place the first <script> tag in your HTML's <head> -->
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
<textarea name="isi_laporan" id="isi_laporan" required><?= $data['isi_laporan']; ?>
 
</textarea>

<div class="form-group">
                <label>Foto</label>
                <img class="img-thumbnail" src="../foto/<?= $data['foto'];?>" alt="" width="300">

            </div>
        </form>
    </div>
</div>