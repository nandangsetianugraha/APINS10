<?php 
require_once '../../config/db_connect.php';
session_start();
$level=$_SESSION['level'];
$tapel=$_GET['tapel'];
$smt=$_GET['smt'];
$kelas=$_GET['kelas'];
$ab=substr($kelas,0,1);
$peta=$_GET['peta'];
$mpid=$_GET['mp'];
$kd=$_GET['kd'];
$ada=0;
/**
if($tapel_aktif==$tapel and $smt_aktif==$smt){
	$edit=true;
}else{
	$edit=false;
};
**/
$edit=true;
$ckkm1=$connect->query("select * from kkmku where kelas='$ab' and tapel='$tapel' and mapel='$mpid' and kd='$kd' and jenis='1'")->num_rows;
$ckkm2=$connect->query("select * from kkmku where kelas='$ab' and tapel='$tapel' and mapel='$mpid' and kd='$kd' and jenis='2'")->num_rows;
$ckkm3=$connect->query("select * from kkmku where kelas='$ab' and tapel='$tapel' and mapel='$mpid' and kd='$kd' and jenis='3'")->num_rows;
if($ckkm1>0 and $ckkm2>0 and $ckkm3>0){
	$boleh=true;
}else{
	$boleh=false;
};
$mpm=$connect->query("select * from mapel where id_mapel='$mpid'")->fetch_assoc();
if($kd=="0"){
	echo "<div class='alert alert-info alert-dismissible'><h4><i class='icon fa fa-info'></i> Informasi</h4>Silahkan Pilih KD</div>";
}else{
	if($boleh==false){
		?>
		<div class="error-page">
			<div class="error-content text-center" style="margin-left: 0;">
				<h3><i class="fa fa-info-circle text-danger"></i> Kesalahan </h3>
				<p>Belum Mengisi KKM <?=$mpm['nama_mapel'];?> Kelas <?=$ab;?>, silahkan isi terlebih dahulu dan lengkapi KKM <?=$mpm['nama_mapel'];?> Kelas <?=$ab;?>.</p>
			</div>
		</div>
	<?php 
	}else{	
		?>

		<div class="table-responsive">
		<table class="table table-bordered table-hover">
									<thead>
									   <tr>
										<th>Nama Siswa</th>
										<th>Nilai PAS</th>
										</tr>
									</thead>
									<tbody>	
		<?php 
		$sql="select * from penempatan where rombel='$kelas' and tapel='$tapel' and smt='$smt' order by nama asc";
		$query = $connect->query($sql);
		while($s=$query->fetch_assoc()) {
			$idp=$s['peserta_didik_id'];
			$sql1 = "select * from nats where id_pd='$idp' and smt='$smt' and tapel='$tapel' and mapel='$mpid' and kd='$kd'";
			$query1 = $connect->query($sql1);
          	$siswa = $connect->query("select * from siswa where peserta_didik_id='$idp'")->fetch_assoc();
            $adanilai=$query1->num_rows;
			if($adanilai>0){
				$m=$query1->fetch_assoc();
				$nPTS=number_format($m['nilai'],0);
			}else{
				$nPTS='';
			};
			if($edit){
				$nkd='
				<span class="input form-control form-control-sm" contenteditable="true" data-old_value="'.$nPTS.'"  onBlur="saveUA(this,\'nilai\',\''.$idp.'\',\''.$kelas.'\',\''.$smt.'\',\''.$tapel.'\',\''.$mpid.'\',\''.$kd.'\')" onClick="highlightEdit(this);">'.$nPTS.'</span>
				';
			}else{
				$nkd=$nPTS;
			};
		?>
		<tr>
			<td><?=$s['nama'];?></td>
			<td><?=$nkd;?></td>
		</tr>
		<?php
		};
		?>
																	
									</tbody>
								</table>
								</div>
<?php };};?>