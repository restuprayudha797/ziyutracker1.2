<div class="row p-4">
  <div class="col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <div class="card-title"></div><?= $title ?>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="example" class="table table-bordered key-buttons text-nowrap">
            <thead>
              <tr>
                <th class="wd-15p border-bottom-0">Nama</th>
                <th class="wd-15p border-bottom-0">Email</th>
                <th class="wd-20p border-bottom-0">No Tlp</th>
                <th class="wd-20p border-bottom-0">Alamat</th>
                <th class="wd-15p border-bottom-0">Tanggal</th>
                <th class="wd-10p border-bottom-0">Aktifasi</th>
                <th class="wd-10p border-bottom-0">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $row) : ?>
                <tr>
                  <td><?= $row['name'] ?></td>
                  <td><?= $row['email'] ?></td>
                  <td><?= $row['phone'] ?></td>
                  <td><?= $row['alamat'] ?></td>
                  <td><?= date('d F Y', $row['date_created']) ?></td>
                  <td><?php
                      if ($row['is_active'] == 1) {
                        echo 'BELUM MELAKUKAN AKTIFASI';
                      } elseif ($row['is_active'] == 2) {
                        echo 'Belum MELAKUKAN PEMBAYARAN';
                      } elseif ($row['is_active'] == 3) {
                        echo 'AKTIF';
                      } elseif ($row['is_active'] == 4) {
                        echo 'TIDAK AKTIF)';
                      } elseif ($row['is_active'] == 5) {
                        echo 'ADMIN';
                      } elseif ($row['is_active'] == 6) {
                        echo 'TIDAK AKTIF';
                      }
                      ?></td>
                  <td>
                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
                      <button type="button" class="btn btn-info mt-1" data-toggle="modal" data-target="#modal<?= $row['phone'] ?>"><i class="fa fa-eye-slash"></i></button>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- ============================  start modal data user ============================ -->
<?php foreach ($users as $row) : ?>
  <div class="modal fade" id="modal<?= $row['phone'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="example-Modal2">AJUKAN PENAMBAHAN DEVICES BARU</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('admin/pembayaran/tambah_pay/') ?>" method="post">
            <div class="row">
              <div class="col-md-6">
                <table>
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $row['name'] ?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><?= $row['email'] ?></td>
                  </tr>
                  <tr>
                    <td>No Telephone</td>
                    <td>:</td>
                    <td><?= $row['phone'] ?></td>
                  </tr>
                </table>
                <input type="hidden" name="email" value="<?= $row['email'] ?>">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" onclick="confirm('Yakin ingin menambahkan pengajuan devices baru untuk user ini')" class="btn btn-success">AJUKAN SEKARANG</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>
<!-- ============================ end modal data user ============================ -->

<?= $this->session->flashdata('user_message') ?>

