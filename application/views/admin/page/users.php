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
														<td><?= $usrs['is_active']?></td>
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