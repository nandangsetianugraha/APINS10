					<header class="page-header">
						<h2><?=ucwords($judul);?></h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span><?=ucwords($judul);?></span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
						<div class="row">
							<div class="col">
								<section class="card card-modern card-big-info">
									<div class="card-body">
										<div class="row">
											<div class="col-lg-2-5 col-xl-1-5">
												<i class="card-big-info-icon bx bx-box"></i>
												<h2 class="card-big-info-title">Status Server</h2>
												<p class="card-big-info-desc"></p>
											</div>
											<div class="col-lg-3-5 col-xl-4-5">
												<form class="p-3" action="modul/setting/update-server.php" autocomplete="off" method="POST" id="ubahForm">
												<div class="form-group row pb-4 align-items-center">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end mb-0">Tahun Ajaran</label>
													<div class="col-lg-7 col-xl-6">
														<div class="input-group mb-3">
															<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
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
															<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahTema" id="addTemaModalBtn"><i class="icons icon-plus"></i></button>
														</div>
													</div>
												</div>
												<div class="form-group row pb-4">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0">Semester</label>
													<div class="col-lg-7 col-xl-6">
														<select class="form-select" id="psmt" name="psmt">
															<option value="0">Pilih Semester</option>
															<option value="1" <?php if($smt==1) echo "selected"; ?>>Semester 1</option>
															<option value="2" <?php if($smt==2) echo "selected"; ?>>Semester 2</option>
														</select>
													</div>
												</div>
												<div class="form-group row pb-4">
													<label class="col-lg-5 col-xl-3 control-label text-lg-end pt-2 mt-1 mb-0">Status Perawatan</label>
													<div class="col-lg-7 col-xl-6">
														<select class="form-select" id="pstatus" name="pstatus">
															<option value="0" <?php if($maintenis==0) echo "selected"; ?>>Tidak</option>
															<option value="1" <?php if($maintenis==1) echo "selected"; ?>>Ya</option>
														</select>
													</div>
												</div>
												<div class="form-group row pb-4">
													<button type="submit" class="btn btn-primary modal-confirm">Simpan</button>
												</div>												
												</form>
											</div>
										</div>
									</div>
								</section>
							</div>
						</div>
						
									<div class="modal" id="tambahTema" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Tahun Ajaran</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<form id="createTemaForm" method="POST" action="modul/setting/tambahtapel.php" class="form">
													<div class="modal-body">
														<div class="form-group form-group-default">
															<label>Tahun Ajaran</label>
															<input type="text" name="nama_tapel" autocomplete=off class="form-control" placeholder="Tahun Ajaran">
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