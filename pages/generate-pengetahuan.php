					<header class="page-header">
						<h2>Rapor Pengetahuan</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Rapor Pengetahuan</span></li>
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
										<div class="btn-group">
										<?php if($level==96){?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<?php 
											$sql4 = "select * from rombel where tapel='$tapel' and pai='$idku' and kurikulum='Kurikulum 2013' order by nama_rombel asc";
											$query4 = $connect->query($sql4);
											while($nk=$query4->fetch_assoc()){
												
											?>
											<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
											<?php };?>
										</select>
										<?php }elseif($level==95){ ?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<?php 
											$sql4 = "select * from rombel where tapel='$tapel' and penjas='$idku' and kurikulum='Kurikulum 2013' order by nama_rombel asc";
											$query4 = $connect->query($sql4);
											while($nk=$query4->fetch_assoc()){
												
											?>
											<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
											<?php };?>
										</select>
										<?php }elseif($level==94){ ?>
										<select class="form-select" id="kelas" name="kelas">
											<option value="0">Pilih Rombel</option>
											<?php 
											$sql4 = "select * from rombel where tapel='$tapel' and inggris='$idku' and kurikulum='Kurikulum 2013' order by nama_rombel asc";
											$query4 = $connect->query($sql4);
											while($nk=$query4->fetch_assoc()){
												
											?>
											<option value="<?=$nk['nama_rombel'];?>"><?=$nk['nama_rombel'];?></option>
											<?php };?>
										</select>
										<?php }elseif($level==11){ ?>
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
											<option value="0">Pilih Rombel</option>
											<option value="<?=$kelas;?>"><?=$kelas;?></option>
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
										<div class="btn-group">
											<?php 
											$mkkm=$connect->query("select min(nilai) as kkmsekolah from kkm where tapel='$tapel'")->fetch_assoc();
											if(empty($mkkm['kkmsekolah'])){
												$kkmsaya=0;
											}else{
												$kkmsaya=$mkkm['kkmsekolah'];
											};
											?>
											<input type="text" class="form-control" value="KKM Sekolah : <?=$kkmsaya;?>" readonly=true>
										</div>
									</div>
										<h2 class="card-title">Rapor Pengetahuan</h2>
								</header>
								<div class="card-body">
									
									<table class="table table-responsive table-bordered table-striped mb-0" id="kt_table_users">
										<thead>
											<tr>
												<th width="5%"></th>
												<th width="30%">Nama Siswa</th>
												<th width="10%">Nilai</th>
												<th width="10%">Pred</th>
												<th width="45%">Deskripsi Pengetahuan</th>
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
												<form id="ekskulForm" method="POST" action="modul/rapor/update-pengetahuan.php" class="form">
													<div class="kesehatan-data"></div>
												</form>
											</div>
										</div>
									</div>