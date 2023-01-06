					<header class="page-header">
						<h2>Setting Rombel</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Setting Rombel</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
										<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
										<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
										<div class="btn-group">
										<select class="form-select" id="ptapel" name="ptapel">
											<option value="0">Pilih Tahun Ajaran</option>
											<?php 
											$sql4 = "select * from tapel order by nama_tapel asc";
											$query4 = $connect->query($sql4);
											$ak=0;
											while($nk=$query4->fetch_assoc()){
												if($tapel==$nk['nama_tapel']){
													$stt="selected";
												}else{
													$stt='';
												};
												echo '<option value="'.$nk['nama_tapel'].'" '.$stt.'>'.$nk['nama_tapel'].'</option>';
											}	
											?>
										</select>
										</div>										
									</div>
									<h2 class="card-title judul">Setting Rombel</h2>
						</header>
						<div class="card-body">
							<button type="button" class="btn rounded-0 btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addProyek">Tambah Rombel</button>
							
							<table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="temaTable">
								<thead>
									<tr>
										<th width="5%">Rombel</th>
										<th width="15%">Kurikulum</th>
										<th width="15%">Wali Kelas</th>
										<th width="15%">Pendamping</th>
										<th width="15%">Guru PAI</th>
										<th width="15%">Guru PJOK</th>
										<th width="15%">Guru Bahasa Inggris</th>
										<th width="5%" class="d-none d-sm-table-cell"></th>
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
								<form class="form-horizontal" action="modul/setting/tambah-rombel.php" autocomplete="off" method="POST" id="buatproyek">
									<div class="fetched-data"></div>
								</form>
							</div>
						</div>
					</div>
					<div class="modal" id="editProyek" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<form class="form-horizontal" action="modul/setting/update-rombel.php" autocomplete="off" method="POST" id="ubahproyek">
									<div class="fetched-data1"></div>
								</form>
							</div>
						</div>
					</div>