					<header class="page-header">
						<h2>KKM</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>KKM</span></li>
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
										<?php if($level==98 or $level==97){ //guru kelas dan pendamping ?>
										<select class="form-control" id="mp" name="mp">
											<?php 
											$sql2 = "select * from mapel";
											$qu3 = $connect->query($sql2);
											while($po=$qu3->fetch_assoc()){
												$idmp=$po['id_mapel'];
												if($idmp==1 or $idmp==10){
													
												}else{
													if($ab<4 and ($idmp==5 or $idmp==6)){
														
													}else{
														if($ab>3 and $idmp==8){
															
														}else{
											?>
											<option value="<?=$po['id_mapel'];?>"><?=$po['nama_mapel'];?></option>
											<?php };
										};
										};
										};?>
										</select>
										<?php } ?>
										<?php if($level==96){ //mapel PAI ?>
										<select class="form-control" id="mp" name="mp">
											<option value="1">Pendidikan Agama Islam</option>
										</select>
										<?php } ?>
										<?php if($level==95){ //mapel PJOK ?>
										<select class="form-control" id="mp" name="mp">
											<option value="8">Pend. Jasmani Olahraga dan Kesehatan</option>
										</select>
										<?php } ?>
										<?php if($level==94){ //mapel Inggris ?>
										<select class="form-control" id="mp" name="mp">
											<option value="10">Bahasa Inggris</option>
										</select>
										<?php } ?>
										
										<?php if($level==11){ //Operator ?>
										<select class="form-control" id="mp" name="mp">
											<option value="0">Pilih Mapel</option>
										</select>
										<?php } ?>
										</div>
										
									</div>
									<h2 class="card-title judul">KKM Tahun Ajaran <?=$tapel;?></h2>
						</header>
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<section class="card">
										<header class="card-header">
											<div class="card-actions">
													
											</div>
												<h2 class="card-title">Pengetahuan</h2>
										</header>
										<div class="card-body">
											<div class="row mb-3">
												<div class="col-xl-4">
													<section class="card card-featured-left card-featured-primary mb-3">
														<div class="card-body">
															<div class="widget-summary">
																<div class="widget-summary-col widget-summary-col-icon">
																	<div class="summary-icon bg-primary">
																		<i class="fas fa-users"></i>
																	</div>
																</div>
																<div class="widget-summary-col">
																	<div class="summary">
																		<h4 class="title">KKM Mapel</h4>
																		<div class="info">
																			<strong class="amount"><div id="kkmmapel"></div></strong>
																		</div>
																	</div>
																	<div class="summary-footer">
																		<a class="text-muted text-uppercase" href="#">(Lihat Semua)</a>
																	</div>
																</div>
															</div>
														</div>
													</section>
												</div>
												<div class="col-xl-4">
													<section class="card card-featured-left card-featured-primary mb-3">
														<div class="card-body">
															<div class="widget-summary">
																<div class="widget-summary-col widget-summary-col-icon">
																	<div class="summary-icon bg-primary">
																		<i class="fas fa-users"></i>
																	</div>
																</div>
																<div class="widget-summary-col">
																	<div class="summary">
																		<h4 class="title">KKM Kelas</h4>
																		<div class="info">
																			<strong class="amount"><div id="kkmkelas"></div></strong>
																		</div>
																	</div>
																	<div class="summary-footer">
																		<a class="text-muted text-uppercase" href="#">(Lihat Semua)</a>
																	</div>
																</div>
															</div>
														</div>
													</section>
												</div>
												<div class="col-xl-4">
													<section class="card card-featured-left card-featured-primary mb-3">
														<div class="card-body">
															<div class="widget-summary">
																<div class="widget-summary-col widget-summary-col-icon">
																	<div class="summary-icon bg-primary">
																		<i class="fas fa-users"></i>
																	</div>
																</div>
																<div class="widget-summary-col">
																	<div class="summary">
																		<h4 class="title">KKM Sekolah</h4>
																		<div class="info">
																			<strong class="amount"><div id="kkmsekolah"></div></strong>
																		</div>
																	</div>
																	<div class="summary-footer">
																		<a class="text-muted text-uppercase" href="#">(Lihat Semua)</a>
																	</div>
																</div>
															</div>
														</div>
													</section>
												</div>
											</div>
											<table class="table table-bordered table-striped" id="KD1">
												<thead>
													<tr>
														<th width="5%">KD</th>
														<th width="45%">Kompetensi Dasar</th>
														<th width="15%">Karakteristik Muatan/Mata Pelajaran (Kompleksitas)</th>
														<th width="15%">Karakteristik Peserta Didik (Intake)</th>
														<th width="15%">Kondisi Satuan Pendidikan</th>
														<th width="5%">KKM KD</th>
													</tr>
												</thead>
												<tbody>				
												</tbody>
											</table>
										</div>
									</section>
								</div>
							</div>
						</div>
					</section>
					
					<div class="modal fade" id="formKDP" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">KD Pengetahuan</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<form id="KDPForm" method="POST" action="../modul/administrasi/simpanKD.php" class="form">
									<div class="tema-data"></div>
								</form>
							</div>
						</div>
					</div>
					
					<div class="modal fade" id="formKDK" tabindex="-1" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">KD Ketrampilan</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<form id="KDKForm" method="POST" action="../modul/administrasi/simpanKD.php" class="form">
									<div class="tema-data"></div>
								</form>
							</div>
						</div>
					</div>