					<header class="page-header">
						<h2>Tujuan Pembelajaran</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Tujuan Pembelajaran</span></li>
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
											$sql4 = "select * from rombel where tapel='$tapel' and pai='$idku' and kurikulum='Kurikulum Merdeka' order by nama_rombel asc";
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
											$sql4 = "select * from rombel where tapel='$tapel' and penjas='$idku' and kurikulum='Kurikulum Merdeka' order by nama_rombel asc";
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
											$sql4 = "select * from rombel where tapel='$tapel' and inggris='$idku' and kurikulum='Kurikulum Merdeka' order by nama_rombel asc";
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
											$sql4 = "select * from rombel where tapel='$tapel' and kurikulum='Kurikulum Merdeka' order by nama_rombel asc";
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
											<option value="0">Pilih Rombel</option>
											<option value="<?=substr($kelas,0,1);?>"><?=substr($kelas,0,1);?></option>
										</select>
										<?php }; ?>
										</div>
										
										<div class="btn-group">
										<select class="form-control" id="mp" name="mp">
											<option value="0">Pilih Mapel</option>
										</select>
										</div>
										<div class="btn-group">
										<select class="form-control" id="materi" name="materi">
											<option value="0">Pilih Materi</option>
										</select>
										</div>
										
									</div>
									<h2 class="card-title judul">Tujuan Pembelajaran</h2>
						</header>
						<div class="card-body">
							<button type="button" class="btn rounded-0 btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addProyek">Tujuan Pembelajaran</button>
							
							<table class="table table-bordered table-striped table-vcenter js-dataTable-full" id="temaTable">
								<thead>
									<tr>
										<th width="20%">Kode TP</th>
										<th width="60%">Tujuan Pembelajaran</th>
										<th width="20%" class="d-none d-sm-table-cell"></th>
									</tr>
								</thead>
								<tbody>
									
										  
								</tbody>
							</table>
						</div>
					</section>
					
						
					
					<div class="modal" id="editProyek" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<form class="form-horizontal" action="modul/administrasi/update-tujuan.php" autocomplete="off" method="POST" id="ubahproyek">
									<div class="fetched-data1"></div>
								</form>
							</div>
						</div>
					</div>
					<div class="modal" id="addProyek" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<form class="form-horizontal" action="modul/administrasi/tambah-tujuan.php" autocomplete="off" method="POST" id="buatproyek">
									<div class="fetched-data"></div>
								</form>
							</div>
						</div>
					</div>