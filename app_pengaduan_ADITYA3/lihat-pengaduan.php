

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Laporan Anda</h6>
            </div>
            <div class="card-body" style="font-size: 14px;">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>tanggal Pengaduan</th>
                      <th>Nik</th>
                      <th>Isi Laporan</th>
                      <th>foto </th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>No</th>
                      <th>tanggal Pengaduan</th>
                      <th>Nik</th>
                      <th>Isi Laporan</th>
                      <th>foto </th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                    include 'koneksi.php';
                    $sql = "SELECT*FROM pengaduan WHERE nik='$_SESSION[nik]' ORDER BY id_pengaduan DESC";
                  $query = mysqli_query($conn, $sql);
                  $no = 1;
                  while ($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$data['tgl_pengaduan'];?></td>
                      <td><?=$data['nik'];?></td>
                      <td><?=$data['isi_laporan'];?></td>
                      <td><?=$data['foto'];?></td>
                      <td><?=$data['status'];?></td>
                      <td>
                      <a href="?url=detail-pengaduan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-primary btn-icon-split" style="margin: 2px;">
                        <span class="icon text-white-5">
                        <i class="fa fa-info"></i>
                        </span>
                        <span class="text">Detail</span>
                        </a>
                        <a href="?url=prodelete&id=<?= $data['id_pengaduan'] ?>" class="btn btn-info btn-icon-split" style="margin: 2px;">
                        <span class="icon text-white-5">
                        <i class="fa fa-info"></i>
                        </span>
                        <span class="text">Hapus</span>
                        </a>
                        <a href="?url=lihat-tanggapan&id=<?= $data['id_pengaduan'] ?>" class="btn btn-info btn-icon-split" style="margin: 2px;">
                        <span class="icon text-white-5">
                        <i class="fa fa-info"></i>
                        </span>
                        <span class="text">Tanggapan</span>
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

       