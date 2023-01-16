					
					<header class="page-header">
						<h2>Rekapitulasi Rapor</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Rekapitulasi Rapor</span></li>
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
								<button class="btn btn-sm btn-primary btn-icon" id="cetakT"><i class="fas fa-print"></i> Rekap Rapor</button>
																		
							</div>
								<h2 class="card-title">Rekapitulasi Rapor</h2>
						</header>
						<div class="card-body">
							<div class="row mb-2">
								<div class="col-lg-3">
									<div class="form-group form-group-default">
										<label>Kelas</label>
										<?php if($level==11){ ?>
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
											<option value="<?=$kelas;?>"><?=$kelas;?></option>
										</select>
										<?php }; ?>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group form-group-default">
										<label>Jenis Raport</label>
										<select class="form-control" id="jns" name="jns">
											<option value="0">Pilih Rapor</option>
										</select>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="form-group form-group-default">
									<label>KKM Sekolah</label>
									<?php
									$mkkm=$connect->query("select min(nilai) as kkmsekolah from kkm where tapel='$tapel'")->fetch_assoc();
									if(empty($mkkm['kkmsekolah'])){
										$kkmsaya=0;
									}else{
										$kkmsaya=$mkkm['kkmsekolah'];
									};
									?>
									<input type="text" class="form-control" value="<?=$kkmsaya;?>">
									</div>
								</div>
								<div class="col-lg-3">
									
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-md-4">
									
								</div>
								<div class="col-md-4">
									
								</div>
								<div class="col-md-4">
									
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-md-12">
									<div class="alert alert-warning alert-has-icon">
									  <div class="alert-icon"><i class="fas fa-question-circle"></i></div>
									  <div class="alert-body">
										<div class="alert-title">Perhatian</div>
										Rapor tidak bisa dicetak selama masih ada mata pelajaran yang belum generate nilai rapornya.
									  </div>
									</div>
								</div>
							</div>
							
							
							<table class="table table-bordered table-striped" id="kt_table_users">
								<thead>
									<tr>
										<th class="text-center">Nama Siswa</th>
										<?php 
										$sql1 = "select * from mapel order by id_mapel asc";
										$query1 = $connect->query($sql1);
										while ($row1 = $query1->fetch_assoc()) {
										?>
										<th class="text-center"><?=$row1['kd_mapel'];?></th>
										<?php } ?>
										<th class="text-center">Jumlah</th>
										<th class="text-center">Rerata</th>
										<th class="text-center">Rank</th>
									</tr>
								</thead>
								<tbody>				
								</tbody>
							</table>
						</div>
					</section>