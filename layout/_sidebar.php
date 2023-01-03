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
				                        <a class="nav-link" href="<?= base_url(); ?>">
				                            <i class="bx bx-home-alt" aria-hidden="true"></i>
				                            <span>Beranda</span>
				                        </a>                        
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-cart-alt" aria-hidden="true"></i>
				                            <span>Data Siswa</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="<?= base_url(); ?>rombel">
				                                    Kelasku
				                                </a>
				                            </li>
											<?php if($level==11){ ?>
				                            <li>
				                                <a class="nav-link" href="<?= base_url(); ?>penempatan">
				                                    Penempatan
				                                </a>
				                            </li>
											<?php } ?>
				                            <li>
				                                <a class="nav-link" href="<?= base_url(); ?>absensi">
				                                    Absensi
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-file" aria-hidden="true"></i>
				                            <span>Administrasi Kelas</span>
				                        </a>
				                        <ul class="nav nav-children">
				                            <li>
				                                <a class="nav-link" href="<?= base_url(); ?>tema">
				                                    Tema
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="<?= base_url(); ?>kompetensi-dasar">
				                                    Kompetensi Dasar
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="<?= base_url(); ?>pemetaan-kd">
				                                    Pemetaan KD
				                                </a>
				                            </li>
				                            <li>
				                                <a class="nav-link" href="<?= base_url(); ?>kkm">
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
				                                <a class="nav-link" href="<?= base_url(); ?>spiritual">
				                                    Spiritual
				                                </a>
				                            </li>
											<?php } ?>
				                            <li>
				                                <a class="nav-link" href="<?= base_url(); ?>sosial">
				                                    Sosial
				                                </a>
				                            </li>
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
				                                        <a class="nav-link" href="<?= base_url(); ?>pengetahuan">
				                                            Pengetahuan
				                                        </a>
				                                    </li>
				                                    <li>
				                                        <a class="nav-link" href="<?= base_url(); ?>ketrampilan">
				                                            Ketrampilan
				                                        </a>
				                                    </li>
				                                </ul>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>tengah-semester">
				                                    Tengah Semester
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>akhir-semester">
				                                    Akhir Semester
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>tahfidz">
				                                    Tahfidz
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-window-alt" aria-hidden="true"></i>
				                            <span>Data Isian Raport</span>
				                        </a>
				                        <ul class="nav nav-children">
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>kesehatan">
				                                    Kesehatan
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>prestasi">
				                                    Prestasi
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>ekstrakurikuler">
				                                    Ekstrakurikuler
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>saran-dan-pesan">
				                                    Saran dan Pesan
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>data-absensi">
				                                    Data Absensi
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-printer" aria-hidden="true"></i>
				                            <span>Generate Raport</span>
				                        </a>
				                        <ul class="nav nav-children">
											<?php if($level==96 or $level==11){ ?>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>kesehatan">
				                                    Spiritual
				                                </a>
				                            </li>
											<?php } ?>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>prestasi">
				                                    Sosial
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>ekstrakurikuler">
				                                    Pengetahuan
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>saran-dan-pesan">
				                                    Ketrampilan
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
									<li class="nav-parent">
				                        <a class="nav-link" href="#">
				                            <i class="bx bx-printer" aria-hidden="true"></i>
				                            <span>Cetak Raport</span>
				                        </a>
				                        <ul class="nav nav-children">
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>cetak-rapor">
				                                    Cetak Rapor
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>rekap-rapor">
				                                    Rekap Rapor
				                                </a>
				                            </li>
											<li>
				                                <a class="nav-link" href="<?= base_url(); ?>format-pelaporan">
				                                    Format Pelaporan
				                                </a>
				                            </li>
				                        </ul>
				                    </li>
				                    <li>
				                        <a class="nav-link" href="<?= base_url(); ?>changelog">
				                            <i class="bx bx-book-alt" aria-hidden="true"></i>
				                            <span>Changelog</span>
				                        </a>                        
				                    </li>

				                </ul>
				            </nav>

				            <hr class="separator" />

				            <div class="sidebar-widget widget-stats">
				                <div class="widget-header">
				                    <h6>Informasi Sistem</h6>
				                </div>
				                <div class="widget-content">
				                    <ul>
				                        <li>
				                            <span class="stats-title">Tahun Pelajaran</span>
				                            <span class="stats-complete"><?=$tapel;?></span>
				                            <div class="progress">
				                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
				                                    <span class="sr-only"><?=$tapel;?></span>
				                                </div>
				                            </div>
				                        </li>
				                        <li>
				                            <span class="stats-title">Semester</span>
				                            <span class="stats-complete"><?=$smt;?></span>
				                            <div class="progress">
				                                <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
				                                    <span class="sr-only"><?=$smt;?></span>
				                                </div>
				                            </div>
				                        </li>
				                    </ul>
				                </div>
				            </div>
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
				