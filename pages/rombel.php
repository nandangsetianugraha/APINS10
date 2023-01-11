					<?php 
					if($tipe==''){
					?>
					<header class="page-header">
						<h2>Rombel</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Rombel</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
										<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
										<?php 
												$sql = "select * from rombel where tapel='$tapel' order by nama_rombel asc";
												$query = $connect->query($sql);
												?>
												<select id="kelas" name="kelas" class="form-select form-select-sm form-select-solid w-100px w-xxl-125px" data-control="select2" data-placeholder="Rombel" data-hide-search="true">
												<?php 
												if($level==11){ 
												?>
												<option value="0" selected="selected">All</option>
												<?php
												$sql3 = "select * from rombel where tapel='$tapel' order by nama_rombel asc";
												$query3 = $connect->query($sql3);
												while($nk=$query3->fetch_assoc()){
												?>
															
												<option value="<?=$nk['nama_rombel'];?>">Kelas <?=$nk['nama_rombel'];?></option>
												<?php 
												}
												?>
												<?php }else{ ?>
												<option value="<?=$kelas;?>" selected="selected">Kelas <?=$kelas;?></option>
												<?php } ?>
												</select>
										
							</div>
								<h2 class="card-title">Kelasku</h2>
						</header>
						<div class="card-body">
							
							<table class="table table-bordered table-striped" id="kt_table_users">
								<thead>
									<tr>
										<th width="45%"></th>
										<th width="25%">Tempat Lahir</th>
										<th width="20%">Aksi</th>
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
					<?php }else{ 
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
															<input type="hidden" id="idptks" value="<?=$tipe;?>" />
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
															<li>
																<div class="checkbox-custom checkbox-default">
																	<input type="checkbox" id="todoListItem2" class="todo-check">
																	<label class="todo-label" for="todoListItem2"><span>Belum ada Aktivitas</span></label>
																</div>
																<div class="todo-actions">
																	
																</div>
															</li>														
														</ul>
													</div>
												</div>
											</div>
										</div>
									</section>
						</div>
						<div class="col-lg-8 col-xl-8">
							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="nav-item active">
										<button class="nav-link" data-bs-target="#overview" data-bs-toggle="tab">Biodata</button>
									</li>
									<li class="nav-item">
										<button class="nav-link" data-bs-target="#tab-rapor" data-bs-toggle="tab">Data Rapor</button>
									</li>
								</ul>
								<div class="tab-content">
									<div id="overview" class="tab-pane active">
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
												<form class="p-3" action="<?=base_url();?>modul/siswa/update-siswa.php" autocomplete="off" method="POST" id="updatePTK">
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
															<a href="<?=base_url();?>rombel" class="btn btn-info">Kembali</a>
															<button type="submit" class="btn btn-primary">Update</button>
														</div>
													</div>
												</form>
											</div>
										
									</div>
									<div id="tab-rapor" class="tab-pane">
										<input type="hidden" id="ids" value="<?=$tipe;?>" />
										<select class="form-control" id="tpl" name="tpl">
										<?php 
										$sql = "select * from penempatan where peserta_didik_id='$tipe' group by tapel order by tapel asc";
										$query = $connect->query($sql);
										while ($nk = $query->fetch_assoc()) {
										?>
											<option value="<?=$nk['tapel'];?>">Tahun Pelajaran <?=$nk['tapel'];?></option>
										<?php }; ?>
										</select>
										<div class="table-responsive">
											<table class="table table-sm table-striped" id="kompetensiTable">
												<thead>
													<tr>
														<th width="20%">Kompetensi</th>
														<th width="40%">Semester 1</th>
														<th width="40%">Semester 2</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
										<div class="table-responsive">
											<table class="table table-sm table-striped" id="manageMemberTable">
												<thead>
													<tr>
														<th rowspan="3">No</th>
														<th rowspan="3">Mapel</th>
														<th colspan="4">Semester 1</th>
														<th colspan="4">Semester 2</th>
													</tr>
													<tr>
														<th colspan="2">KI-3</th>
														<th colspan="2">KI-4</th>
														<th colspan="2">KI-3</th>
														<th colspan="2">KI-4</th>
													</tr>
													<tr>
														<th>N</th>
														<th>P</th>
														<th>N</th>
														<th>P</th>
														<th>N</th>
														<th>P</th>
														<th>N</th>
														<th>P</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
										<div class="table-responsive">
											<table class="table table-sm table-striped" id="tabelEkskul">
												<thead>
													<tr>
														<th width="10%">No</th>
														<th width="40%">Ekstrakurikuler</th>
														<th width="25%">Semester 1</th>
														<th width="25%">Semester 2</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
										<div class="table-responsive">
											<table class="table table-sm table-striped" id="tabelSaran">
												<thead>
													<tr>
														<th width="50%">Semester 1</th>
														<th width="50%">Semester 2</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
										<div class="table-responsive">
											<table class="table table-sm table-striped" id="tabelTB">
												<thead>
													<tr>
														<th width="10%">No</th>
														<th width="50%">Aspek Kesehatan</th>
														<th width="20%">Semester 1</th>
														<th width="20%">Semester 2</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
										<div class="table-responsive">
											<table class="table table-sm table-striped" id="tabelPrestasi">
												<thead>
													<tr>
														<th width="10%">No</th>
														<th width="20%">Prestasi</th>
														<th width="35%">Semester 1</th>
														<th width="35%">Semester 2</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
										<div class="table-responsive">
											<table class="table table-sm table-striped" id="tabelAbsensi">
												<thead>
													<tr>
														<th width="10%">No</th>
														<th width="20%">Absensi</th>
														<th width="35%">Semester 1</th>
														<th width="35%">Semester 2</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>