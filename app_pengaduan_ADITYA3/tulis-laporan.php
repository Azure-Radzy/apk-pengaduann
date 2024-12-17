<?php include 'koneksi.php'; ?>


<div class="card-shadow">
    <div class="card-header">
        <a href="masyarakat.php" class="btn btn-primary btn-icon-split" >
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
                <input type="text" name="tgl_pengaduan" class="form-control" readonly value="<?=date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
            <label>Isi Laporan</label>
           <!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/ez5yjcf0fm2f641ebiuq37dgj8ep5lntp60rpa60q1e4thb3/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

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
<textarea name="isi_laporan" id="isi_laporan" placeholder="Tulis Laporanmu Disini!">
 
</textarea>

<div class="form-group" >
                <label >Tambah Foto</label>
                <input type="file" name="foto" class="form-control" accept="image/*" required>

            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">simpan</button>
            </div>

        </form>
    </div>
</div>