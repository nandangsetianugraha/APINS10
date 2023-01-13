					
					<header class="page-header">
						<h2>Cetak Rapor</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Cetak Rapor</span></li>
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
								<?php if($level==11){ ?>
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
									<select class="form-select" id="kelas" name="kelas">
										<option value="<?=$kelas;?>"><?=$kelas;?></option>
									</select>
								<?php }; ?>	
																		
							</div>
								<h2 class="card-title">Cetak Rapor</h2>
						</header>
						<div class="card-body">
							<div class="row mb-2">
								<div class="col-md-4">
									<button class="btn btn-primary btn-icon" id="cetakT"><i class="fas fa-print"></i> Cetak Penyerahan Rapor</button>
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
										<th class="text-center">Status</th>
										<th class="text-center"></th>
									</tr>
								</thead>
								<tbody>				
								</tbody>
							</table>
						</div>
					</section>