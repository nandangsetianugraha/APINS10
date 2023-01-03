					<header class="page-header">
						<h2>Tema</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Tema</span></li>
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
								<?php if($level==96){?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<?php 
											$sql4 = "select * from rombel where tapel='$tapel' and pai='$idku' and kurikulum='Kurikulum 2013' order by nama_rombel asc";
											$query4 = $connect->query($sql4);
											$ak=0;
											while($nk=$query4->fetch_assoc()){
												$ac=substr($nk['nama_rombel'],0,1);
												if($ac==$ak){
													
												}else{
													$ak=$ac;
													echo '<option value="'.$ac.'">'.$ac.'</option>';
												}
											}	
											?>
										</select>
										<?php }elseif($level==95){ ?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<?php 
											$sql4 = "select * from rombel where tapel='$tapel' and penjas='$idku' and kurikulum='Kurikulum 2013' order by nama_rombel asc";
											$query4 = $connect->query($sql4);
											$ak=0;
											while($nk=$query4->fetch_assoc()){
												$ac=substr($nk['nama_rombel'],0,1);
												if($ac==$ak){
													
												}else{
													$ak=$ac;
													echo '<option value="'.$ac.'">'.$ac.'</option>';
												}
											}	
											?>
										</select>
										<?php }elseif($level==94){ ?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<?php 
											$sql4 = "select * from rombel where tapel='$tapel' and inggris='$idku' and kurikulum='Kurikulum 2013' order by nama_rombel asc";
											$query4 = $connect->query($sql4);
											$ak=0;
											while($nk=$query4->fetch_assoc()){
												$ac=substr($nk['nama_rombel'],0,1);
												if($ac==$ak){
													
												}else{
													$ak=$ac;
													echo '<option value="'.$ac.'">'.$ac.'</option>';
												}
											}	
											?>
										</select>
										<?php }elseif($level==11){ ?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<?php 
											$sql4 = "select * from rombel where tapel='$tapel' and kurikulum='Kurikulum 2013' order by nama_rombel asc";
											$query4 = $connect->query($sql4);
											$ak=0;
											while($nk=$query4->fetch_assoc()){
												$ac=substr($nk['nama_rombel'],0,1);
												if($ac==$ak){
													
												}else{
													$ak=$ac;
													echo '<option value="'.$ac.'">'.$ac.'</option>';
												}
											}	
											?>
										</select>
										<?php }else{ ?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="<?=substr($kelas,0,1);?>"><?=substr($kelas,0,1);?></option>
										</select>
										<?php }; ?>
								</div>
								<div class="btn-group">
								<button type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" data-bs-toggle="modal" data-bs-target="#tambahTema" id="addTemaModalBtn"><i class="fas fa-sync"></i> Tambah Tema</button>
								</div>
							</div>
								<h2 class="card-title judul">Daftar Tema Semester <?=$smt;?></h2>
								<p class="card-subtitle">
								
								</p>
						</header>
						<div class="card-body">
							
							<table class="table table-bordered table-striped" id="temaTable">
								<thead>
									<tr>
										<th width="20%">Tema</th>
										<th width="60%">Nama Tema</th>
										<th width="20%">Aksi</th>
									</tr>
								</thead>
								<tbody>				
								</tbody>
							</table>
						</div>
					</section>
									
									<div class="modal fade" id="editTema" tabindex="-1" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Edit Tema</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form id="updateTemaForm" method="POST" action="modul/administrasi/updatetema.php" class="form">
													<div class="tema-data"></div>
												</form>
											</div>
										</div>
									</div>
									<div class="modal" id="tambahTema" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Tema Baru</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form id="createTemaForm" method="POST" action="modul/administrasi/tambahtema.php" class="form">
													<div class="modal-body">
														<?php if($level==11){ ?>
														<div class="form-group form-group-default">
															<label>Kelas</label>
															<select class="form-select" name="kelas">
																<option value="0">Pilih Rombel</option>
																<?php 
																$sql4 = "select * from rombel where tapel='$tapel' and kurikulum='Kurikulum 2013' order by nama_rombel asc";
																$query4 = $connect->query($sql4);
																$ak=0;
																while($nk=$query4->fetch_assoc()){
																	$ac=substr($nk['nama_rombel'],0,1);
																	if($ac==$ak){
																		
																	}else{
																		$ak=$ac;
																		echo '<option value="'.$ac.'">'.$ac.'</option>';
																	}
																}	
																?>
															</select>
															
														</div>
														<?php }else{ ?>
														<input type="hidden" name="kelas" class="form-control" value="<?php echo $ab;?>">
														<?php } ?>
														<div class="form-group form-group-default">
															<label>Tema</label>
															<input type="hidden" name="smt" class="form-control" value="<?php echo $smt;?>">
															<input type="text" name="tema" autocomplete=off class="form-control" placeholder="Nomor Tema">
														</div>
														<div class="form-group form-group-default">
															<label>Tema</label>
															<input type="text" name="nama_tema" autocomplete=off class="form-control" placeholder="Tema">
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">Simpan
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>