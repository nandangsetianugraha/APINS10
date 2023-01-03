<?php 
require_once '../../config/config.php';
require_once '../../config/db_connect.php';
$output = array('success' => false, 'messages' => array());
$tapel = $_POST['tapel'];
$smt = $_POST['smt'];
$tapel1=(int)substr($tapel,0,4);
$tapel2=(int)substr($tapel,5,4);
$ntapel=($tapel1-1)."/".($tapel2-1);
//echo $ntapel;
//	$sqlp = "SELECT * FROM penempatan WHERE tapel='$tapel' AND smt='$nsmt'";
$sqlp = "SELECT * FROM penempatan WHERE rombel like '%6%' AND tapel='$ntapel' AND smt='2'";
$queryp = $connect->query($sqlp);
$sukses=0;
$total=0;
while ($row = $queryp->fetch_assoc()) {
	$idp=$row['peserta_didik_id'];
	$namasiswa = $connect->query("SELECT * FROM siswa WHERE peserta_didik_id='$idp'")->fetch_assoc();
	$nama=$namasiswa['nama'];
	$kelas=$row['rombel'];
	$total=$total+1;
	$sql = "UPDATE siswa set status='7' WHERE peserta_didik_id='$idp'";
	$query = $connect->query($sql);
	if($query === TRUE) {
		$sukses=$sukses+1;
	}else{
		$sukses=$sukses;
	};
}
$output['success'] = true;
$output['messages'] = 'Siswa yang berhasil diluluskan sebanyak '.$sukses.' dari '.$total.' Siswa Kelas 6 Tahun Pelajaran '.$ntapel;
$connect->close();
echo json_encode($output);
