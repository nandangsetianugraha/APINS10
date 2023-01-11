<?php 
session_start();
require_once '../../config/config.php';
require_once '../../config/db_connect.php';
//$level=$_SESSION['level'];
$status=$_GET['status'];
$smt=$_GET['smt'];
$tapel=$_GET['tapel'];
$output = array('data' => array());
	$sql = "select * from ptk where status_keaktifan_id='$status' order by nama asc";
	$query = $connect->query($sql);
	while ($row = $query->fetch_assoc()) {
		$idp=$row['ptk_id'];
		$jk=$row['jenis_kelamin'];
		
		
		$gmb='
		<div class="profile-picture" id="image-place">
			<img src="'.base_url().'images/ptk/'.$row['gambar'].'" width="60px">
		</div>
		';
		$actionButton = '
				<div class="btn-group">
					<a href="'.base_url().'ptk/'.$idp.'" type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" data-smt="'.$smt.'" data-tapel="'.$tapel.'" data-siswa="'.$idp.'"><i class="far fa-address-card"></i></a>
				</div>
				<div class="btn-group">
					<button type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" data-smt="'.$smt.'" data-tapel="'.$tapel.'" data-siswa="'.$idp.'" data-bs-toggle="modal" data-bs-target="#mutasikan"><i class="fas fa-exclamation-triangle"></i></button>
				</div>
				';
		//$tgl=ucfirst(strtolower($row['tempat'])).", ".TanggalIndo($row['tanggal']);
		$namasis=$row['nama'];
		$output['data'][] = array(
			$gmb,
			'<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">'.$namasis.'</a><span class="text-muted fw-bold d-block fs-7">'.$row['niy_nigk'].' / '.$row['nuptk'].'</span>',
			'<a href="#" class="text-dark fw-bolder text-hover-primary mb-1 fs-6">'.$row['tempat_lahir'].'</a><span class="text-muted fw-bold d-block fs-7">'.TanggalIndo($row['tanggal_lahir']).'</span>',
			$actionButton
		);
	}
// database connection close
$connect->close();
echo json_encode($output);