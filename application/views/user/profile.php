<!-- row opened -->
<div class="row">
    <div class="col-lg-5 col-xl-4 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit Password <span class="badge bg-warning bade-primary">Cooming Soon</span></div>
            </div>
            <div class="card-body">
                <div class="d-flex mb-3">
                    <img alt="User Avatar" class="rounded-circle avatar-lg mr-2" src="<?= base_url('assets/root') ?>/icon/user_default.png">
                    <div class="ml-auto mt-xl-2 mt-lg-0 ml-lg-2">
                        <a href="#" class="btn btn-primary btn-sm mt-1 mb-1"><i class="fe fe-camera mr-1"></i>Edit profile</a>
                        <a href="#" class="btn btn-danger btn-sm mt-1 mb-1"><i class="fe fe-camera-off mr-1"></i>Delete profile</a>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Password Lama</label>
                    <input type="password" class="form-control" placeholder="Masukkan Password Lama" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Password Baru</label>
                    <input type="password" class="form-control" placeholder="Masukkan Password Baru" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" class="form-control" placeholder="Konfirmasi Password" required>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="#" class="btn btn-primary">UBAH SEKARANG</a>
                <a href="#" class="btn btn-danger">BATALKAN</a>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-xl-8 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Profile</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputname">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama" value="<?= $user['name'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat Email</label>
                    <input type="email" class="form-control" readonly placeholder="Masukkan Alamat Email" value="<?= $user['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputnumber">Nomer Telephone</label>
                    <input type="number" disabled class="form-control" placeholder="Masukkan Nomer Telephone" value="<?= $user['phone'] ?>">
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-success mt-1">SIMPAN</a>
                <a href="#" class="btn btn-danger mt-1">BATALKAN</a>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
<div class="row">

    <?php $devices_active = $this->db->get_where('devices_active', ['email' => $this->session->userdata('email')])->result_array();

    $totalDataDevice = count($devices_active);

    ?>

    <?php if ($totalDataDevice != 1) : ?>

        <div class="col-lg-5 col-xl-4 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Perangkat</div>
                </div>
                <div class="card-body">
                    <div class="d-flex mb-3">

                    </div>

                    <?php
                    $i = 1;
                    foreach ($devices_active as $row) : ?>
                        <form action="<?= base_url('user/profile/updateProfile/' . $row['id_active']) ?>" method="post">
                            <div class="form-group">
                                <label class="form-label">Perangkat <?= $i ?>
                                </label>
                                <div class="d-flex">
                                    <input type="text" class="form-control" name="devices_name" placeholder="Masukkan Nama Perangkat" value="<?= $row['device_name'] ?>"><button type="submit" class="btn btn-success ml-1">Edit</button>
                                </div>
                            </div>
                        </form>
                        <?php $i++ ?>
                    <?php endforeach ?>



                </div>
            </div>
        </div>
    <?php endif ?>

    <div class="col-lg-7 col-xl-8 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Perangkat</h3>
            </div>
            <div class="card-body">
                <!-- <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="exampleInputname">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama" value="<?= $user['name'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat Email</label>
                    <input type="email" class="form-control" readonly placeholder="Masukkan Alamat Email" value="<?= $user['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputnumber">Nomer Telephone</label>
                    <input type="number" disabled class="form-control" placeholder="Masukkan Nomer Telephone" value="<?= $user['phone'] ?>">
                </div> -->
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="alert alert-warning">
                            <strong>PEMBERITAHUAN</strong>
                            <hr class="message-inner-separator">
                            <p>Untuk saat ini penambaham perangkat hanya dapat dilakukan oleh admin, silahkan klik tombol TAMBAH PERANGKAT jikan ingin menambahkan perangkat sekarang ! </p>
                        </div>
                    </div>
                </div>


            </div>
            <div class="card-footer">
                <a href="https://api.whatsapp.com/send?phone=+6285176929114&text=SAYA%20INGIN%20MENAMBAHKAN%20PERANGKAT%20SEKARANG" target="_BLANK" class="btn btn-success mt-1">TAMBAH PERANGKAT</a>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->

<?= $this->session->flashdata('profile_message') ?>