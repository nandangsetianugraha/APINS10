					<?php 
					if($tipe==''){
					?>
					<header class="page-header">
						<h2>Daftar PTK</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Daftar PTK</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
										<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
										<input type="hidden" class="form-control" id="urls" value="<?=base_url();?>">
										<select class="form-select" id="stst" name="stst">
											<option value="1">Aktif</option>
											<option value="0">Mutasi Keluar</option>
											<option value="4">Mengundurkan Diri</option>
										</select>										
							</div>
								<h2 class="card-title">Daftar PTK</h2>
						</header>
						<div class="card-body">
							
							<table class="table table-bordered table-striped" id="kt_table_users">
								<thead>
									<tr>
										<th></th>
										<th>Nama PTK</th>
										<th>Tempat Lahir</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>				
								</tbody>
							</table>
						</div>
					</section>
									
									<div class="modal fade" id="tempatkan" tabindex="-1" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Tempatkan di Kelas?</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form id="penempatanForm" method="POST" action="modul/siswa/penempatan.php" class="form">
													<div class="tempatkan-data"></div>
												</form>
											</div>
										</div>
									</div>
									<div class="modal" id="mutasikan" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Mutasikan Siswa?</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form id="mutasiForm" method="POST" action="modul/siswa/mutasi.php" class="form">
													<div class="mutasikan-data"></div>
												</form>
											</div>
										</div>
									</div>
					<?php 
					}else{
						$idptk=$tipe;
						$infoptk = $connect->query("select * from ptk where ptk_id='$idptk'")->fetch_assoc();
					?>
					<header class="page-header">
						<h2><?=strtoupper($infoptk['nama']);?></h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span><?=strtoupper($judul);?></span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					<div class="row">
						<div class="col-lg-4 col-xl-4 mb-4 mb-xl-0">
							<section class="card card-group">
										<header class="card-header bg-primary w-100">

											<div class="widget-profile-info">
												<?php 
												$levelss=$infoptk['jenis_ptk_id'];
												$statuss=$infoptk['status_kepegawaian_id'];
												$j_ptk = $connect->query("select * from jenis_ptk where jenis_ptk_id='$levelss'")->fetch_assoc();
												$s_ptk = $connect->query("select * from status_kepegawaian where status_kepegawaian_id='$statuss'")->fetch_assoc();
												$filegbr = base_url().'images/ptk/'.$infoptk['gambar'];
												$file_headerss = @get_headers($filegbr);
												if($file_headerss[0] == 'HTTP/1.1 404 Not Found') {
													//$exists = false;
													$pp="user-default.jpg";
												}else {
													//$exists = true;
													$pp=$infoptk['gambar'];
												};
												?>
												<div class="profile-picture" id="image-place">
													<img src="<?=base_url();?>images/ptk/<?=$pp;?>">
													<input type="hidden" class="form-control" id="urls" value="<?=base_url();?>">
												</div>
												<div class="profile-info">
													<h4 class="name font-weight-semibold"><?=$infoptk['nama'];?></h4>
													<h5 class="role"><?=$j_ptk['jenis_ptk'];?></h5>
													<div class="profile-footer">														
														<a href="#" data-bs-toggle="modal" data-bs-target="#ubahPP" id="btnPP">(ubah gambar)</a>	
													</div>
												</div>
											</div>

										</header>
										<div class="modal" id="ubahPP" tabindex="-1" role="dialog">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Poto Profil</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<form id="image-upload" action="<?=base_url();?>images/upload.php?idptk=<?=$tipe;?>" method="post" enctype="multipart/form-data">
														<div class="modal-body">
															<section class="card card-group">
																<header class="card-header bg-primary w-100">
																	<div class="widget-profile-info">
																		<div class="profile-picture" id="preview">
																			<img src="<?=base_url();?>images/ptk/<?=$pp;?>">
																		</div>
																		<div class="profile-info">
																			<input type="file" name="image" id="image" required />
																			<input type="hidden" name="idptks" id="idptks" value="<?=$tipe;?>" />
																			<p class="loading"></p>
																		</div>
																	</div>
																</header>
															</section>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
														</div>
													</form>
												</div>
											</div>
										</div>
										
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
														<ul class="widget-todo-list">
															<?php 
															$logs = $connect->query("select * from log where ptk_id='$tipe' order by logDate desc limit 5");
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
						<div class="col-lg-8 col-xl-8">
								<div class="card-body">
										<form class="p-3" action="<?=base_url();?>modul/kepegawaian/update-ptk.php" autocomplete="off" method="POST" id="updatePTK">
													<h4 class="mb-3 font-weight-semibold text-dark">Personal Information</h4>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="inputCity">Nama Lengkap</label>
															<input type="text" class="form-control" name="nama" value="<?=$infoptk['nama'];?>" required>
														</div>
														<div class="form-group col-md-6 border-top-0 pt-0">
															<label for="inputZip">Gelar</label>
															<input type="text" class="form-control" name="gelar" value="<?=$infoptk['gelar'];?>">
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-4">
															<label for="inputZip">Tempat Lahir</label>
															<input type="text" class="form-control" name="tempat" value="<?=$infoptk['tempat_lahir'];?>" required>
														</div>
														<div class="form-group col-md-5 border-top-0 pt-0">
															<label for="inputZip">Tanggal Lahir</label>
															<div class="input-group">
																<span class="input-group-text">
																	<i class="fas fa-calendar-alt"></i>
																</span>
																<input type="text" id="tanggal" name="tanggal" class="form-control" value="<?=$infoptk['tanggal_lahir'];?>" required>
															</div>
														</div>
														<div class="form-group col-md-3 border-top-0 pt-0">
															<label for="inputCity">Jenis Kelamin</label>
															<select name="jeniskelamin" class="form-control">
																<option value="L" <?php if($infoptk['jenis_kelamin']=='L') echo 'selected';?>>Laki-laki</option>
																<option value="P" <?php if($infoptk['jenis_kelamin']=='P') echo 'selected';?>>Perempuan</option>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-4">
															<label for="inputCity">NIK</label>
															<input type="text" class="form-control" name="nik" value="<?=$infoptk['nik'];?>">
														</div>
														<div class="form-group col-md-4 border-top-0 pt-0">
															<label for="inputZip">NIY/NIGK</label>
															<input type="text" class="form-control" name="niynigk" value="<?=$infoptk['niy_nigk'];?>">
														</div>
														<div class="form-group col-md-4 border-top-0 pt-0">
															<label for="inputZip">NUPTK</label>
															<input type="text" class="form-control" name="nuptk" value="<?=$infoptk['nuptk'];?>">
														</div>
													</div>
													<div class="row">
														<div class="form-group col">
															<label for="inputAddress">Alamat</label>
															<input type="text" class="form-control" name="alamat" value="<?=$infoptk['alamat_jalan'];?>">
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="inputCity">Nomor HP</label>
															<input type="text" class="form-control" name="noHP" value="<?=$infoptk['no_hp'];?>">
														</div>
														<div class="form-group col-md-6 border-top-0 pt-0">
															<label for="inputZip">Email</label>
															<input type="text" class="form-control" name="email" value="<?=$infoptk['email'];?>">
														</div>
													</div>
													<?php 
													//$jns_ptk = $connect->query("select * from jenis_ptk where jenis_ptk_id='$level'")->fetch_assoc();
													//$status_ptk = $connect->query("select * from status_kepegawaian where status_kepegawaian_id='$status'")->fetch_assoc();
													?>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="inputCity">Jenis PTK</label>
															<select class="form-control" name="jenispegawai">
																<?php 
																$sql2 = "select * from jenis_ptk";
																$query2 = $connect->query($sql2);
																while($po=$query2->fetch_assoc()){
																?>
																<option value="<?=$po['jenis_ptk_id'];?>" <?php if($infoptk['jenis_ptk_id']==$po['jenis_ptk_id']) echo 'selected';?>><?=$po['jenis_ptk'];?></option>
																<?php } ?>
															</select>
														</div>
														<div class="form-group col-md-6 border-top-0 pt-0">
															<label for="inputZip">Status Kepegawaian</label>
															<select class="form-control" name="statuspegawai">
																<?php 
																$sql21 = "select * from status_kepegawaian";
																$query21 = $connect->query($sql21);
																while($po1=$query21->fetch_assoc()){
																?>
																<option value="<?=$po1['status_kepegawaian_id'];?>" <?php if($infoptk['jenis_ptk_id']==$po1['status_kepegawaian_id']) echo 'selected';?>><?=$po1['nama'];?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12 text-end mt-3">
															<a href="<?=base_url();?>ptk" class="btn btn-info">Kembali</a>
															<button type="submit" class="btn btn-primary">Simpan</button>
														</div>
													</div>

												</form>
									</div>
								
						</div>
					</div>
					<?php } ?>

					