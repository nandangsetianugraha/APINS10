<?php 
session_start();
require_once '../../config/config.php';
require_once '../../config/db_connect.php';
//$level=$_SESSION['level'];
$status=$_GET['status'];
$smt=$_GET['smt'];
$tapel=$_GET['tapel'];
$output = array('data' => array());
	$sql = "select * from pengguna where verified='$status' order by nama_lengkap asc";
	$query = $connect->query($sql);
	while ($row = $query->fetch_assoc()) {
		$idps=$row['id'];
		$idp=$row['ptk_id'];
		$jk=$row['level'];
		$j_ptk = $connect->query("select * from jenis_ptk where jenis_ptk_id='$jk'")->fetch_assoc();
		$actionButton = '
		<div class="btn-group">
			<a href="'.base_url().'pengguna/'.$idps.'" type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" data-smt="'.$smt.'" data-tapel="'.$tapel.'" data-siswa="'.$idp.'"><i class="far fa-address-card"></i></a>
		</div>
		';
		if($status==1){
			$actionButton .= '
				<div class="btn-group">
					<button type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" onclick="removePengguna('.$idps.')"><i class="fas fa-exclamation-triangle"></i></button>
				</div>
			';
		}else{
			$actionButton .= '
				<div class="btn-group">
					<button type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" onclick="AktifPengguna('.$idps.')"><i class="fas fa-exclamation-triangle"></i></button>
				</div>
			';
		}
				
		//$tgl=ucfirst(strtolower($row['tempat'])).", ".TanggalIndo($row['tanggal']);
		
		$output['data'][] = array(
			$row['username'],
			$row['nama_lengkap'],
			$j_ptk['jenis_ptk'],
			$actionButton
		);
	}
// database connection close
$connect->close();
echo json_encode($output);