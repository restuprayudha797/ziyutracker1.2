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
														<th class="wd-15p border-bottom-0">Tanggal</th>
														<th class="wd-10p border-bottom-0">Aktifasi</th>
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
												</div>
												<div class="tab-pane fade p-0" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
												<?php $i = 1;?>
												<?php foreach ($aktif_user as $usrA) : ?>
													<tr>
														<td><?= $usrA['email']?></td>
														<td><div class="material-switch pull-right">
															<input id="someSwitchOptionDefault" name="someSwitchOption00<?= $i++;?>" type="checkbox" />
															<label for="someSwitchOptionDefault" class="label-default"></label>
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
														<td><div class="material-switch pull-right">
															<input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox" />
															<label for="someSwitchOptionDefault" class="label-default"></label>
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