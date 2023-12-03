<!-- row opened -->
<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Sample Data Table</div>
										<div class="card-options">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive ">
											<table id="example-2" class="table table-striped table-bordered text-nowrap">
												<thead>
													<tr>
														<th class="wd-15p border-bottom-0">Email</th>
														<th class="wd-15p border-bottom-0">Tanggal Pembayaran</th>
														<th class="wd-20p border-bottom-0">Status</th>
														<th class="wd-15p border-bottom-0">Bukti Pembayaran</th>
														<th class="wd-10p border-bottom-0">Aksi</th>
													</tr>
												</thead>
												<tbody>
                                                <?php foreach ($payment as $pay) : ?>
													<tr>
														<td><?= $pay['email']?></td>
														<td><?= date('d F Y',$pay['payment_date'])?></td>
														<td><?php 
															if ($pay['role_payment'] == 1) {
																echo 'Belum Aktifasi';
															}elseif ($pay['role_payment'] == 2) {
																echo 'Belum Melakukan Pembayaran';
															}elseif ($pay['role_payment'] == 3) {
																echo 'Sudah Melakukan Pembayaran(Aktif)';
															}
														?></td>
                                                        <td><img src="<?= base_url('assets/proof_of_payment/') . $pay['proof_of_payment']?>" alt=""></td>
													</tr>
												<?php endforeach ;?>
												</tbody>
											</table>
										</div>
									</div>
									<!-- table-wrapper -->
								</div>
								<!-- section-wrapper -->
							</div>
						</div>
						