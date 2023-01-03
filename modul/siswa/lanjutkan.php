<?php 
require_once '../../config/config.php';
require_once '../../config/db_connect.php';
$output = array('success' => false, 'messages' => array());
$tapel = $_POST['tapel'];
$kelas = $_POST['kelas'];
$smt = $_POST['smt'];
$nsmt=(int)$smt-1;
if($kelas==0){
	$sqlp = "SELECT * FROM penempatan WHERE tapel='$tapel' AND smt='$nsmt'";
}else{
	$sqlp = "SELECT * FROM penempatan WHERE rombel='$kelas' AND tapel='$tapel' AND smt='$nsmt'";
};
$queryp = $connect->query($sqlp);
$sukses=0;
$total=0;
while ($row = $queryp->fetch_assoc()) {
	$idp=$row['peserta_didik_id'];
	$namasiswa = $connect->query("SELECT * FROM siswa WHERE peserta_didik_id='$idp'")->fetch_assoc();
	$nama=strip_tags($connect->real_escape_string($namasiswa['nama']));
	$kelas=$row['rombel'];
	$total=$total+1;
	$cek = $connect->query("SELECT * FROM penempatan WHERE peserta_didik_id='$idp' AND tapel='$tapel' AND smt='$smt'")->num_rows;
	if($cek>0){
		$sukses=$sukses;
	}else{
		$sql = "INSERT INTO penempatan(peserta_didik_id,nama,rombel,tapel,smt) VALUES('$idp','$nama','$kelas','$tapel','$smt')";
		$query = $connect->query($sql);
		if($query === TRUE) {
			$sukses=$sukses+1;
		}else{
			$sukses=$sukses;
		};
	};
}
$output['success'] = true;
$output['messages'] = 'Siswa yang berhasil dilanjutkan sebanyak '.$sukses.' dari '.$total.' Siswa';
$connect->close();
echo json_encode($output);