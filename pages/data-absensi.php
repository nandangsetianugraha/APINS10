					<header class="page-header">
						<h2>Data Absensi</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Data Absensi</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					<div class="row">
						<div class="col-lg-12">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
										<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
										<?php if($level==11){ ?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<?php 
											$sql4 = "select * from rombel where tapel='$tapel' order by nama_rombel asc";
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
										<h2 class="card-title">Data Absensi</h2>
								</header>
								<div class="card-body">
									
									<table class="table table-responsive-sm table-bordered table-striped mb-0" id="kt_table_users">
										<thead>
											<tr>
												<th width="5%"></th>
												<th width="30%">Nama Siswa</th>
												<th width="10%">Sakit</th>
												<th width="10%">Ijin</th>
												<th width="10%">Alpha</th>
											</tr>
										</thead>
										<tbody>				
										</tbody>
									</table>
								</div>
							</section>
						</div>
					</div>
					
									<div class="modal fade" id="modalekskul" tabindex="-1" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<form id="ekskulForm" method="POST" action="modul/rapor/simpan-data-absensi.php" class="form">
													<div class="kesehatan-data"></div>
												</form>
											</div>
										</div>
									</div>