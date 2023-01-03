<?php 
require_once '../../config/config.php';
require_once '../../config/db_connect.php';
//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());
	$idr=$_POST['idlm'];
	
	$tema=$_POST['nolm'];
	$namatema=strip_tags($connect->real_escape_string($_POST['namalm']));
	$sql = "SELECT * FROM lingkup_materi WHERE id_lm='$idr'";
	$usis = $connect->query($sql)->fetch_assoc();
	if(empty($tema) || empty($namatema)){
		$validator['success'] = false;
		$validator['messages'] = "Tidak Boleh Kosong Datanya!";
	}else{
			$sql = "update lingkup_materi set lm='$tema',nama_lm='$namatema' where id_lm='$idr'";
			$query = $connect->query($sql);
			$validator['success'] = true;
			$validator['messages'] = "Materi berhasil diperbaharui!";		
	};
	
	// close the database connection
	$connect->close();

	echo json_encode($validator);

}