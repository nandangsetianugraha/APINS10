<?php 
session_start();
require_once '../../config/config.php';
require_once '../../config/db_connect.php';
//$level=$_SESSION['level'];
$status=$_GET['status'];
$smt=$_GET['smt'];
$tapel=$_GET['tapel'];
$output = array('data' => array());
	$sql = "select * from siswa where status='$status' order by nama asc";
	$query = $connect->query($sql);
	while ($row = $query->fetch_assoc()) {
		$idp=$row['peserta_didik_id'];
		$jk=$row['jk'];
		
		$actionButton = '
		<div class="btn-group">
			<a href="'.base_url().'siswa/'.$idp.'" type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" data-smt="'.$smt.'" data-tapel="'.$tapel.'" data-siswa="'.$idp.'"><i class="far fa-address-card"></i></a>
		</div>
		<div class="btn-group">
			<button type="button" class="mb-1 mt-1 me-1 btn btn-sm btn-default" data-smt="'.$smt.'" data-tapel="'.$tapel.'" data-siswa="'.$idp.'" data-bs-toggle="modal" data-bs-target="#mutasikan"><i class="fas fa-exclamation-triangle"></i></button>
		</div>
		';
		//$tgl=ucfirst(strtolower($row['tempat'])).", ".TanggalIndo($row['tanggal']);
		//$namasis=$row['nama'];
		$output['data'][] = array(
			$row['nama'].'<br/>'.$row['nis'].' / '.$row['nisn'],
			$row['tempat'].'<br/>'.TanggalIndo($row['tanggal']),
			$actionButton
		);
	}
// database connection close
$connect->close();
echo json_encode($output);