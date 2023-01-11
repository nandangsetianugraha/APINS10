					
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
								<h2 class="card-title">Cetak Rapor</h2>
						</header>
						<div class="card-body">
							<div class="row mb-2">
								<div class="col-md-4">
									<button class="btn btn-primary btn-icon" id="cetakRekapGaji"><i class="fas fa-print"></i> Rekap Gaji</button>
									<button class="btn btn-primary btn-icon" id="cetakSlipGaji"><i class="fas fa-print"></i> Slip Gaji</button>
								</div>
								<div class="col-md-4">
									
								</div>
								<div class="col-md-4">
									
								</div>
							</div>
							
							
							<table class="table table-bordered table-striped" id="kt_table_users">
								<thead>
									<tr>
										<th>Nama</th>
										<th>KI-1</th>
										<th>KI-2</th>
										<th>KI-3</th>
										<th>KI-4</th>
										<th></th>
									</tr>
								</thead>
								<tbody>				
								</tbody>
							</table>
						</div>
					</section>