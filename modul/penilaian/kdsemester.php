<?phpsession_start();$level = $_SESSION['level'];require_once '../../config/db_connect.php';
$kelas=$_GET['kelas'];$mpid=$_GET['mpid'];$smt=$_GET['smt'];$peta=$_GET['peta'];
$ab=substr($kelas,0,1);if($mpid==0){?>	<select class="form-select" id="kd" name="kd">		<option value="0">Pilih KD</option>	</select><?php }else{	$sql4 = "select * from pemetaan where kelas='$ab' and smt='$smt' and kd_aspek='$peta' and mapel='$mpid' group by nama_peta order by nama_peta asc";	$query4 = $connect->query($sql4);	echo '<option value="0">Pilih KD</option>';	while($s=$query4->fetch_assoc()){		echo "<option value='".$s['nama_peta']."'>".$s['nama_peta']."</option>";	}};?>