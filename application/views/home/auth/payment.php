<?php

// function of displaying the day using Indonesian
function hari_ini()
{
  $hari = date("D");

  switch ($hari) {
    case 'Sun':
      $hari_ini = "Minggu";
      break;

    case 'Mon':
      $hari_ini = "Senin";
      break;

    case 'Tue':
      $hari_ini = "Selasa";
      break;

    case 'Wed':
      $hari_ini = "Rabu";
      break;

    case 'Thu':
      $hari_ini = "Kamis";
      break;

    case 'Fri':
      $hari_ini = "Jumat";
      break;

    case 'Sat':
      $hari_ini = "Sabtu";
      break;

    default:
      $hari_ini = "Tidak di ketahui";
      break;
  }

  return "<b>" . $hari_ini . "</b>";
}

// function displays time / date using Indonesian
function tgl_indo($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

// Check whether the user has sent proof of payment
$PAYMENT_DATA = $this->db->get_where('payment', ['email' => $this->session->userdata('email')])->row_array();

?>
<!-- ====== Banner Start ====== -->
<section class="ud-page-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="ud-banner-content">
          <h1 class="wow fadeInUp" data-wow-delay=".2s"><?= $title; ?> 💵</h1>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Banner End ====== -->
<!-- ====== Payment Start ====== -->
<section>
  <div class="row justify-content-center my-5">
    <div class="col-lg-6">
      <?php if (!empty($PAYMENT_DATA)) : ?>
        <div class="card text-center mt-4">
          <div class="card-header">
            Bukti Pembayaran Berhasil Dikirim
          </div>
          <div class="card-body">
            <h5 class="card-title">Terimakasih Telah melakukan
              pembayaran</h5>
            <p class="card-text">Proses membutuhkan waktu selama 1x24 jam untuk
              melakukan konfirmasi pembayaran, informasi selanjutnya akan kami kirim Kepada Email anda:
              <b> <?= $user['email'] ?></b>
            </p>
            <a href="#" class="badge bg-primary"><i class=""></i> Whatsapp Admin</a>
          </div>
          <div class="card-footer text-muted">
            Terimakasih telah menggunakan produk kami
          </div>
        </div>
      <?php else : ?>
        <div class="ud-login-logo text-center mb-3 border border-2">
          <div class="head-invoice">
            <img src="<?= base_url('assets/home/images/banner/head-invoice.png') ?>" width="100%" alt="head-invoice">
          </div>
          <div class="header-content mt-3 p-3" align="left">
            <div class="row">
              <b>Kepada : <p><?= $user['name'] ?></p></b>
              <b>Tanggal : <p><?= hari_ini() ?>, <?= tgl_indo(date('Y-m-d')); ?></p></b>
            </div>
          </div>
          <div class="header-content mt-3 p-3 ">
            <div class="table" style="overflow: auto;">
              <table class="table table-striped table-hover">
                <tr>
                  <td align="left">
                    <h5>Keterangan</h5>
                  </td>
                  <td>
                    <h5>Harga</h5>
                  </td>
                  <td>
                    <h5>Jumlah </h5>
                  </td>
                  <td align="right">
                    <h5>Total</h5>
                  </td>
                </tr>
                <tr>
                  <td align="left">Hardware (GPS)</td>
                  <td>300.000</td>
                  <td>1</td>
                  <td align="right">350.000</td>
                </tr>
                <tr>
                  <td align="left">Pemasangan</td>
                  <td>Gratis</td>
                  <td>1x</td>
                  <td align="right">0</td>
                </tr>
              </table>
            </div>
            <div class="sub-total mt-4 mb-4">
              <h5 align="right">SUB TOTAL : Rp 350.000</h5>
              <h5 align="right"><b>TOTAL : </b> Rp 350.000</h5>
            </div>
            <div class="footer-invoice mt-5" align="left">
              <b class="text-dark">PEMBAYARAN :</b>
              <P class="text-dark">Nama : Zidan Rafif Pratama </P>
              <P class="text-dark">No Dana : 0812 7078 7806 </P>
            </div>
            <h2 class="mt-5 mb-4">TERIMAKASIH</h2>
          </div>
        </div>
        <div class="container collapse-state mt-5 text-center">
          <div class="d-grid gap-2 d-md-block">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#transfer-dana" aria-expanded="false" aria-controls="payOnTheSpot">
              Transfer Dana
            </button>
            <button class="btn btn-danger" onclick="askUsers()">
              Bayar Ditempat
            </button>
          </div>
          <div class="collapse mt-3" id="transfer-dana">
            <div class="card card-body">
              <div class="alert alert-primary">
                <div class="row">
                  <div class="col-md-5">
                    TRANSFER DANA :
                  </div>
                  <div class="col-md-5">
                    0812 7078 7806 (ZIDAN RAFIF PRATAMA)
                  </div>
                </div>
              </div>
              <?= form_open_multipart('bayar'); ?>
              <div class="ud-form-group mt-3">
                <div class="image-upload">
                  <input type="file" name="proof_of_payment" id="logo" onchange="fileValue(this)" required>
                  <label for="logo" class="upload-field" id="file-label">
                    <div class="file-thumbnail">
                      <img id="image-preview" src="https://www.btklsby.go.id/images/placeholder/basic.png" alt="Empty Image">
                      <h3 id="filename" class="my-2">
                        Tarik dan Lepas disini
                      </h3>
                    </div>
                  </label>
                </div>
                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary">Kirim Bukti</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
        <div class="alert">
          <p>
            <strong class="text-danger">*Catatan </strong>Gambar yang dapat diupload harus berupa format <b>JPG,JPEG,PNG,DAN PDF</b>, dan klik bayar ditempat jika anda ingin melakukan pembayaran secara cash<br>
          </p>
        </div>
      <?php endif; ?>
    </div>
  </div>

</section>
<!-- ====== Payment End ====== -->
<?= $this->session->flashdata('auth_message') ?>
