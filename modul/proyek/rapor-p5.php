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
$ab=substr($kelas,0,1);
$smt=$_GET['smt'];
$tapel=$_GET['tapel'];
$dproyek=$connect->query("select * from data_proyek where kelas='$kelas' and tapel='$tapel' and smt='$smt'")->fetch_assoc();
$idproyek=$dproyek['id_proyek'];
$sql = "select * from penempatan where rombel='$kelas' and tapel='$tapel' and smt='$smt' order by nama asc";
$query = $connect->query($sql);
while ($row = $query->fetch_assoc()) {
	$idp=$row['peserta_didik_id'];
	$tombol='<a href="cetak/cetak-p5.php?idp='.$idp.'&kelas='.$kelas.'&tapel='.$tapel.'&smt='.$smt.'&proyek='.$idproyek.'" class="btn btn-success mb-2"><i class="fa fa-print opacity-50 me-1" data-kelas="'.$kelas.'" data-ids="'.$idp.'" data-tapel="'.$tapel.'" data-smt="'.$smt.'"></i> Cetak</a>';
	
	//$namasis=$pn['nama'];
	$output['data'][] = array(
		$row['nama'],
		$tombol
	);
}

// database connection close
$connect->close();

echo json_encode($output);