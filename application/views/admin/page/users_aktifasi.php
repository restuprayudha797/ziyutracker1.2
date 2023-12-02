<!-- row opened -->
<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Sample Data Table</div>
										<div class="card-options">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive ">
											<table id="example-2" class="table table-striped table-bordered text-nowrap">
												<thead>
													
													<tr>
														<th class="wd-15p border-bottom-0">Nama</th>
														<th class="wd-15p border-bottom-0">Email</th>
													</tr>
												</thead>
												<tbody>
												<?php foreach ($users as $usrs) : ?>
													<tr>
														<td><?= $usrs['name']?></td>
														<td><?= $usrs['email']?></td>
														<td><?= $usrs['phone']?></td>
														<td><?= date('d F Y',$usrs['date_created'])?></td>
														<td><?php 
															if ($usrs['is_active'] == 1) {
																echo 'Belum Aktifasi';
															}elseif ($usrs['is_active'] == 2) {
																echo 'Belum Melakukan Pembayaran';
															}elseif ($usrs['is_active'] == 3) {
																echo 'Sudah Melakukan Pembayaran(Aktif)';
															}elseif ($usrs['is_active'] == 4) {
																echo 'Sudah Melakukan Pembayaran(Tidak Aktif)';
															}elseif ($usrs['is_active'] == 5) {
																echo 'Admin(Aktif)';
															}elseif ($usrs['is_active'] == 6) {
																echo 'Admin(Tidak Aktif)';
															}
														?></td>
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
						<!-- row closed -->