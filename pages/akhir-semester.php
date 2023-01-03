					<header class="page-header">
						<h2>Penilaian Akhir Semester</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Penilaian Akhir Semester</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								
								
							</div>
								<h2 class="card-title judul">Penilaian Akhir Semester</h2>
								<p class="card-subtitle">Tahun Ajaran <?=$tapel;?> Semester <?=$smt;?></p>
						</header>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-3">
									<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
									<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
									<?php if($level==96){?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<?php 
											$sql4 = "select * from rombel where tapel='$tapel' and pai='$idku' and kurikulum='Kurikulum 2013' order by nama_rombel asc";
											$query4 = $connect->query($sql4);
											while($nk=$query4->fetch_assoc()){
												
											?>
											<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
											<?php };?>
										</select>
										<?php }elseif($level==95){ ?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<?php 
											$sql4 = "select * from rombel where tapel='$tapel' and penjas='$idku' and kurikulum='Kurikulum 2013' order by nama_rombel asc";
											$query4 = $connect->query($sql4);
											while($nk=$query4->fetch_assoc()){
												
											?>
											<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
											<?php };?>
										</select>
										<?php }elseif($level==94){ ?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<?php 
											$sql4 = "select * from rombel where tapel='$tapel' and inggris='$idku' and kurikulum='Kurikulum 2013' order by nama_rombel asc";
											$query4 = $connect->query($sql4);
											while($nk=$query4->fetch_assoc()){
												
											?>
											<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
											<?php };?>
										</select>
										<?php }elseif($level==11){ ?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<?php 
											$sql4 = "select * from rombel where tapel='$tapel' and kurikulum='Kurikulum 2013' order by nama_rombel asc";
											$query4 = $connect->query($sql4);
											while($nk=$query4->fetch_assoc()){
												
											?>
											<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
											<?php };?>
										</select>
										<?php }else{ ?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<option value="<?=$kelas;?>"><?=$kelas;?></option>
										</select>
										<?php }; ?>
								</div>
								<div class="col-lg-3">
									<select class="form-control" id="mp" name="mp">
										<option value="0">Pilih Mapel</option>
									</select>
								</div>
								<div class="col-lg-3">
									<select class="form-control" id="kd" name="kd">
										<option value="0">Pilih KD</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="table-responsive">
										<div id="nilaiHarian">
											<div class="alert alert-info alert-dismissible">
												<h4><i class="icon fa fa-info"></i> Informasi</h4>
												Silahkan Pilih Mata Pelajaran
											</div>
										</div>
									 </div>
								</div>
							</div>
						</div>
					</section>