					<?php 
					$bln=isset($_GET['bln']) ? $_GET['bln'] : date("m");
					$thn=isset($_GET['thn']) ? $_GET['thn'] : date("Y");
					$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
					?>
					<header class="page-header">
						<h2>Gaji Bulanan</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Gaji Bulanan</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					
					<section class="card">
						<header class="card-header">
							<div class="card-actions">
								<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
								<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
								<input type="hidden" class="form-control" id="urls" value="<?=base_url();?>">
									
																		
							</div>
								<h2 class="card-title">Gaji Bulanan</h2>
						</header>
						<div class="card-body">
							<div class="row mb-2">
								<div class="col-md-4">
									<button class="btn btn-primary btn-icon" id="cetakRekapGaji"><i class="fas fa-print"></i> Rekap Gaji</button>
									<button class="btn btn-primary btn-icon" id="cetakSlipGaji"><i class="fas fa-print"></i> Slip Gaji</button>
								</div>
								<div class="col-md-4">
									<div class="form-group form-group-default">
										<input type="hidden" name="tapel" id="tapel" class="form-control" value="<?=$tapel;?>" placeholder="Username">
										<input type="hidden" name="smt" id="smt" class="form-control" value="<?=$smt;?>" placeholder="Username">
										<select class="form-control" name="bln" id="bulan">
												<option value="07" <?php if($bln==="08"){echo "selected";}; ?>>Juli</option>
												<option value="08" <?php if($bln==="09"){echo "selected";}; ?>>Agustus</option>
												<option value="09" <?php if($bln==="10"){echo "selected";}; ?>>September</option>
												<option value="10" <?php if($bln==="11"){echo "selected";}; ?>>Oktober</option>
												<option value="11" <?php if($bln==="12"){echo "selected";}; ?>>November</option>
												<option value="12" <?php if($bln==="01"){echo "selected";}; ?>>Desember</option>
												<option value="01" <?php if($bln==="02"){echo "selected";}; ?>>Januari</option>
												<option value="02" <?php if($bln==="03"){echo "selected";}; ?>>Februari</option>
												<option value="03" <?php if($bln==="04"){echo "selected";}; ?>>Maret</option>
												<option value="04" <?php if($bln==="05"){echo "selected";}; ?>>April</option>
												<option value="05" <?php if($bln==="06"){echo "selected";}; ?>>Mei</option>
												<option value="06" <?php if($bln==="07"){echo "selected";}; ?>>Juni</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group form-group-default">
										<select class="form-control" name="thn" id="tahun">
											<?php
											$now=date('Y');
											for ($a=2012;$a<=$now;$a++){
											?>
												<option value="<?=$a;?>" <?php if(($thn)==$a){echo "selected";}; ?>><?=$a;?> </option>
											<?php 
											}
											?>
										</select>
									</div>
								</div>
							</div>
							
							
							<table class="table table-bordered table-striped" id="kt_table_users">
								<thead>
									<tr>
										<th>ID Peg</th>
										<th>Nama Pegawai</th>
										<th>Hari Kerja</th>
										<th>Absen Kerja</th>
										<th>Absen Ekskul</th>
										<th>Terlambat</th>
										<th>Pulang Cepat</th>
									</tr>
								</thead>
								<tbody>				
								</tbody>
							</table>
						</div>
					</section>