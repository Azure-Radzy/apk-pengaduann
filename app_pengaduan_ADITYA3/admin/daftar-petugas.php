

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
                    <th>Nama Petugas</th>
                    <th>Username</th>
                    <th>Hapus</th>
                  </thead>
                  <tbody>
                    <?php
                    include '../koneksi.php';
                    $sql = "SELECT*FROM petugas WHERE level = 'petugas' ORDER BY level DESC";
                  $query = mysqli_query($conn, $sql);
                  $no = 1;
                  while ($data = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                      <td><?=$no++;?></td>
                      <td><?=$data['nama_petugas'];?></td>
                      <td><?=$data['username'];?></td>
                      <td>    
                        <a href="?url=prodelete2&id=<?= $data['id_petugas'] ?>" class="btn btn-info btn-icon-split" style="margin: 2px;">
                        <span class="icon text-white-5">
                        <i class="fa fa-trash"></i>
                        </span>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

       