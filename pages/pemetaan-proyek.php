					<header class="page-header">
						<h2>Pemetaan Proyek</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Pemetaan Proyek</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
					
										
							</div>
							<h2 class="card-title judul">Pemetaan Proyek</h2>
						</header>
						<div class="card-body">
							<div class="row mb-4">
								<div class="col-3">
									<input type="hidden" id="tapel" value="<?=$tapel;?>">
									<input type="hidden" id="smt" value="<?=$smt;?>">
									<?php if($level==11){ ?>
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
										<option value="<?=$kelas;?>"><?=$kelas;?></option>
									</select>
									<?php }; ?>
								</div>
								<div class="col-4">
									<label class="form-label" for="example-text-input">Proyek</label>
									<?php if($level==98 or $level==97){ ?>
									<select class="form-select" id="proyek" name="proyek">
										<option value="0">Pilih Proyek</option>
										<?php 
										$sql4 = "select * from data_proyek where kelas='$kelas' and tapel='$tapel' and smt='$smt' order by id_proyek asc";
										$query4 = $connect->query($sql4);
										$ck=0;
										while($nk=$query4->fetch_assoc()){
										?>
										<option value="<?=$nk['id_proyek'];?>"><?=$nk['nama_proyek'];?></option>
										<?php
										};
										?>
									</select>
									<?php }else{ ?>
									<select class="form-select" id="proyek" name="proyek">
										<option value="0">Pilih Proyek</option>
									</select>
									<?php } ?>
								</div>
							</div>
							<button type="button" class="btn rounded-0 btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addProyek">Pemetaan Proyek</button>
							
							<table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="temaTable">
								<thead>
									<tr>
										<th width="90%">Dimensi Penilaian</th>
										<th width="10%" class="d-none d-sm-table-cell"></th>
									</tr>
								</thead>
								<tbody>
									
										  
								</tbody>
							</table>
						</div>
					</section>
					
						
					
					<div class="modal" id="addProyek" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<form class="form-horizontal" action="modul/proyek/tambahpeta.php" autocomplete="off" method="POST" id="buatproyek">
									<div class="fetched-data"></div>
								</form>
							</div>
						</div>
					</div>
					<div class="modal" id="editProyek" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<form class="form-horizontal" action="modul/proyek/update-materi.php" autocomplete="off" method="POST" id="ubahproyek">
									<div class="fetched-data1"></div>
								</form>
							</div>
						</div>
					</div>