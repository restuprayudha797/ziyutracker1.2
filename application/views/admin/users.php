<div class="row">
	<div class="col-md-12">
		<div class="card overflow-hidden">
			<div class="card-header">
				<h3 class="card-title">Data User</h3>
			</div>
			<div class="card-body">
				<div class="myTab">
					<ul class="nav  nav-tabs m-0" id="myTab" role="tablist">
						<!-- <li class="nav-item ">
							<a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">All</a>
						</li> -->
						<!-- <li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" class="d" role="tab" aria-controls="profile" aria-selected="false">Users</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Admin</a>
						</li> -->
					</ul>
					<div class="tab-content  p-3 " id="myTabContent">
						<div class="tab-pane fade p-0 active show" id="home" role="tabpanel" aria-labelledby="home-tab">
							<!-- row opened -->
							<!-- LOAD TABLE -->
							<?php $this->load->view('admin/data-user'); ?>

							<!-- row closed -->
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
											<?php $i = 1; ?>
											<?php foreach ($aktif_user as $usrA) : ?>
												<tr>
													<td id="id"><?= $usrA['email'] ?></td>
													<td>
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox" role="switch">
														</div>
													</td>

												</tr>
											<?php endforeach; ?>
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
													<td><?= $admA['email'] ?></td>
													<td>
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
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
			</div>
		</div>
	</div>
</div>