<!-- row opened -->
<div class="row">
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
							<tr>
								<th class="wd-15p border-bottom-0">Email</th>
								<th class="wd-15p border-bottom-0">Tanggal Pembayaran</th>
								<th class="wd-20p border-bottom-0">Status</th>
								<th class="wd-10p border-bottom-0">Aksi</th>
							</tr>
						</thead>
						</tr>
						</thead>
						<tbody>
							<?php foreach ($payment as $pay) : ?>
								<tr>
									<td><?= $pay['email'] ?></td>
									<td><?= date('d F Y', $pay['payment_date']) ?></td>
									<td><?php
											if ($pay['role_payment'] == 1) {
												echo 'PENDING';
											} elseif ($pay['role_payment'] == 2) {
												echo 'BERHASIL';
											} elseif ($pay['role_payment'] == 3) {
												echo 'DITOLAK';
											}
											?></td>
									<td>
										<div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
											<button type="button" class="btn btn-info mt-1" data-toggle="modal" data-target="#modal<?= $pay['id_payment'] ?>"><i class="fa fa-eye-slash"></i></button>
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

<?php foreach ($payment as $pay) : ?>
	<div class="modal fade" id="modal<?= $pay['id_payment'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="example-Modal2">Konfirmasi Pembayaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-9">
							<table>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?= $pay['name'] ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?= $pay['email'] ?></td>
								</tr>
								<tr>
									<td>No Telephone</td>
									<td>:</td>
									<td><?= $pay['phone'] ?></td>
								</tr>
								<tr>
									<td>Tanggal Pembayaran</td>
									<td>:</td>
									<td><?= date('d F Y', $pay['payment_date']) ?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-3">
							<img style="heigth:100px; width:200px;" src=" <?= base_url('assets/proof_of_payment/') . $pay['proof_of_payment'] ?>" alt="">
						</div>
					</div>
					<div class="modal-footer">
						<?php if ($pay['role_payment'] == 1) : ?>
							<a href="<?= base_url('admin/pembayaran/Prosess_Data/cancel/' . $pay['id_payment']) ?>" class="btn btn-danger">
								BATALKAN
							</a>
							<a href="<?= base_url('admin/pembayaran/Prosess_Data/done/' . $pay['id_payment']) ?>" class="btn btn-success">
								KONFIRMASI
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<?= $this->session->flashdata('user_message') ?>
