<?php
require_once "../config/db_connect.php";
header('Content-Type: application/json');
$idp=strip_tags($connect->real_escape_string($_GET['idptk']));

if(isset($_FILES['image']['type'])){

	$validextensions = array('jpeg', 'jpg', 'png');
	$temporary = explode('.', $_FILES['image']['name']);
	$file_extension = end($temporary);

	if (

		(($_FILES['image']['type'] == 'image/png') || 
		($_FILES['image']['type'] == 'image/jpg') || 
		($_FILES['image']['type'] == 'image/jpeg'))

		&& 
		
		($_FILES['image']['size'] < 1000000)//Approx. 100kb files can be up.
		
		&& 
		
		in_array($file_extension, $validextensions)){

		if ($_FILES['image']['error'] > 0){

			$data = array(
				'error' => $_FILES['image']['error']
				);

			echo json_encode($data);

		}else{
			
			if (file_exists('ptk/' . $_FILES['image']['name'])) {

				$data = array(
					'error' => $_FILES['image']['name'] . ' already exists' 
				);
			
				echo json_encode($data);
			
			}else{
				
				$filename = $_FILES['image']['name'];
				$sourcePath = $_FILES['image']['tmp_name']; // Storing source path of the file in a variable
				$targetPath = 'ptk/'.$filename; // Target path where file is to be stored
				move_uploaded_file($sourcePath,$targetPath) ; // Moving Up file
				$resultset=$connect->query("SELECT * FROM ptk WHERE ptk_id = '$idp'")->num_rows;
				if($resultset>0) {     
					$ava=$connect->query("SELECT * FROM ptk WHERE ptk_id = '$idp'")->fetch_assoc();
					$flama=$ava['gambar'];
					$hapusFile = "./ptk/".$flama;
					if(file_exists($hapusFile)){
						unlink($hapusFile);
					};
					$namaGBR=strip_tags($connect->real_escape_string($filename));
					$sql_update = "UPDATE ptk set gambar='$namaGBR' WHERE ptk_id = '$idp'";
					$query1 = $connect->query($sql_update);
				};
				
				$data = array(
					'message'	=> 'Image Up Successfully',
					'image' 		=> $targetPath
				);
			
				echo json_encode($data);
			}
		}

	}else{

		$data = array(
			'error'	=> 'Invalid file Size or Type',
		);
	
		echo json_encode($data);

	}
}
?>