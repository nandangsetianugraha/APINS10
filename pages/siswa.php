					<?php 
					if($tipe==''){
					?>
					<header class="page-header">
						<h2>Daftar Siswa</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Daftar Siswa</span></li>
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
											<?php
												$sql3 = "select * from jns_mutasi";
												$query3 = $connect->query($sql3);
												while($nk=$query3->fetch_assoc()){
											?>
											<option value="<?=$nk['id_mutasi'];?>"><?=$nk['nama_mutasi'];?></option>
											<?php } ?>
										</select>										
							</div>
								<h2 class="card-title">Daftar Siswa</h2>
						</header>
						<div class="card-body">
							
							<table class="table table-bordered table-striped" id="kt_table_users">
								<thead>
									<tr>
										<th></th>
										<th>Nama Siswa</th>
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
						$infoptk = $connect->query("select * from siswa where peserta_didik_id='$idptk'")->fetch_assoc();
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
												$filegbr = base_url().'images/siswa/'.$infoptk['avatar'];
												$file_headerss = @get_headers($filegbr);
												if($file_headerss[0] == 'HTTP/1.1 404 Not Found') {
													//$exists = false;
													$pp="user-default.jpg";
												}else {
													//$exists = true;
													$pp=$infoptk['avatar'];
												};
												?>
												<div class="profile-picture" id="uploaded_image">
													<img src="<?=base_url();?>images/siswa/<?=$pp;?>" id="uploaded_image" class="img-responsive img-circle" />
												</div>
												<div class="profile-info">
													<h4 class="name font-weight-semibold"><?=$infoptk['nama'];?></h4>
													<h5 class="role"><?=$infoptk['nis'];?> / <?=$infoptk['nisn'];?></h5>
													<div class="profile-footer">														
														<div id="imgChange">
															<span>Ubah Foto</span>
															<input type="file" name="insert_image" id="insert_image" accept="image/*" />

															<input type="hidden" id="idptks" value="<?=$idptk;?>" />
															<input type="hidden" id="urls" value="<?=base_url();?>" />
														</div>	
													</div>
												</div>
											</div>

										</header>
										
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
										<form class="p-3" action="<?=base_url();?>modul/kepegawaian/update-biodata.php" autocomplete="off" method="POST" id="updatePTK">
													<h4 class="mb-3 font-weight-semibold text-dark">Personal Information</h4>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="inputCity">Nama Lengkap</label>
															<input type="text" class="form-control" name="nama" value="<?=$infoptk['nama'];?>" required>
															<input type="hidden" class="form-control" name="ptkid" value="<?=$infoptk['peserta_didik_id'];?>" required>
														</div>
														<div class="form-group col-md-6 border-top-0 pt-0">
															<label for="inputZip">NIK</label>
															<input type="text" class="form-control" name="nik" value="<?=$infoptk['nik'];?>">
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-4">
															<label for="inputZip">Tempat Lahir</label>
															<input type="text" class="form-control" name="tempat" value="<?=$infoptk['tempat'];?>" required>
														</div>
														<div class="form-group col-md-5 border-top-0 pt-0">
															<label for="inputZip">Tanggal Lahir</label>
															<div class="input-group">
																<span class="input-group-text">
																	<i class="fas fa-calendar-alt"></i>
																</span>
																<input type="text" id="tanggal" name="tanggal" class="form-control" value="<?=$infoptk['tanggal'];?>" required>
															</div>
														</div>
														<div class="form-group col-md-3 border-top-0 pt-0">
															<label for="inputCity">Jenis Kelamin</label>
															<select name="jeniskelamin" class="form-control">
																<option value="L" <?php if($infoptk['jk']=='L') echo 'selected';?>>Laki-laki</option>
																<option value="P" <?php if($infoptk['jk']=='P') echo 'selected';?>>Perempuan</option>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-4">
															<label for="inputCity">NIS</label>
															<input type="text" class="form-control" name="nis" value="<?=$infoptk['nis'];?>">
														</div>
														<div class="form-group col-md-4 border-top-0 pt-0">
															<label for="inputZip">NISN</label>
															<input type="text" class="form-control" name="nisn" value="<?=$infoptk['nisn'];?>">
														</div>
														<div class="form-group col-md-4 border-top-0 pt-0">
															<label for="inputZip">Agama</label>
															<select class="form-control" name="agama" id="agama">
																<?php 
																$sql2 = "select * from agama";
																$query2 = $connect->query($sql2);
																while($nk=$query2->fetch_assoc()){
																?>
																<option value="<?=$nk['id_agama'];?>" <?php if($infoptk['agama']==$nk['id_agama']) echo 'selected';?>><?=$nk['nama_agama'];?></option>
																<?php };?>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="form-group col">
															<label for="inputAddress">Alamat</label>
															<input type="text" class="form-control" name="alamat" value="<?=$infoptk['alamat'];?>">
														</div>
													</div>
													<div class="row">
														<div class="form-group col">
															<label for="inputAddress">Pendidikan Sebelumnya</label>
															<input type="text" class="form-control" name="pend_seb" value="<?=$infoptk['pend_sebelum'];?>">
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="inputCity">Nama Ayah</label>
															<input type="text" class="form-control" name="ayah" value="<?=$infoptk['nama_ayah'];?>">
														</div>
														<div class="form-group col-md-6 border-top-0 pt-0">
															<label for="inputZip">Nama Ibu</label>
															<input type="text" class="form-control" name="ibu" value="<?=$infoptk['nama_ibu'];?>">
														</div>
													</div>
													<?php 
													//$jns_ptk = $connect->query("select * from jenis_ptk where jenis_ptk_id='$level'")->fetch_assoc();
													//$status_ptk = $connect->query("select * from status_kepegawaian where status_kepegawaian_id='$status'")->fetch_assoc();
													?>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="inputCity">Pekerjaan Ayah</label>
															<select class="form-control" name="pek_ayah">
																<?php 
																$sql21 = "select * from pekerjaan";
																$query21 = $connect->query($sql21);
																while($po1=$query21->fetch_assoc()){
																?>
																<option value="<?=$po1['id_pekerjaan'];?>" <?php if($infoptk['pek_ayah']==$po1['id_pekerjaan']) echo 'selected';?>><?=$po1['nama_pekerjaan'];?></option>
																<?php } ?>
															</select>
														</div>
														<div class="form-group col-md-6 border-top-0 pt-0">
															<label for="inputZip">Pekerjaan Ibu</label>
															<select class="form-control" name="pek_ibu">
																<?php 
																$sql21 = "select * from pekerjaan";
																$query21 = $connect->query($sql21);
																while($po1=$query21->fetch_assoc()){
																?>
																<option value="<?=$po1['id_pekerjaan'];?>" <?php if($infoptk['pek_ibu']==$po1['id_pekerjaan']) echo 'selected';?>><?=$po1['nama_pekerjaan'];?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="form-group col">
															<label for="inputAddress">Alamat Orang Tua</label>
															<input type="text" class="form-control" name="jalan" value="<?=$infoptk['jalan'];?>">
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="inputCity">Desa/Kelurahan</label>
															<select class="form-control" name="kelurahan" id="kelurahan">
																<option>Pilih Desa/kelurahan</option>
																<?php 
																$id_desa=$infoptk['kelurahan'];
																$id_kec=$infoptk['kecamatan'];
																$id_kab=$infoptk['kabupaten'];
																$id_prov=$infoptk['provinsi'];
																$sql21 = "select * from desa where id_kecamatan='$id_kec'";
																$query21 = $connect->query($sql21);
																while($nk=$query21->fetch_assoc()){
																?>
																<option value="<?=$nk['id'];?>" <?php if($id_desa==$nk['id']){echo "selected";}; ?>><?=$nk['nama'];?></option>
																<?php } ?>
															</select>
														</div>
														<div class="form-group col-md-6 border-top-0 pt-0">
															<label for="inputZip">Kecamatan</label>
															<select class="form-control" name="kecamatan" id="kecamatan">
																<option>Pilih Kecamatan</option>
																<?php 
																$sql21 = "select * from kecamatan where id_kabupaten='$id_kab'";
																$query21 = $connect->query($sql21);
																while($nk=$query21->fetch_assoc()){
																?>
																<option value="<?=$nk['id'];?>" <?php if($id_kec==$nk['id']){echo "selected";}; ?>><?=$nk['nama'];?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="inputCity">Kabupaten</label>
															<select class="form-control" name="kabupaten" id="kabupaten">
																<option>Pilih Kabupaten</option>
																<?php 
																$sql21 = "select * from kabupaten where id_provinsi='$id_prov'";
																$query21 = $connect->query($sql21);
																while($nk=$query21->fetch_assoc()){
																?>
																<option value="<?=$nk['id'];?>" <?php if($id_kab==$nk['id']){echo "selected";}; ?>><?=$nk['nama'];?></option>
																<?php } ?>
															</select>
														</div>
														<div class="form-group col-md-6 border-top-0 pt-0">
															<label for="inputZip">Provinsi</label>
															<select class="form-control" name="provinsi" id="provinsi">
																<option>Pilih Provinsi</option>
																<?php 
																$sql21 = "select * from provinsi";
																$query21 = $connect->query($sql21);
																while($nk=$query21->fetch_assoc()){
																?>
																<option value="<?=$nk['id_prov'];?>" <?php if($id_prov==$nk['id_prov']){echo "selected";}; ?>><?=$nk['nama'];?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12 text-end mt-3">
															<a href="<?=base_url();?>siswa" class="btn btn-info">Kembali</a>
															<button type="submit" class="btn btn-primary">Update</button>
														</div>
													</div>

												</form>
									</div>
								
						</div>
					</div>
					<div id="insertimageModal" class="modal" role="dialog">
					 <div class="modal-dialog">
					  <div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Crop & Insert Image</h4>
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
							<button class="btn btn-success crop_image">Crop & Insert Image</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  </div>
						</div>
					  </div>
					</div>
					
					
					<?php } ?>

					