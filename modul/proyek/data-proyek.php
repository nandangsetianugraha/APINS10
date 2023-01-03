<?php 
require_once '../../config/db_connect.php';
function TanggalIndo($tanggal)
{
	$bulan = array ('Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1]-1 ] . ' ' . $split[0];
};
$output = array('data' => array());
$kelas=$_GET['kelas'];
$smt=$_GET['smt'];
$tapel=$_GET['tapel'];
	$sql = "select * from data_proyek where kelas='$kelas' and tapel='$tapel' and smt='$smt' order by id_proyek asc";
	$query = $connect->query($sql);
	while ($row = $query->fetch_assoc()) {
		$idpro=$row['id_proyek'];
		$tema=$row['tema'];
		$ntema=$connect->query("select * from tema_proyek where id_tema='$tema'")->fetch_assoc();
		$actionButton = '
		<button type="button" class="mb-1 mt-1 me-1 btn btn-default" data-proyek="'.$idpro.'" data-bs-toggle="modal" data-bs-target="#editProyek"><i class="fas fa-pen"></i></button>
		<button type="button" class="mb-1 mt-1 me-1 btn btn-primary" onclick="removeProyek('.$idpro.')"><i class="fas fa-trash"></i></button>
		';
		$output['data'][] = array(
			$row['id_proyek'],
			$ntema['nama_tema'],
			$row['fase'],
			$row['nama_proyek'],
			$row['deskripsi_proyek'],
			$actionButton
		);
	}

// database connection close
$connect->close();

echo json_encode($output);