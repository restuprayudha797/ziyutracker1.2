<div class="row">
							<div class="col-md-12">
								<div class="card overflow-hidden">
									<div class="card-header">
										<h3 class="card-title">Default Tabs</h3>
									</div>
									<div class="card-body">
										<div class="myTab">
											<ul class="nav  nav-tabs m-0" id="myTab" role="tablist">
												<li class="nav-item ">
													<a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">All</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Users</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Admin</a>
												</li>
											</ul>
											<div class="tab-content  p-3 border" id="myTabContent">
												<div class="tab-pane fade p-0 active show" id="home" role="tabpanel" aria-labelledby="home-tab">
												<div class="card-body">
										<div class="table-responsive ">
											<table id="example-2" class="table table-striped table-bordered text-nowrap">
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
												<?php foreach ($users as $usrs) : ?>
													<tr>
														<td><?= $usrs['name']?></td>
														<td><?= $usrs['email']?></td>
														<td><?= $usrs['phone']?></td>
														<td><?= $usrs['alamat']?></td>
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
														<td><div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
																<button type="button" class="btn btn-danger mt-1" data-toggle="modal" data-target="#modal<?= $usrs['id_payment']?>">Cek</button>
															</div></td>
													</tr>
													<div class="modal fade" id="modal<?= $usrs['id_payment']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="example-Modal2">Modal title</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">×</span>
																	</button>
																</div>
																<div class="modal-body">
																	<div class="row">
																		<div class="col-md-6">
																			<form action="<?= base_url('admin/pembayaran/tambah_payment')?>" method="post">
																			
																			<p>Email : <?= $usrs['email']?></p>
																			<input class="form-control" placeholder="Email" type="hidden" name="email" value="<?= $usrs['email']?>">	
																		</div>
																		<div class="col-md-6">
																		</div>
																	</div>
																<div class="modal-footer">
																		<button type="submit" class="btn btn-danger">
																		Tambah
																					</button>
																		
																		
																					</form>
																	
																	
																</div>
															</div>
														</div>
													</div>
												<?php endforeach ;?>	
												</tbody>
											</table>
										</div>
									</div>
												</div>
												<div class="tab-pane fade p-0" id="profile" role="tabpanel" aria-labelledby="profile-tab">
												<div class="card-body">
										<div class="table-responsive ">
											<table id="example-2" class="table table-striped table-bordered text-nowrap">
												<thead>
													
													<tr>
														<th class="wd-15p border-bottom-0">Email</th>
														<th class="wd-20p border-bottom-0" id="asu">Aksi</th>
													</tr>
												</thead>
												<tbody>
												<?php $i = 1;?>
												<?php foreach ($aktif_user as $usrA) : ?>
													<tr>
														<td id="id" ><?= $usrA['email']?></td>
														<td><div class="form-check form-switch">
														<input class="form-check-input" type="checkbox" role="switch">
													  </div></td>
														
													</tr>
												<?php endforeach ;?>	
												</tbody>
											</table>
										</div>
									</div>
												</div>
												<div class="tab-pane fade p-0 " id="contact" role="tabpanel" aria-labelledby="contact-tab">
												<div class="card-body">
										<div class="table-responsive ">
											<table id="example-2" class="table table-striped table-bordered text-nowrap">
												<thead>
													
													<tr>
														<th class="wd-15p border-bottom-0">Email</th>
														<th class="wd-20p border-bottom-0">No Tlp</th>
													</tr>
												</thead>
												<tbody>
													
												<?php foreach ($admin_aktif as $admA) : ?>
													<tr>
														<td><?= $admA['email']?></td>
														<td><div class="form-check form-switch">
														<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
													  </div></td>
													</tr>
												<?php endforeach ;?>	
												</tbody>
											</table>
										</div>
									</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>