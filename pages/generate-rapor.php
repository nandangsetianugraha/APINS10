					<header class="page-header">
						<h2>Generate Rapor</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Generate Rapor</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								
								
							</div>
								<h2 class="card-title judul">Generate Rapor</h2>
								<p class="card-subtitle">Tahun Ajaran <?=$tapel;?> Semester <?=$smt;?></p>
						</header>
						<div class="card-body">
							<div class="row mb-4">
								<div class="col-3">
									<input type="hidden" id="tapel" value="<?=$tapel;?>">
									<input type="hidden" id="smt" value="<?=$smt;?>">
									<?php if($level==96){?>
									<label class="form-label" for="example-text-input">Kelas</label>
									<select class="form-select" id="kelas" name="kelas">
										<option value="0">Pilih Rombel</option>
										<?php 
										$sql4 = "select * from rombel where tapel='$tapel' and pai='$idku' and kurikulum='Kurikulum Merdeka' order by nama_rombel asc";
										$query4 = $connect->query($sql4);
										while($nk=$query4->fetch_assoc()){
											
										?>
										<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
										<?php };?>
									</select>
									<?php }elseif($level==95){ ?>
									<label class="form-label" for="example-text-input">Kelas</label>
									<select class="form-select" id="kelas" name="kelas">
										<option value="0">Pilih Rombel</option>
										<?php 
										$sql4 = "select * from rombel where tapel='$tapel' and penjas='$idku' and kurikulum='Kurikulum Merdeka' order by nama_rombel asc";
										$query4 = $connect->query($sql4);
										while($nk=$query4->fetch_assoc()){
											
										?>
										<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
										<?php };?>
									</select>
									<?php }elseif($level==94){ ?>
									<label class="form-label" for="example-text-input">Kelas</label>
									<select class="form-select" id="kelas" name="kelas">
										<option value="0">Pilih Rombel</option>
										<?php 
										$sql4 = "select * from rombel where tapel='$tapel' and inggris='$idku' and kurikulum='Kurikulum Merdeka' order by nama_rombel asc";
										$query4 = $connect->query($sql4);
										while($nk=$query4->fetch_assoc()){
											
										?>
										<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
										<?php };?>
									</select>
									<?php }elseif($level==11){ ?>
									<label class="form-label" for="example-text-input">Kelas</label>
									<select class="form-select" id="kelas" name="kelas">
										<option value="0">Pilih Rombel</option>
										<?php 
										$sql4 = "select * from rombel where tapel='$tapel' and kurikulum='Kurikulum Merdeka' order by nama_rombel asc";
										$query4 = $connect->query($sql4);
										while($nk=$query4->fetch_assoc()){
											
										?>
										<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
										<?php };?>
									</select>
									<?php }else{ ?>
									<label class="form-label" for="example-text-input">Kelas</label>
									<select class="form-select" id="kelas" name="kelas">
										<option value="0">Pilih Rombel</option>
										<option value="<?=$kelas;?>"><?=$kelas;?></option>
									</select>
									<?php }; ?>
								</div>
								<div class="col-4">
									<label class="form-label" for="example-text-input">Mapel</label>
									<select class="form-select" id="mp" name="mp">
										
									</select>
								</div>
							</div>
							<div class="row mb-4">
								<div class="col-lg-12">
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-vcenter js-dataTable-responsive" id="manageMemberTable">
											<thead>
												<tr>
													<th class="text-center"></th>
													<th class="text-center">Nama Siswa</th>
													<th class="text-center">Nilai</th>
													<th class="text-center">Deskripsi</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									 </div>
								</div>
							</div>
						</div>
					</section>
					
					<div class="modal" id="editProyek" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<form class="form-horizontal" action="modul/rapor/update-rapor.php" autocomplete="off" method="POST" id="ubahproyek">
									<div class="fetched-data1"></div>
								</form>
							</div>
						</div>
					</div>