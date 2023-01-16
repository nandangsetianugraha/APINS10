					<header class="page-header">
						<h2>Upload Absensi</h2>
						<div class="right-wrapper text-end">
							<ol class="breadcrumbs">
								<li>
									<a href="<?= base_url(); ?>">
										<i class="bx bx-home-alt"></i>
									</a>
								</li>
								<li><span>Upload Absensi</span></li>
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
								<input type="hidden" id="tanggal" class="form-control-sm" value="<?=date('Y-m-d');?>">
							</div>
								<h2 class="card-title judul">Upload Absensi</h2>
								<p class="card-subtitle">
								
								</p>
						</header>
						<div class="card-body">
							<form method="post" action="" enctype="multipart/form-data">
								<div class="form-group form-group-default">
									<input type="file" name="file" class="pull-left">
									<button type="submit" name="preview" class="btn btn-success btn-sm">
										<i class="fas fa-sync"></i> Validasi
									</button>
								</div>
							</form>
							<!-- Buat Preview Data -->
							<?php
							// Jika user telah mengklik tombol Preview
							if(isset($_POST['preview'])){
								//$ip = ; // Ambil IP Address dari User
								$nama_file_baru = 'data.xlsx';

								// Cek apakah terdapat file data.xlsx pada folder tmp
								if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
									unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

								$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
								$tmp_file = $_FILES['file']['tmp_name'];

								// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
								if($ext == "xlsx"){
									// Upload file yang dipilih ke folder tmp
									// dan rename file tersebut menjadi data{ip_address}.xlsx
									// {ip_address} diganti jadi ip address user yang ada di variabel $ip
									// Contoh nama file setelah di rename : data127.0.0.1.xlsx
									move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

									// Load librari PHPExcel nya
									require_once 'cetak/PHPExcel/PHPExcel.php';

									$excelreader = new PHPExcel_Reader_Excel2007();
									$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
									$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

									// Buat sebuah tag form untuk proses import data ke database
									echo "<form method='post' action='modul/kepegawaian/import.php'>";

									// Buat sebuah div untuk alert validasi kosong
									echo "<div class='alert alert-danger' id='kosong'>
									Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
									</div>";

									

									$numrow = 1;
									$kosong = 0;
									foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
										// Ambil data pada excel sesuai Kolom
										$nis = $row['A']; // Ambil data NIS
										$nama = $row['B']; // Ambil data nama

										// Cek jika semua data tidak diisi
										if(empty($nis) && empty($nama))
											continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

										// Cek $numrow apakah lebih dari 1
										// Artinya karena baris pertama adalah nama-nama kolom
										// Jadi dilewat saja, tidak usah diimport
										if($numrow > 1){
											// Validasi apakah semua data telah diisi
											$nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
											$nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
											
											// Jika salah satu data ada yang kosong
											if(empty($nis) or empty($nama)){
												$kosong++; // Tambah 1 variabel $kosong
											}

										}

										$numrow++; // Tambah 1 setiap kali looping
									}

									
									// Cek apakah variabel kosong lebih dari 1
									// Jika lebih dari 1, berarti ada data yang masih kosong
									if($kosong > 1){
									?>
										<script>
										$(document).ready(function(){
											// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
											$("#jumlah_kosong").html('<?php echo $kosong; ?>');

											$("#kosong").show(); // Munculkan alert validasi kosong
										});
										</script>
									<?php
									}else{ // Jika semua data sudah diisi
										// Buat sebuah tombol untuk mengimport data ke database
										echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
									}

									echo "</form>";
								}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
									// Munculkan pesan validasi
									echo "<div class='alert alert-danger'>
									Hanya File Excel 2007 (.xlsx) yang diperbolehkan
									</div>";
								}
							}
							?>
						</div>
					</section>
									
									