					<header class="page-header">
						<h2>Absensi</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Absensi</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
						</div>
					</header>
					<div class="row">
						<div class="col-lg-6">
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
						</div>
						<div class="col-lg-6">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										
									</div>
										<h2 class="card-title">Statistik</h2>
								</header>
								<div class="card-body">
									
									
								</div>
							</section>
						</div>
					</div>