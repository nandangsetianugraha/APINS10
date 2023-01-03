<?php 
session_start();
require_once '../../config/config.php';
require_once '../../config/db_connect.php';
//$level=$_SESSION['level'];
$kelas=$_GET['kelas'];
$smt=$_GET['smt'];
$tapel=$_GET['tapel'];
$output = array('data' => array());
if($kelas==0){
	$sql = "select * from siswa where status='1' order by nama asc";
	$query = $connect->query($sql);
	while ($row = $query->fetch_assoc()) {
		$idp=$row['peserta_didik_id'];
		$pn = $connect->query("SELECT * FROM penempatan WHERE peserta_didik_id='$idp' AND tapel='$tapel' AND smt='$smt'")->fetch_assoc();
		$jk=$row['jk'];
		if($pn['rombel']==null){
			$kelas='Belum ditempatkan';
		}else{
			$kelas='Kelas '.$pn['rombel'];
		};
		
		
		$actionButton = '';
		if($pn['rombel']==null){
			$actionButton .= '
				<div class="btn-group">
					<button type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" data-smt="'.$smt.'" data-tapel="'.$tapel.'" data-siswa="'.$idp.'" data-bs-toggle="modal" data-bs-target="#tempatkan"><i class="far fa-address-card"></i></button>
				</div>
				<div class="btn-group">
					<button type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" data-smt="'.$smt.'" data-tapel="'.$tapel.'" data-siswa="'.$idp.'" data-bs-toggle="modal" data-bs-target="#mutasikan"><i class="fas fa-exclamation-triangle"></i></button>
				</div>
				';
		}else{
			$actionButton .= '
				<div class="btn-group">
					<button type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" data-smt="'.$smt.'" data-kelas="'.$pn['rombel'].'" data-tapel="'.$tapel.'" data-siswa="'.$idp.'" id="keluarRombel"><i class="fas fa-external-link-alt"></i></button>
				</div>
				';
		};
		//$tgl=ucfirst(strtolower($row['tempat'])).", ".TanggalIndo($row['tanggal']);
		$namasis=$row['nama'];
		$output['data'][] = array(
				'<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">'.$namasis.'</a><span class="text-muted fw-bold d-block fs-7">'.$row['nis'].' / '.$row['nisn'].'</span>',
				'<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">'.$row['tempat'].'</a><span class="text-muted fw-bold d-block fs-7">'.TanggalIndo($row['tanggal']).'</span>',
				$actionButton
			);
	}
}else{
	$sql = "SELECT * FROM penempatan WHERE rombel='$kelas' AND tapel='$tapel' AND smt='$smt' order by nama asc";
	$query = $connect->query($sql);
	while ($row = $query->fetch_assoc()) {
		$idp=$row['peserta_didik_id'];
		$sqlp = "SELECT * FROM siswa WHERE peserta_didik_id='$idp'";
		$pn = $connect->query($sqlp)->fetch_assoc();
		$nisn=$pn['nisn'];
		$jk=$pn['jk'];
		$ids=$pn['id'];
		$rmb=$row['rombel'];
		$namasis=$pn['nama'];
		$filegbr = 'https://sdi-aljannah.web.id/apins/images/siswa/'.$pn['avatar'];
		$file_headerss = @get_headers($filegbr);
		if($file_headerss[0] == 'HTTP/1.1 404 Not Found') {
			//$exists = false;
			if($jk==="L"){
				$avatarm="008-boy-3.svg";
			}else{
				$avatarm="017-girl-8.svg";
			};
		}else {
			//$exists = true;
			$avatarm=$pn['avatar'];
		};
		$actionButton = '
				<div class="btn-group">
					<button type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" data-smt="'.$smt.'" data-kelas="'.$rmb.'" data-tapel="'.$tapel.'" data-siswa="'.$idp.'" id="keluarRombel"><i class="fas fa-external-link-alt"></i></button>
				</div>
				';
		$namasis=$pn['nama'];
		$output['data'][] = array(
				'<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">'.$namasis.'</a><span class="text-muted fw-bold d-block fs-7">'.$pn['nis'].' / '.$pn['nisn'].'</span>',
				'<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">'.$pn['tempat'].'</a><span class="text-muted fw-bold d-block fs-7">'.TanggalIndo($pn['tanggal']).'</span>',
				$actionButton
			);
	}
}

// database connection close
$connect->close();

echo json_encode($output);