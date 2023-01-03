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