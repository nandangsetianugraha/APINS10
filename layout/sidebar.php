				<aside id="sidebar-left" class="sidebar-left">

				    <div class="sidebar-header">
				        <div class="sidebar-title">
				            Navigation
				        </div>
				        <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>

				    <div class="nano">
				        <div class="nano-content">
				            <nav id="menu" class="nav-main" role="navigation">

				                <ul class="nav nav-main">
									<li>
				                        <a class="nav-link" href="<?=base_url();?>">
				                            <i class="bx bx-home-alt" aria-hidden="true"></i>
				                            <span>Beranda</span>
				                        </a>                        
				                    </li>
									<?php if($level==11){ ?>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-cog" aria-hidden="true"></i>
				                            <span>Setting Aplikasi</span>
				                        </a>
				                        <ul class="nav nav-children">
											<li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    <i class="bx bx-lock-alt" aria-hidden="true"></i>
													<span>Manajemen Aplikasi</span>
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="<?=base_url();?>setting-tahun-ajaran">
				                                            Tahun Ajaran
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="<?=base_url();?>tambah-siswa">
				                                            Tambah Siswa Baru
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
											<li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    <i class="bx bx-user-pin" aria-hidden="true"></i>
													<span>Manajemen Siswa</span>
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="<?=base_url();?>setting-rombel">
				                                            Rombel
				                                        </a>
				                                    </li>
													<li>
				                                        <a class="nav-link" href="<?=base_url();?>siswa">
				                                            Daftar Siswa
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="<?=base_url();?>tambah-siswa">
				                                            Tambah Siswa Baru
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
											<li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    <i class="bx bx-user" aria-hidden="true"></i>
													<span>Manajemen PTK</span>
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="<?=base_url();?>pengguna">
				                                            Daftar Pengguna
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="<?=base_url();?>ptk">
				                                            Daftar PTK
				                                        </a>
				                                    </li>
													<li>
				                                        <a class="nav-link" href="<?=base_url();?>tambah-ptk">
				                                            Tambah PTK Baru
				                                        </a>
				                                    </li>
													<li>
				                                        <a class="nav-link" href="<?=base_url();?>id-pegawai">
				                                            ID Pegawai
				                                        </a>
				                                    </li>
													<li>
				                                        <a class="nav-link" href="<?=base_url();?>absensi-pegawai">
				                                            Absensi
				                                        </a>
				                                    </li>
													<li>
				                                        <a class="nav-link" href="<?=base_url();?>penggajian">
				                                            Penggajian
				                                        </a>
				                                    </li>
													<li>
				                                        <a class="nav-link" href="<?=base_url();?>gaji-bulanan">
				                                            Gaji Bulanan
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
				                        </ul>
				                    </li>
									<?php } ?>
									<?php if($level==98 or $level==97 or $level==11){ ?>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-user-circle" aria-hidden="true"></i>
				                            <span>Data Siswa</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="<?=base_url();?>rombel">
				                                    Kelasku
				                                </a>
				                            </li>
											<?php if($level==11){ ?>
				                            <li>
				                                <a class="nav-link" href="<?=base_url();?>penempatan">
				                                    Penempatan
				                                </a>
				                            </li>
											<?php } ?>
				                            <li>
				                                <a class="nav-link" href="<?=base_url();?>absensi">
				                                    Absensi
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<?php } ?>
									<!-- Mulai Kurikulum -->
									<?php if($kurikulum=="Kurikulum 2013"){ ?>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-file" aria-hidden="true"></i>
				                            <span>Administrasi Kelas</span>
				                        </a>
				                        <ul class="nav nav-children">
											<?php if($level==98 or $level==97 or $level==11){ ?>
				                            <li>
				                                <a class="nav-link" href="<?=base_url();?>tema">
				                                    Tema
				                                </a>
				                            </li>
											<?php } ?>
				                            <li>
				                                <a class="nav-link" href="<?=base_url();?>kompetensi-dasar">
				                                    Kompetensi Dasar
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="<?=base_url();?>pemetaan-kd">
				                                    Pemetaan KD
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="<?=base_url();?>kkm">
				                                    KKM
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-cube" aria-hidden="true"></i>
				                            <span>Penilaian Sikap</span>
				                        </a>
				                        <ul class="nav nav-children">
											<?php if($level==96 or $level==11){ ?>
				                            <li>
				                                <a class="nav-link" href="<?=base_url();?>spiritual">
				                                    Spiritual
				                                </a>
				                            </li>
											<?php } ?>
											<?php if($level==98 or $level==97 or $level==11){ ?>
				                            <li>
				                                <a class="nav-link" href="<?=base_url();?>sosial">
				                                    Sosial
				                                </a>
				                            </li>
											<?php } ?>
				                        </ul>
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-collection" aria-hidden="true"></i>
				                            <span>Penilaian</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li class="nav-parent">
				                                <a class="nav-link" href="#">
				                                    Penilaian Harian
				                                </a>
				                                <ul class="nav nav-children">
				                                    <li>
				                                        <a class="nav-link" href="<?=base_url();?>pengetahuan">
				                                            Pengetahuan
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="<?=base_url();?>ketrampilan">
				                                            Ketrampilan
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>tengah-semester">
				                                    Tengah Semester
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>akhir-semester">
				                                    Akhir Semester
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>tahfidz">
				                                    Tahfidz
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<?php if($level==98 or $level==97 or $level==11){ ?>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-window-alt" aria-hidden="true"></i>
				                            <span>Data Isian Raport</span>
				                        </a>
				                        <ul class="nav nav-children">
											<li>
				                                <a class="nav-link" href="<?=base_url();?>kesehatan">
				                                    Kesehatan
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>prestasi">
				                                    Prestasi
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>ekstrakurikuler">
				                                    Ekstrakurikuler
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>saran-dan-pesan">
				                                    Saran dan Pesan
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>data-absensi">
				                                    Data Absensi
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<?php } ?>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-printer" aria-hidden="true"></i>
				                            <span>Generate Raport</span>
				                        </a>
				                        <ul class="nav nav-children">
											<?php if($level==96 or $level==11){ ?>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>generate-spiritual">
				                                    Spiritual
				                                </a>
				                            </li>
											<?php } ?>
											<?php if($level==98 or $level==97 or $level==11){ ?>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>generate-sosial">
				                                    Sosial
				                                </a>
				                            </li>
											<?php } ?>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>generate-pengetahuan">
				                                    Pengetahuan
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>generate-ketrampilan">
				                                    Ketrampilan
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<?php if($level==98 or $level==97 or $level==11){ ?>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-window-alt" aria-hidden="true"></i>
				                            <span>Cetak</span>
				                        </a>
				                        <ul class="nav nav-children">
											<li>
				                                <a class="nav-link" href="<?=base_url();?>cetak-rapor">
				                                    Rapor
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>rekap-rapor">
				                                    Rekap
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>laporan-perkembangan">
				                                    Laporan Perkembangan
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<?php } ?>
									<?php }elseif($kurikulum=="Kurikulum Merdeka"){ ?>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-file" aria-hidden="true"></i>
				                            <span>Administrasi Kelas</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="<?=base_url();?>lingkup-materi">
				                                    Lingkup Materi
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="<?=base_url();?>tujuan-pembelajaran">
				                                    Tujuan Pembelajaran
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-cube" aria-hidden="true"></i>
				                            <span>Penilaian Harian</span>
				                        </a>
				                        <ul class="nav nav-children">
											<li>
				                                <a class="nav-link" href="<?=base_url();?>formatif">
				                                    Formatif
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>sumatif">
				                                    Sumatif
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-collection" aria-hidden="true"></i>
				                            <span>Penilaian Sumatif</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="<?=base_url();?>sumatif-tengah-semester">
				                                    Tengah Semester
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>sumatif-akhir-semester">
				                                    Akhir Semester
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>tahfidz">
				                                    Tahfidz
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<?php if($level==98 or $level==97 or $level==11){ ?>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-window-alt" aria-hidden="true"></i>
				                            <span>Data Isian Raport</span>
				                        </a>
				                        <ul class="nav nav-children">
											<li>
				                                <a class="nav-link" href="<?=base_url();?>kesehatan">
				                                    Kesehatan
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>prestasi">
				                                    Prestasi
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>ekstrakurikuler">
				                                    Ekstrakurikuler
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>saran-dan-pesan">
				                                    Saran dan Pesan
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>data-absensi">
				                                    Data Absensi
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<?php } ?>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-printer" aria-hidden="true"></i>
				                            <span>Generate Rapor</span>
				                        </a>
				                        <ul class="nav nav-children">
											<li>
				                                <a class="nav-link" href="<?=base_url();?>generate-rapor">
				                                    Generate Rapor
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>cetak-rapor-ikm">
				                                    Cetak Rapor
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>rekap-rapor-ikm">
				                                    Rekap Rapor
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<?php if($level==98 or $level==97 or $level==11){ ?>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-window-alt" aria-hidden="true"></i>
				                            <span>Rapor P5</span>
				                        </a>
				                        <ul class="nav nav-children">
											<li>
				                                <a class="nav-link" href="<?=base_url();?>input-proyek">
				                                    Input Proyek
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>pemetaan-proyek">
				                                    Pemetaan Proyek
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>penilaian-proyek">
				                                    Penilaian Proyek
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?=base_url();?>cetak-rapor-p5">
				                                    Cetak Rapor P5
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<?php } ?>
									<?php }else{ ?>
									<?php } ?>
									
				                    <li>
				                        <a class="nav-link" href="#" onclick="keluar(1)">
				                            <i class="bx bx-power-off" aria-hidden="true"></i>
				                            <span>Keluar</span>
				                        </a>                        
				                    </li>

				                </ul>
				            </nav>

				        </div>

				        <script>
				            // Maintain Scroll Position
				            if (typeof localStorage !== 'undefined') {
				                if (localStorage.getItem('sidebar-left-position') !== null) {
				                    var initialPosition = localStorage.getItem('sidebar-left-position'),
				                        sidebarLeft = document.querySelector('#sidebar-left .nano-content');

				                    sidebarLeft.scrollTop = initialPosition;
				                }
				            }
				        </script>

				    </div>

				</aside>
				