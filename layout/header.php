			<?php
			$kurikulum =$_SESSION['kurikulum'];
			?>
			<header class="header">
				<div class="logo-container">
					<a href="./" class="logo">
						<img src="img/logo1.png" width="75" height="35" alt="Porto Admin" />
					</a>

					<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>

				</div>

				<!-- start: search & user box -->
				<div class="header-right">
					<?php if ($smt==1){ $semes='Ganjil';}else{$semes='Genap';}; ?>
					

					<ul class="notifications">
						<li>
							<a href="#" class="dropdown-toggle notification-icon" data-bs-toggle="dropdown">
								<i class="bx bx-bell"></i>
								<span class="badge">3</span>
							</a>

							<div class="dropdown-menu notification-menu">
								<div class="notification-title">
									<span class="float-end badge badge-default">3</span>
									Alerts
								</div>

								<div class="content">
									<ul>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fas fa-thumbs-down bg-danger text-light"></i>
												</div>
												<span class="title">Server is Down!</span>
												<span class="message">Just now</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="bx bx-lock bg-warning text-light"></i>
												</div>
												<span class="title">User Locked</span>
												<span class="message">15 minutes ago</span>
											</a>
										</li>
										<li>
											<a href="#" class="clearfix">
												<div class="image">
													<i class="fas fa-signal bg-success text-light"></i>
												</div>
												<span class="title">Connection Restaured</span>
												<span class="message">10/10/2021</span>
											</a>
										</li>
									</ul>

									<hr />

									<div class="text-end">
										<a href="#" class="view-more">View All</a>
									</div>
								</div>
							</div>
						</li>
					</ul>
					<span class="separator"></span>
					<div id="userbox1" class="userbox">
						<a href="#" data-bs-toggle="dropdown">
							<div class="profile-info">
								<span class="name"><?=$tapel;?> | <?=$semes;?></span>
								<span class="role"><?=$kurikulum;?></span>
							</div>
						<?php if($level==96 or $level==95 or $level==94 or $level==11){ ?>
							<i class="fa custom-caret"></i>
						</a>
						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
								<?php if($kurikulum=='Kurikulum 2013'){ ?>
								<li>
									<a role="menuitem" tabindex="-1" href="layout/change.php?kur=2"><i class="bx bx-user-circle"></i> Kurikulum Merdeka</a>
								</li>
								<?php }else{ ?>
								<li>
									<a role="menuitem" tabindex="-1" href="layout/change.php?kur=1"><i class="bx bx-user-circle"></i> Kurikulum 2013</a>
								</li>
								<?php } ?>
							</ul>
						</div>
						<?php }else{ ?>
						</a>
						<?php } ?>
					</div>
					
					<div id="userbox" class="userbox">
						<a href="#" data-bs-toggle="dropdown">
							<figure class="profile-picture" id="image-place">
								<img src="images/ptk/<?=$avatar;?>" alt="Joseph Doe" class="rounded-circle" data-lock-picture="images/ptk/<?=$avatar;?>" />
							</figure>
							<div class="profile-info" data-lock-name="<?=$bioku['nama'];?>" data-lock-email="<?=$bioku['email'];?>">
								<span class="name"><?=$bioku['nama'];?></span>
								<span class="role"><?=$jns_ptk['jenis_ptk'];?></span>
							</div>

							<i class="fa custom-caret"></i>
						</a>

						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?= base_url(); ?>profile"><i class="bx bx-user-circle"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="bx bx-lock"></i> Lock Screen</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" onclick="keluar(1)"><i class="bx bx-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			