<?php session_start();include 'config/config.php';include 'config/db_connect.php';if (!isset($_SESSION['userid'])) {    header("location:./auth/");	exit();};$request  = $_SERVER['REQUEST_URI'];$params     = explode("/", $request);$halaman = $params[3];$idku=$_SESSION['userid'];$tapel = $_SESSION['tapel'];$smt = $_SESSION['smt'];//$cfg=$connect->query("select * from konfigurasi")->fetch_assoc();$bioku = $connect->query("select * from ptk where ptk_id='$idku'")->fetch_assoc();$filegbr = 'images/ptk/'.$bioku['gambar'];$file_headerss = @get_headers($filegbr);if($file_headerss[0] == 'HTTP/1.1 404 Not Found') {	//$exists = false;	$avatar="profile-7.jpg";}else {	//$exists = true;	$avatar=$bioku['gambar'];};$status=$bioku['status_kepegawaian_id'];$level=$bioku['jenis_ptk_id'];$jns_ptk = $connect->query("select * from jenis_ptk where jenis_ptk_id='$level'")->fetch_assoc();$status_ptk = $connect->query("select * from status_kepegawaian where status_kepegawaian_id='$status'")->fetch_assoc();if($level==96){		//PAI	$nk=$connect->query("select * from rombel where tapel='$tapel' and pai='$idku' order by nama_rombel asc")->fetch_assoc();	$kelas=$nk['nama_rombel'];	if(isset($_SESSION['kurikulum'])){	}else{		$_SESSION['kurikulum']='Kurikulum 2013';	};}elseif($level==95){		//PJOK	$nk=$connect->query("select * from rombel where tapel='$tapel' and penjas='$idku' order by nama_rombel asc")->fetch_assoc();	$kelas=$nk['nama_rombel'];	if(isset($_SESSION['kurikulum'])){	}else{		$_SESSION['kurikulum']='Kurikulum 2013';	};}elseif($level==94){		//Bahasa Inggris	$nk=$connect->query("select * from rombel where tapel='$tapel' and inggris='$idku' order by nama_rombel asc")->fetch_assoc();	$kelas=$nk['nama_rombel'];	if(isset($_SESSION['kurikulum'])){	}else{		$_SESSION['kurikulum']='Kurikulum 2013';	};}elseif($level==97){		//Guru Pendamping	$nk=$connect->query("select * from rombel where tapel='$tapel' and pendamping='$idku' order by nama_rombel asc")->fetch_assoc();	$kelas=$nk['nama_rombel'];	$_SESSION['kurikulum']=$nk['kurikulum'];}elseif($level==98){		//Guru Kelas	$nk=$connect->query("select * from rombel where tapel='$tapel' and wali_kelas='$idku' order by nama_rombel asc")->fetch_assoc();	$kelas=$nk['nama_rombel'];	$_SESSION['kurikulum']=$nk['kurikulum'];}else{	$kelas="1";	if(isset($_SESSION['kurikulum'])){	}else{		$_SESSION['kurikulum']='Kurikulum 2013';	};};if($kelas==''){	$norombel=true;}else{	$norombel=false;};$ab=substr($kelas,0,1);include "layout/head.php"; ?>
	</head>
	<body>		<div id="loading">			<div class="logoLoader"></div>			<span class="loader"></span>			<div class="textLoader">				<center>				<b>Please Wait ... </b>				</center>			</div>		</div>
		<section class="body">
			<!-- start: header -->
			<?php include "layout/header.php"; ?>			<!-- end: header -->
			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php include "layout/sidebar.php"; ?>				<!-- end: sidebar -->
				<section role="main" class="content-body">
					<!-- Isi -->					<?php 					  if($halaman==="" or $halaman==="beranda"){						  if($maintenis==1 and $level<>11){							include "pages/perawatan.php";						  }else{							include 'pages/home.php';						  };					  }else{						  if($maintenis==1 and $level<>11){							include "pages/perawatan.php";						  }else{							if($norombel){								include "pages/norombel.php";							}else{								if( file_exists('pages/' . $halaman . '.php') ) {									include 'pages/' . $halaman . '.php';								}else{									include "pages/error.php";								}							}						  }					  };					?>
				</section>
			</div>
			<?php include "layout/aside.php"; ?>
		</section>
		<?php include "layout/script.php";?>				<?php 		  if($halaman==="" or $halaman==="beranda"){			echo '<script src="ajax/home.js"></script>';		  }else{			if( file_exists('ajax/' . $halaman . '.js') ) {				echo '<script src="ajax/'.$halaman.'.js"></script>';			}else{				echo '<script src="ajax/home.js"></script>';			}		  };		?>		<script>		$("#loading").hide();		$(".loader").hide();		function keluar(id = null) {			if(id) {				// click on remove button								Swal.fire({				  title: 'Yakin Keluar Sistem?',				  text: "Apakah Anda yakin untuk Keluar Sistem?",				  icon: 'warning',				  showCancelButton: true,				  confirmButtonColor: '#3085d6',				  cancelButtonColor: '#d33',				  confirmButtonText: 'Ya, keluar!'				}).then((result) => {				  if (result.isConfirmed) {					setTimeout(function () {						location.href="logout.php";					},1000);				  }				})							} else {				Swal.fire("Kesalahan","Error Sistem","error");			}		}		</script>
	</body>
</html>