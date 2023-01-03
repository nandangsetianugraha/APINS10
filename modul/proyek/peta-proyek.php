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
$proyek=$_GET['proyek'];
	$sql = "select * from pemetaan_proyek where proyek='$proyek' order by id_pemetaan asc";
	$query = $connect->query($sql);
	$nomor=0;
	while ($row = $query->fetch_assoc()) {
		$nomor=$nomor+1;
		$idpeta=$row['id_pemetaan'];
		$proyek=$row['proyek'];
		$nproyek=$connect->query("select * from data_proyek where id_proyek='$proyek'")->fetch_assoc();
		$dimensi=$row['dimensi'];
		$ndimensi=$connect->query("select * from dimensi_proyek where id_dimensi='$dimensi'")->fetch_assoc();
		$actionButton = '
			<button class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-peta="'.$idpeta.'" data-bs-toggle="modal" data-bs-target="#editPeta">
					Edit
				</button>
			';
		$output['data'][] = array(
			$nomor,
			$nproyek['nama_proyek'],
			$ndimensi['nama_dimensi'],
			$actionButton
		);
	}

// database connection close
$connect->close();

echo json_encode($output);