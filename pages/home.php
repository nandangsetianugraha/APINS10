					<?php 
					//$nk=$connect->query("")->fetch_assoc();
					$kalendar= CAL_GREGORIAN;
					$bln = date('m');
					$thn = date('Y');
					$jhari = cal_days_in_month($kalendar,$bln,$thn);
					if($level==98 or $level==97){
						$jlak=$connect->query("select * from penempatan JOIN siswa USING(peserta_didik_id) where siswa.jk='L' and penempatan.rombel='$kelas' and penempatan.tapel='$tapel' and penempatan.smt='$smt'")->num_rows;
						$jper=$connect->query("select * from penempatan JOIN siswa USING(peserta_didik_id) where siswa.jk='P' and penempatan.rombel='$kelas' and penempatan.tapel='$tapel' and penempatan.smt='$smt'")->num_rows;
						$jtot=$jlak+$jper;
					}else{
						$jtot=$connect->query("select * from siswa where status=1")->num_rows;
						$jlak=$connect->query("select * from siswa where jk='L' and status=1")->num_rows;
						$jper=$connect->query("select * from siswa where jk='P' and status=1")->num_rows;
					};
					$jptk=$connect->query("select * from ptk where status_keaktifan_id=1")->num_rows;
					?>
					<header class="page-header">
						<h2>Beranda</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Beranda</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
					<div class="row">
						<div class="col-lg-5 col-xl-4 mb-5 mb-xl-0">
							<section class="card card-group">
										<header class="card-header bg-primary w-100">

											<div class="widget-profile-info">
												<div class="profile-picture" id="uploaded_image">
													<img src="<?= base_url(); ?>images/ptk/<?=$avatar;?>" alt="..." class="rounded-circle profile-widget-picture">
												</div>
												<div class="profile-info">
													<h4 class="name font-weight-semibold"><?=$bioku['nama'];?></h4>
													<h5 class="role"><?=$jns_ptk['jenis_ptk'];?> <?php if($level==98 or $level==97) echo $kelas; ?></h5>
													<div class="profile-footer">
														<div id="imgChange">
															<span>Ubah Foto</span>
															<input type="file" name="insert_image" id="insert_image" accept="image/*" />
															<input type="hidden" id="idptks" value="<?=$bioku['ptk_id'];?>" />
															<input type="hidden" id="urls" value="<?=base_url();?>" />
														</div>
													</div>
												</div>
											</div>

										</header>
										<?php 
											$hariini=date('Y-m-d');
											$idp=$bioku['ptk_id'];
											$nsb=$connect->query("select * from id_pegawai where ptk_id='$idp'")->fetch_assoc();
											$ida=$nsb['pegawai_id'];
											$sql2 = "SELECT *,min(left(RIGHT(tanggal, 8), 5)) jam1,MAX(left(right(tanggal, 8), 5)) jam2,if(LEAST(12600,trim(TIME_TO_SEC(TIMEDIFF(min(left(RIGHT(tanggal, 8), 5)), '07:00:00'))))>0,LEAST(12600,trim(TIME_TO_SEC(TIMEDIFF(min(left(RIGHT(tanggal, 8), 5)), '07:00:00'))))/60,'') diff1, 
											if(LEAST(14400,trim(TIME_TO_SEC(TIMEDIFF('15:45:00', MAX(left(right(tanggal, 8), 5))))))>0,LEAST(14400,trim(TIME_TO_SEC(TIMEDIFF('15:45:00', MAX(left(right(tanggal, 8), 5))))))/60,'') diff2
											FROM absensi_ptk where date(tanggal)='$hariini' and pegawai_id='$ida' group by pegawai_id";
											$jabs=$connect->query($sql2)->fetch_assoc();
										?>
										<div id="accordion" class="w-100">
											<div class="card card-accordion card-accordion-first">
												<div class="card-header border-bottom-0">
													<h4 class="card-title">
														<a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion" data-bs-target="#collapse1One">
															<i class="fas fa-check me-1"></i> Aktivitas Terakhir
														</a>
													</h4>
												</div>
												<div id="collapse1One" class="accordion-body collapse show">
													<div class="card-body">
														<section class="card card-featured-left card-featured-primary mb-3">
															<div class="card-body">
																<div class="widget-summary">
																	<div class="widget-summary-col widget-summary-col-icon">
																		<div class="summary-icon bg-primary">
																			<i class="fas fa-calendar"></i>
																		</div>
																	</div>
																	<div class="widget-summary-col">
																		<div class="summary">
																			<h4 class="title">Masuk</h4>
																			<div class="info">
																				<strong class="amount"><?=$jabs['jam1'];?></strong>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</section>
														<section class="card card-featured-left card-featured-secondary mb-3">
															<div class="card-body">
																<div class="widget-summary">
																	<div class="widget-summary-col widget-summary-col-icon">
																		<div class="summary-icon bg-secondary">
																			<i class="fas fa-calendar"></i>
																		</div>
																	</div>
																	<div class="widget-summary-col">
																		<div class="summary">
																			<h4 class="title">Keluar</h4>
																			<div class="info">
																				<strong class="amount"><?=$jabs['jam2'];?></strong>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</section>
														<ul class="widget-todo-list">
															<?php 
															if($level==11){
																$logs = $connect->query("select * from log order by logDate desc limit 5");
															}else{
																$logs = $connect->query("select * from log where ptk_id='$idku' order by logDate desc limit 5");
															};
															$jlogs=$logs->num_rows;
															if($jlogs>0){
																while($mlogs=$logs->fetch_assoc()){
																	$idlog=$mlogs['id'];
																	$iduser=$mlogs['ptk_id'];
																	$nama=$connect->query("select * from ptk where ptk_id='$iduser'")->fetch_assoc();
															?>
															<li>
																<div class="checkbox-custom checkbox-default">
																	<input type="checkbox" id="todoListItem2" class="todo-check">
																	<label class="todo-label" for="todoListItem2"><span>[<?=$mlogs['logDate'];?>] <?=$nama['nama'];?> - <?=$mlogs['activity'];?></span></label>
																</div>
																<div class="todo-actions">
																	<?php if($level==11){ ?>
																	<a href="#" onclick="removeAktivitas(<?=$idlog;?>)">
																		<i class="fas fa-times"></i>
																	</a>
																	<?php } ?>
																</div>
															</li>
															<?php }}else{ ?>
															<li>
																<div class="checkbox-custom checkbox-default">
																	<input type="checkbox" id="todoListItem2" class="todo-check">
																	<label class="todo-label" for="todoListItem2"><span>Belum ada Aktivitas</span></label>
																</div>
																<div class="todo-actions">
																	
																</div>
															</li>
															<?php } ?>															
														</ul>
													</div>
												</div>
											</div>
										</div>
									</section>

						</div>
						<div class="col-lg-7 col-xl-8">

							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="nav-item active">
										<button class="nav-link" data-bs-target="#overview" data-bs-toggle="tab">Timeline</button>
									</li>
									<li class="nav-item">
										<button class="nav-link" data-bs-target="#edit" data-bs-toggle="tab">Biodata</button>
									</li>
									<li class="nav-item">
										<button class="nav-link" data-bs-target="#passw" data-bs-toggle="tab">Password</button>
									</li>
									<li class="nav-item">
										<button class="nav-link" data-bs-target="#sk" data-bs-toggle="tab">SK</button>
									</li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">

										<div class="p-3">

											<!--
											<h4 class="mb-3 font-weight-semibold text-dark">Update Status</h4>
											
											<section class="simple-compose-box mb-3">
												<form method="get" action="/">
													<textarea name="message-text" data-plugin-textarea-autosize placeholder="What's on your mind?" rows="1"></textarea>
												</form>
												<div class="compose-box-footer">
													<ul class="compose-toolbar">
														<li>
															<a href="#"><i class="fas fa-camera"></i></a>
														</li>
														<li>
															<a href="#"><i class="fas fa-map-marker-alt"></i></a>
														</li>
													</ul>
													<ul class="compose-btn">
														<li>
															<a href="#" class="btn btn-primary btn-xs">Post</a>
														</li>
													</ul>
												</div>
											</section>
											-->
											<?php 
											if($maintenis==1){
											?>
											<div class="alert alert-warning nomargin alert-dismissible fade show" role="alert">
												<h4 class="font-weight-bold text-dark">Perbaikan Server!</h4>
												<p>Server sedang dalam tahap perbaikan dan optimalisasi Database, hanya halaman ini yang bisa anda akses!</p>
												<p>
													<button class="btn btn-danger mt-1 mb-1" type="button" onclick="keluar(1)">Keluar</button>
													<button class="btn btn-primary mt-1 mb-1" type="button">Beranda</button>
												</p>
											</div>
											<?php } ?>
											<div id="tempat_crop" style="display: none">
												<div class="row">
													<div class="col-md-8 text-center">
														<div id="image_demo" style="width:350px; margin-top:30px"></div>
													</div>
													<div class="col-md-4" style="padding-top:30px;">
													<br />
													<br />
													<br/>
														
													</div>
												</div>
												<button class="btn btn-success crop_image">Crop & Upload Image</button>
											</div>
											<div id="statistik">
											
											<div class="row mb-3">
												<div class="col-xl-6">
													<section class="card card-featured-left card-featured-primary mb-3">
														<div class="card-body">
															<div class="widget-summary">
																<div class="widget-summary-col widget-summary-col-icon">
																	<div class="summary-icon bg-primary">
																		<i class="fas fa-calendar"></i>
																	</div>
																</div>
																<div class="widget-summary-col">
																	<div class="summary">
																		<h4 class="title">Terlambat</h4>
																		<div class="info">
																			<strong class="amount"><?=$jabs['diff1'];?></strong>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</section>
												</div>
												<div class="col-xl-6">
													<section class="card card-featured-left card-featured-primary mb-3">
														<div class="card-body">
															<div class="widget-summary">
																<div class="widget-summary-col widget-summary-col-icon">
																	<div class="summary-icon bg-primary">
																		<i class="fas fa-calendar"></i>
																	</div>
																</div>
																<div class="widget-summary-col">
																	<div class="summary">
																		<h4 class="title">Pulang Awal</h4>
																		<div class="info">
																			<strong class="amount"><?=$jabs['diff2'];?></strong>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</section>
												</div>
											</div>
											<div class="row mb-3">
												<div class="col-xl-6">
													<section class="card card-featured-left card-featured-primary mb-3">
														<div class="card-body">
															<div class="widget-summary">
																<div class="widget-summary-col widget-summary-col-icon">
																	<div class="summary-icon bg-primary">
																		<i class="fas fa-users"></i>
																	</div>
																</div>
																<div class="widget-summary-col">
																	<div class="summary">
																		<h4 class="title">Jumlah Siswa</h4>
																		<div class="info">
																			<strong class="amount"><?=$jtot;?></strong>
																		</div>
																	</div>
																	<div class="summary-footer">
																		<a class="text-muted text-uppercase" href="#">(Lihat Semua)</a>
																	</div>
																</div>
															</div>
														</div>
													</section>
												</div>
												<div class="col-xl-6">
													<section class="card card-featured-left card-featured-secondary">
														<div class="card-body">
															<div class="widget-summary">
																<div class="widget-summary-col widget-summary-col-icon">
																	<div class="summary-icon bg-secondary">
																		<i class="fas fa-users"></i>
																	</div>
																</div>
																<div class="widget-summary-col">
																	<div class="summary">
																		<h4 class="title">Jumlah PTK</h4>
																		<div class="info">
																			<strong class="amount"><?=$jptk;?></strong>
																		</div>
																	</div>
																	<div class="summary-footer">
																		<a class="text-muted text-uppercase" href="#">(Lihat Semua)</a>
																	</div>
																</div>
															</div>
														</div>
													</section>
												</div>
											</div>
											<div class="row">
												<div class="col-xl-6">
													<section class="card card-featured-left card-featured-tertiary mb-3">
														<div class="card-body">
															<div class="widget-summary">
																<div class="widget-summary-col widget-summary-col-icon">
																	<div class="summary-icon bg-tertiary">
																		<i class="fas fa-user"></i>
																	</div>
																</div>
																<div class="widget-summary-col">
																	<div class="summary">
																		<h4 class="title">Siswa Laki-laki</h4>
																		<div class="info">
																			<strong class="amount"><?=$jlak;?></strong>
																		</div>
																	</div>
																	<div class="summary-footer">
																		<a class="text-muted text-uppercase" href="#">(Lihat Semua)</a>
																	</div>
																</div>
															</div>
														</div>
													</section>
												</div>
												<div class="col-xl-6">
													<section class="card card-featured-left card-featured-quaternary">
														<div class="card-body">
															<div class="widget-summary">
																<div class="widget-summary-col widget-summary-col-icon">
																	<div class="summary-icon bg-quaternary">
																		<i class="fas fa-user"></i>
																	</div>
																</div>
																<div class="widget-summary-col">
																	<div class="summary">
																		<h4 class="title">Siswa Perempuan</h4>
																		<div class="info">
																			<strong class="amount"><?=$jper;?></strong>
																		</div>
																	</div>
																	<div class="summary-footer">
																		<a class="text-muted text-uppercase" href="#">(Lihat Semua)</a>
																	</div>
																</div>
															</div>
														</div>
													</section>
												</div>
											</div>
											</div>
											
										</div>

									</div>
									<div id="edit" class="tab-pane">

										<form class="p-3" action="modul/kepegawaian/update-biodata.php" autocomplete="off" method="POST" id="ubahForm">
											<h4 class="mb-3 font-weight-semibold text-dark">Personal Information</h4>
											<div class="row">
												<div class="form-group col-md-6">
													<label for="inputCity">Nama Lengkap</label>
													<input type="text" class="form-control" name="nama" value="<?=$bioku['nama'];?>">
													<input type="hidden" class="form-control" name="ptkid" value="<?=$bioku['ptk_id'];?>">
												</div>
												<div class="form-group col-md-6 border-top-0 pt-0">
													<label for="inputZip">Gelar</label>
													<input type="text" class="form-control" name="gelar" value="<?=$bioku['gelar'];?>">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-4">
													<label for="inputZip">Tempat Lahir</label>
													<input type="text" class="form-control" name="tempat" value="<?=$bioku['tempat_lahir'];?>">
												</div>
												<div class="form-group col-md-5 border-top-0 pt-0">
													<label for="inputZip">Tanggal Lahir</label>
													<input type="text" class="form-control" data-plugin-masked-input data-input-mask="9999-99-99" name="tanggal" value="<?=$bioku['tanggal_lahir'];?>">
												</div>
												<div class="form-group col-md-3 border-top-0 pt-0">
													<label for="inputCity">Jenis Kelamin</label>
													<select name="jeniskelamin" class="form-control">
														<option <?php if($bioku['jenis_kelamin']==="L"){ echo "selected";}?> value="L">Laki-laki</option>
														<option <?php if($bioku['jenis_kelamin']==="P"){ echo "selected";}?> value="P">Perempuan</option>
													</select>
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-4">
													<label for="inputCity">NIK</label>
													<input type="text" class="form-control" name="nik" value="<?=$bioku['nik'];?>">
												</div>
												<div class="form-group col-md-4 border-top-0 pt-0">
													<label for="inputZip">NIY/NIGK</label>
													<input type="text" class="form-control" value="<?=$bioku['niy_nigk'];?>" readonly>
                                                  	<input type="hidden" class="form-control" name="niynigk" value="<?=$bioku['niy_nigk'];?>">
												</div>
												<div class="form-group col-md-4 border-top-0 pt-0">
													<label for="inputZip">NUPTK</label>
													<input type="text" class="form-control" value="<?=$bioku['nuptk'];?>" readonly>
                                                  	<input type="hidden" class="form-control" name="nuptk" value="<?=$bioku['nuptk'];?>">
												</div>
											</div>
											<div class="row">
												<div class="form-group col">
													<label for="inputAddress">Alamat</label>
													<input type="text" class="form-control" name="alamat" value="<?=$bioku['alamat_jalan'];?>">
												</div>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
													<label for="inputCity">Nomor HP</label>
													<input type="text" class="form-control" name="noHP" value="<?=$bioku['no_hp'];?>">
												</div>
												<div class="form-group col-md-6 border-top-0 pt-0">
													<label for="inputZip">Email</label>
													<input type="text" class="form-control" name="email" value="<?=$bioku['email'];?>">
												</div>
											</div>
											<?php 
											//$jns_ptk = $connect->query("select * from jenis_ptk where jenis_ptk_id='$level'")->fetch_assoc();
											//$status_ptk = $connect->query("select * from status_kepegawaian where status_kepegawaian_id='$status'")->fetch_assoc();
											?>
											<div class="row">
												<div class="form-group col-md-6">
													<label for="inputCity">Jenis PTK</label>
                                                  	<input type="hidden" class="form-control" name="jenispegawai" value="<?=$level;?>">
													<select class="form-control" readonly>
														<?php 
														$sql2 = "select * from jenis_ptk";
														$query2 = $connect->query($sql2);
														while($po=$query2->fetch_assoc()){
														?>
														<option value="<?=$po['jenis_ptk_id'];?>" <?php if($po['jenis_ptk_id']===$level){ echo "selected";}?>><?=$po['jenis_ptk'];?></option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group col-md-6 border-top-0 pt-0">
													<label for="inputZip">Status Kepegawaian</label>
                                                  	<input type="hidden" class="form-control" name="statuspegawai" value="<?=$status;?>">
													<select class="form-control" readonly>
														<?php 
														$sql21 = "select * from status_kepegawaian";
														$query21 = $connect->query($sql21);
														while($po1=$query21->fetch_assoc()){
														?>
														<option value="<?=$po1['status_kepegawaian_id'];?>" <?php if($po1['status_kepegawaian_id']===$status){ echo "selected";}?>><?=$po1['nama'];?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 text-end mt-3">
													<button type="submit" class="btn btn-primary modal-confirm">Simpan</button>
												</div>
											</div>

										</form>

									</div>
									<div id="passw" class="tab-pane">
										<?php 
										$ptkid=$bioku['ptk_id'];
										$pengguna = $connect->query("select * from pengguna where ptk_id='$ptkid'")->fetch_assoc();
										?>
										<form class="p-3" action="modul/kepegawaian/update-password.php" autocomplete="off" method="POST" id="ubahPassw">
											<h4 class="mb-3 font-weight-semibold text-dark">Username dan Password</h4>
											<div class="row">
												<div class="form-group col-md-6">
													<label for="inputCity">Username</label>
													<input type="text" class="form-control" name="username" value="<?=$pengguna['username'];?>">
													<input type="hidden" class="form-control" name="ptkid" value="<?=$bioku['ptk_id'];?>">
												</div>
												<div class="form-group col-md-6 border-top-0 pt-0">
													<label for="inputZip">Password</label>
													<input type="password" class="form-control" name="password">
												</div>
											</div>
											<div class="row">
												<div class="col-md-12 text-end mt-3">
													<button type="submit" class="btn btn-primary modal-confirm">Simpan</button>
												</div>
											</div>

										</form>

									</div>
									<div id="sk" class="tab-pane">
										<form class="p-3">
										<h4 class="mb-3 font-weight-semibold text-dark">SK Pengangkatan</h4>
										<div class="table-responsive">
											<table class="table table-sm">
												<thead>
												  <tr>
													<th scope="col">Tanggal</th>
													<th scope="col">Nomor SK</th>
													<th scope="col">Jabatan</th>
													<th scope="col">Pejabat Pengangkat</th>
													<th scope="col">Print</th>
												  </tr>
												</thead>
												<tbody>
													<?php 
													$sql22 = "select * from sk where ptk_id='$idku' order by tanggal_sk desc";
													$query22 = $connect->query($sql22);
													while($skku=$query22->fetch_assoc()){
														$idsk=$skku['id_sk'];
													?>
													<tr>
														<th scope="row"><?=$skku['tanggal_sk'];?></th>
														<td><?=$skku['no_sk'];?></td>
														<td><?=$skku['jabatan'];?></td>
														<td><?=$skku['pengangkat'];?></td>
														<td><button data-ptk="<?=$idku;?>"  data-id="<?=$idsk;?>" id="cetaksuratSK" class="btn btn-info btn-border btn-round btn-sm"><i class="fas fa-print"></i></a></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<!-- end: page -->
					
					<!-- staticBackdrop Modal -->
					<div class="modal fade" id="insertimageModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-body text-center p-5">
									<lord-icon
										src="https://cdn.lordicon.com/lupuorrc.json"
										trigger="loop"
										colors="primary:#121331,secondary:#08a88a"
										style="width:120px;height:120px">
									</lord-icon>
									
									<div class="mt-4">
										<div class="row">
											<div class="col-md-8 text-center">
												<div id="image_demo" style="width:350px; margin-top:30px"></div>
											</div>
											<div class="col-md-4" style="padding-top:30px;">
											<br />
											<br />
											<br/>
												
											</div>
										</div>
										<div class="hstack gap-2 justify-content-center">
											<button class="btn btn-success crop_image">Crop & Upload Image</button>
											<a href="javascript:void(0);" class="btn btn-success" data-bs-dismiss="modal">Close</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					<div class="modal fade" id="insertimageModal" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Photo Profil</h5>
								</div>
								<div class="modal-body">
									<div class="row">
									    <div class="col-md-8 text-center">
											<div id="image_demo" style="width:350px; margin-top:30px"></div>
										</div>
										<div class="col-md-4" style="padding-top:30px;">
										<br />
										<br />
										<br/>
											
									    </div>
									</div>
								</div>
								<div class="modal-footer">
									<button class="btn btn-success crop_image">Crop & Upload Image</button>
									<button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					
					
									