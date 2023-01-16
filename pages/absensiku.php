					<?php
					$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
					$kalendar= CAL_GREGORIAN;
					$bulan = date('m');
					$thn = date('Y');
					$jhari = cal_days_in_month($kalendar,$bulan,$thn);
					?>
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
					
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
								<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
								<input type="hidden" name="urls" id="urls" class="form-control" value="<?=base_url();?>" placeholder="Username">
								<input type="hidden" name="idptk" id="idptk" class="form-control" value="<?=$bioku['ptk_id'];?>" placeholder="Username">
							</div>
								<h2 class="card-title judul">Data Absensi</h2>
								<p class="card-subtitle">
								
								</p>
						</header>
						<div class="card-body">
							<div class="row mb-2">
								<div class="col-6">
									<select class="form-control" id="bulanku" name="bulanku">
										<option value="07" <?php if($bulan==="07"){echo "selected";}; ?>>Juli</option>
										<option value="08" <?php if($bulan==="08"){echo "selected";}; ?>>Agustus</option>
										<option value="09" <?php if($bulan==="09"){echo "selected";}; ?>>September</option>
										<option value="10" <?php if($bulan==="10"){echo "selected";}; ?>>Oktober</option>
										<option value="11" <?php if($bulan==="11"){echo "selected";}; ?>>November</option>
										<option value="12" <?php if($bulan==="12"){echo "selected";}; ?>>Desember</option>
										<option value="01" <?php if($bulan==="01"){echo "selected";}; ?>>Januari</option>
										<option value="02" <?php if($bulan==="02"){echo "selected";}; ?>>Februari</option>
										<option value="03" <?php if($bulan==="03"){echo "selected";}; ?>>Maret</option>
										<option value="04" <?php if($bulan==="04"){echo "selected";}; ?>>April</option>
										<option value="05" <?php if($bulan==="05"){echo "selected";}; ?>>Mei</option>
										<option value="06" <?php if($bulan==="06"){echo "selected";}; ?>>Juni</option>
									</select>
								</div>
								<div class="col-6">
									<select class="form-control" id="tahunku" name="tahunku">
										<?php
										for($i=date('Y'); $i>=date('Y')-12; $i-=1){
										echo "<option value='$i'> $i </option>";
										}
										?>
									</select>
									
								</div>
							</div>
							
							
							<table class="table table-bordered table-striped" id="temaTable">
								<thead>
									<tr>
										<th class="text-center">Tanggal</th>
										<th class="text-center">Absen Masuk</th>
										<th class="text-center">Absen Keluar</th>
										<th class="text-center">Telat</th>
										<th class="text-center">Pulang Cepat</th>
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
												<form id="updateTemaForm" method="POST" action="modul/kepegawaian/absenmanual.php" class="form">
													<div class="tema-data"></div>
												</form>
											</div>
										</div>
									</div>
									
									<div class="modal" id="tambahTema" tabindex="-1" role="dialog">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<form id="createTemaForm" method="POST" action="modul/kepegawaian/simpanID.php" class="form">
													<div class="absen-data"></div>
												</form>
											</div>
										</div>
									</div>