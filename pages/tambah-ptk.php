					<header class="page-header">
						<h2><?=ucwords($judul);?></h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span><?=ucwords($judul);?></span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
						<div class="row">
							<div class="col">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bx-box"></i>
												<h2 class="card-big-info-title">Tambah PTK</h2>
												<p class="card-big-info-desc">Add here the product description with all details and necessary information.</p>
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<form class="p-3" action="modul/kepegawaian/tambah-ptk.php" autocomplete="off" method="POST" id="tambahPTK">
													<h4 class="mb-3 font-weight-semibold text-dark">Personal Information</h4>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="inputCity">Nama Lengkap</label>
															<input type="text" class="form-control" name="nama" required>
														</div>
														<div class="form-group col-md-6 border-top-0 pt-0">
															<label for="inputZip">Gelar</label>
															<input type="text" class="form-control" name="gelar">
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-4">
															<label for="inputZip">Tempat Lahir</label>
															<input type="text" class="form-control" name="tempat" required>
														</div>
														<div class="form-group col-md-5 border-top-0 pt-0">
															<label for="inputZip">Tanggal Lahir</label>
															<div class="input-group">
																<span class="input-group-text">
																	<i class="fas fa-calendar-alt"></i>
																</span>
																<input type="text" id="tanggal" name="tanggal" class="form-control" required>
															</div>
														</div>
														<div class="form-group col-md-3 border-top-0 pt-0">
															<label for="inputCity">Jenis Kelamin</label>
															<select name="jeniskelamin" class="form-control">
																<option value="L">Laki-laki</option>
																<option value="P">Perempuan</option>
															</select>
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-4">
															<label for="inputCity">NIK</label>
															<input type="text" class="form-control" name="nik" >
														</div>
														<div class="form-group col-md-4 border-top-0 pt-0">
															<label for="inputZip">NIY/NIGK</label>
															<input type="text" class="form-control" name="niynigk" >
														</div>
														<div class="form-group col-md-4 border-top-0 pt-0">
															<label for="inputZip">NUPTK</label>
															<input type="text" class="form-control" name="nuptk">
														</div>
													</div>
													<div class="row">
														<div class="form-group col">
															<label for="inputAddress">Alamat</label>
															<input type="text" class="form-control" name="alamat">
														</div>
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label for="inputCity">Nomor HP</label>
															<input type="text" class="form-control" name="noHP">
														</div>
														<div class="form-group col-md-6 border-top-0 pt-0">
															<label for="inputZip">Email</label>
															<input type="text" class="form-control" name="email">
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
																<option value="<?=$po['jenis_ptk_id'];?>"><?=$po['jenis_ptk'];?></option>
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
																<option value="<?=$po1['status_kepegawaian_id'];?>"><?=$po1['nama'];?></option>
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
										</div>
									</div>
								</section>
							</div>
						</div>
					