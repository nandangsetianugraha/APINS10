<?php 
require_once '../../config/config.php';
require_once '../../config/db_connect.php';
$output = array('success' => false, 'messages' => array());
$siswa = $_POST['siswa'];
$tapel = $_POST['tapel'];
$smt = $_POST['smt'];
$sqlp = "SELECT * FROM penempatan WHERE peserta_didik_id = '$siswa' and tapel='$tapel' AND smt='$smt'";
$queryp = $connect->query($sqlp);
$rs = $queryp->fetch_assoc();
$nama=$rs['nama'];
$kelas=$rs['rombel'];
$sql = "DELETE FROM penempatan WHERE peserta_didik_id = '$siswa' and tapel='$tapel' AND smt='$smt'";
$query = $connect->query($sql);
if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = $nama." Berhasil dikeluarkan dari Kelas ".$kelas;
} else {
	$output['success'] = false;
	$output['messages'] = 'Error saat mencoba mengeluarkan data siswa';
}
$connect->close();
echo json_encode($output);